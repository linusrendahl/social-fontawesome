<?php

namespace LinusRendahl;

/**
* FontAwesomeSocialIcons
*/
class SocialFontAwesomeTest extends \PHPUnit_Framework_TestCase
{


	public $object;


	public function __construct()
	{
		$object = new \LinusRendahl\SocialFontAwesome;
		$this->object = $object;
	}

	public function testParseDomainFromUrl()
	{

		//$object = new \LinusRendahl\SocialFontAwesome;
		$res = $this->object->getDomain('http://www.facebook.com/liren');
		$exp = 'facebook';

	    $this->assertEquals($res, $exp, 'Domain name was not parsed correctly.');

	}


	public function testAddCustomIcon()
	{
		$this->object->addCustom('http://www.facebook.com/user', 'new-class', 'new-title');
		$icons = $this->object->icons;

		$res = $icons['facebook']['title'];
		$exp = 'new-title';

		$this->assertEquals($res, $exp, 'Titles do not match.');

		$res = $icons['facebook']['class'];
		$exp = 'new-class';

		$this->assertEquals($res, $exp, 'Class do not match.');

		$res = $icons['facebook']['url'];
		$exp = 'http://www.facebook.com/user';

		$this->assertEquals($res, $exp, 'URLs do not match.');
	}


	public function testConstructor()
	{
		$object = new \LinusRendahl\SocialFontAwesome;
		
		$res = gettype($object->default);
		$exp = 'array';

		$this->assertEquals($res, $exp, 'This is not a array.');

		$res = count($object->default);
		$exp = 0;

		$this->assertNotEquals($res, $exp, 'This is not a array.');
	}


	public function testAutoloader()
	{
		include( __DIR__ . '/../../autoloader.php');

		$object = new SocialFontAwesome;

		$res = gettype($object);
		$exp = 'string:object';

		$this->assertNotEquals($res, $exp, 'A object could not be created from the autoloader.');

	}



	public function testAddFromDefault()
	{
		$this->object->add('http://www.facebook.com/user');
		$icons = $this->object->icons;

		$res = $icons['facebook']['title'];
		$exp = 'Facebook';

		$this->assertEquals($res, $exp, 'Titles do not match.');

		$res = $icons['facebook']['class'];
		$exp = 'fa fa-facebook';

		$this->assertEquals($res, $exp, 'Class do not match.');

		$res = $icons['facebook']['url'];
		$exp = 'http://www.facebook.com/user';

		$this->assertEquals($res, $exp, 'URLs do not match.');

	}


	public function testSettingCustomTitle()
	{
		$this->object->add('http://www.facebook.com/user')->title('custom-title');

		$icons = $this->object->icons;

		$res = $icons['facebook']['title'];
		$exp = 'custom-title';

		$this->assertEquals($res, $exp, 'Titles do not match.');

	}





	public function testWrapper()
	{
		$this->object->wrapper('<start>', '</end>');

		$res = $this->object->wrapper_start;
		$exp = '<start>';

		$this->assertEquals($res, $exp, 'Start tag does not match');

		$res = $this->object->wrapper_end;
		$exp = '</end>';

		$this->assertEquals($res, $exp, 'End tag does not match');


	}

	public function testSettingCustomClass()
	{
		$this->object->add('http://www.facebook.com/user')->setClass('custom-class');

		$icons = $this->object->icons;

		$res = $icons['facebook']['class'];
		$exp = 'fa fa-facebook custom-class';

		$this->assertEquals($res, $exp, 'Class do not match.');

	}


	public function testGetArray()
	{
		$this->object->add('http://www.facebook.com/user');

		$res = gettype($this->object->getArray());
		$exp = 'array';

		$this->assertEquals($res, $exp, 'This is not an array.');
	}

	public function testGetHtml()
	{
		$html = $this->object->add('http://www.facebook.com/user');
		$html = $html->getHtml();

		$res = gettype($html);
		$exp = 'string';

		$this->assertEquals($res, $exp, 'This is not an string of HTML.');
	}

}