<?php



class Twig_Tests_Loader_ChainTest extends PHPUnit_Framework_TestCase
{
    public function testGetSource()
    {
        $Vpnd0azzvluw = new Twig_Loader_Chain(array(
            new Twig_Loader_Array(array('foo' => 'bar')),
            new Twig_Loader_Array(array('foo' => 'foobar', 'bar' => 'foo')),
        ));

        $this->assertEquals('bar', $Vpnd0azzvluw->getSource('foo'));
        $this->assertEquals('foo', $Vpnd0azzvluw->getSource('bar'));
    }

    
    public function testGetSourceWhenTemplateDoesNotExist()
    {
        $Vpnd0azzvluw = new Twig_Loader_Chain(array());

        $Vpnd0azzvluw->getSource('foo');
    }

    public function testGetCacheKey()
    {
        $Vpnd0azzvluw = new Twig_Loader_Chain(array(
            new Twig_Loader_Array(array('foo' => 'bar')),
            new Twig_Loader_Array(array('foo' => 'foobar', 'bar' => 'foo')),
        ));

        $this->assertEquals('bar', $Vpnd0azzvluw->getCacheKey('foo'));
        $this->assertEquals('foo', $Vpnd0azzvluw->getCacheKey('bar'));
    }

    
    public function testGetCacheKeyWhenTemplateDoesNotExist()
    {
        $Vpnd0azzvluw = new Twig_Loader_Chain(array());

        $Vpnd0azzvluw->getCacheKey('foo');
    }

    public function testAddLoader()
    {
        $Vpnd0azzvluw = new Twig_Loader_Chain();
        $Vpnd0azzvluw->addLoader(new Twig_Loader_Array(array('foo' => 'bar')));

        $this->assertEquals('bar', $Vpnd0azzvluw->getSource('foo'));
    }

    public function testExists()
    {
        $Vpnd0azzvluw1 = $this->getMock('Twig_Loader_Array', array('exists', 'getSource'), array(), '', false);
        $Vpnd0azzvluw1->expects($this->once())->method('exists')->will($this->returnValue(false));
        $Vpnd0azzvluw1->expects($this->never())->method('getSource');

        $Vpnd0azzvluw2 = $this->getMock('Twig_LoaderInterface');
        $Vpnd0azzvluw2->expects($this->once())->method('getSource')->will($this->returnValue('content'));

        $Vpnd0azzvluw = new Twig_Loader_Chain();
        $Vpnd0azzvluw->addLoader($Vpnd0azzvluw1);
        $Vpnd0azzvluw->addLoader($Vpnd0azzvluw2);

        $this->assertTrue($Vpnd0azzvluw->exists('foo'));
    }
}
