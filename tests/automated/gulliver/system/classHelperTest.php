<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.helper.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:54.
  */ 

  class classHelperTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers Helper::__construct
    * @todo   Implement test__construct().
    */
    public function test__construct() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( '__construct', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::addFile
    * @todo   Implement testaddFile().
    */
    public function testaddFile() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'addFile', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::addContent
    * @todo   Implement testaddContent().
    */
    public function testaddContent() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'addContent', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::setContentType
    * @todo   Implement testsetContentType().
    */
    public function testsetContentType() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'setContentType', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::init
    * @todo   Implement testinit().
    */
    public function testinit() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'init', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::minify
    * @todo   Implement testminify().
    */
    public function testminify() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'minify', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::flush
    * @todo   Implement testflush().
    */
    public function testflush() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'flush', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Helper::serve
    * @todo   Implement testserve().
    */
    public function testserve() 
    { 
        if (class_exists('Helper')) {
             $methods = get_class_methods( 'Helper');
            $this->assertTrue( in_array( 'serve', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 