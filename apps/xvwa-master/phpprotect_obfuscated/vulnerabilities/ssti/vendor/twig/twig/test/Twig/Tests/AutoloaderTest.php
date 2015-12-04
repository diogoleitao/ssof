<?php



class Twig_Tests_AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public function testAutoload()
    {
        $this->assertFalse(class_exists('FooBarFoo'), '->autoload() does not try to load classes that does not begin with Twig');

        $Vock4gsno5xv = new Twig_Autoloader();
        $this->assertNull($Vock4gsno5xv->autoload('Foo'), '->autoload() returns false if it is not able to load a class');
    }
}
