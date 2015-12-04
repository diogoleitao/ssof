<?php



class Twig_Tests_Loader_ArrayTest extends PHPUnit_Framework_TestCase
{
    public function testGetSource()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array('foo' => 'bar'));

        $this->assertEquals('bar', $Vpnd0azzvluw->getSource('foo'));
    }

    
    public function testGetSourceWhenTemplateDoesNotExist()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array());

        $Vpnd0azzvluw->getSource('foo');
    }

    public function testGetCacheKey()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array('foo' => 'bar'));

        $this->assertEquals('bar', $Vpnd0azzvluw->getCacheKey('foo'));
    }

    
    public function testGetCacheKeyWhenTemplateDoesNotExist()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array());

        $Vpnd0azzvluw->getCacheKey('foo');
    }

    public function testSetTemplate()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array());
        $Vpnd0azzvluw->setTemplate('foo', 'bar');

        $this->assertEquals('bar', $Vpnd0azzvluw->getSource('foo'));
    }

    public function testIsFresh()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array('foo' => 'bar'));
        $this->assertTrue($Vpnd0azzvluw->isFresh('foo', time()));
    }

    
    public function testIsFreshWhenTemplateDoesNotExist()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array());

        $Vpnd0azzvluw->isFresh('foo', time());
    }

    public function testTemplateReference()
    {
        $Vkkm4e2vaxrv = new Twig_Test_Loader_TemplateReference('foo');
        $Vpnd0azzvluw = new Twig_Loader_Array(array('foo' => 'bar'));

        $Vpnd0azzvluw->getCacheKey($Vkkm4e2vaxrv);
        $Vpnd0azzvluw->getSource($Vkkm4e2vaxrv);
        $Vpnd0azzvluw->isFresh($Vkkm4e2vaxrv, time());
        $Vpnd0azzvluw->setTemplate($Vkkm4e2vaxrv, 'foobar');
    }
}

class Twig_Test_Loader_TemplateReference
{
    private $Vkkm4e2vaxrv;

    public function __construct($Vkkm4e2vaxrv)
    {
        $this->name = $Vkkm4e2vaxrv;
    }

    public function __toString()
    {
        return $this->name;
    }
}
