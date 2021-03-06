<?php
global $RBAC;

use ProcessMaker\Core\System;

require_once 'classes/model/Users.php';
unset( $_SESSION['CURRENT_USER'] );
$oUser = new Users();
$aFields = $oUser->load( $_SESSION['USER_LOGGED'] );

if ($RBAC->userCanAccess( 'PM_EDITPERSONALINFO' ) == 1) { //he has permitions for edit his profile
    $canEdit = false;
} else { //he has not permitions for edit his profile, so just view mode will be displayed
    $canEdit = true;
}
$canEditCalendar = $RBAC->userCanAccess('PM_EDITPERSONALINFO') == 1 &&
        $RBAC->userCanAccess('PM_EDITPERSONALINFO_CALENDAR') == 1;

//calculating the max upload file size;
$POST_MAX_SIZE = ini_get( 'post_max_size' );
$mul = substr( $POST_MAX_SIZE, - 1 );
$mul = ($mul == 'M' ? 1048576 : ($mul == 'K' ? 1024 : ($mul == 'G' ? 1073741824 : 1)));
$postMaxSize = (int) $POST_MAX_SIZE * $mul;

$UPLOAD_MAX_SIZE = ini_get( 'upload_max_filesize' );
$mul = substr( $UPLOAD_MAX_SIZE, - 1 );
$mul = ($mul == 'M' ? 1048576 : ($mul == 'K' ? 1024 : ($mul == 'G' ? 1073741824 : 1)));
$uploadMaxSize = (int) $UPLOAD_MAX_SIZE * $mul;

if ($postMaxSize < $uploadMaxSize) {
    $uploadMaxSize = $postMaxSize;
}
//Add year by expiration date
$expirationDate = 1;
$envFile = PATH_CONFIG . 'env.ini';
if (file_exists($envFile) ) {
    $sysConf = System::getSystemConfiguration($envFile);
    if(isset($sysConf['expiration_year']) && $sysConf['expiration_year']>0){
       $expirationDate = abs($sysConf['expiration_year']);
    }
}

$languageManagement = 0;
/*----------------------------------********---------------------------------*/

$arraySystemConfiguration = System::getSystemConfiguration('', '', SYS_SYS);

$oHeadPublisher = & headPublisher::getSingleton();
$oHeadPublisher->addExtJsScript( 'users/users', true ); //adding a javascript file .js
// $oHeadPublisher->addContent('users/users'); //adding a html file  .html.
$oHeadPublisher->assign( 'USR_UID', $aFields['USR_UID'] );
$oHeadPublisher->assign( 'infoMode', true );
$oHeadPublisher->assign( 'EDITPROFILE', 1);
$oHeadPublisher->assign( 'canEdit', $canEdit );
$oHeadPublisher->assign('canEditCalendar', $canEditCalendar);
$oHeadPublisher->assign( 'MAX_FILES_SIZE', ' (' . $UPLOAD_MAX_SIZE . ') ' );
$oHeadPublisher->assign( 'MODE', '' );
$oHeadPublisher->assign('SYSTEM_TIME_ZONE', $arraySystemConfiguration['time_zone']);
$oHeadPublisher->assign('TIME_ZONE_DATA', array_map(function ($value) { return [$value, $value]; }, DateTimeZone::listIdentifiers()));
$oHeadPublisher->assign('__SYSTEM_UTC_TIME_ZONE__', (isset($_SESSION['__SYSTEM_UTC_TIME_ZONE__']) && $_SESSION['__SYSTEM_UTC_TIME_ZONE__'])? 1 : 0);
$oHeadPublisher->assign('EXPIRATION_DATE', $expirationDate);
$oHeadPublisher->assign('LANGUAGE_MANAGEMENT', $languageManagement);
$oHeadPublisher->assign('__ACTION__', 'savePersonalInfo');

G::RenderPage( 'publish', 'extJs' );
