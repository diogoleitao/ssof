<?php



class Twig_Tests_EnvironmentTest extends PHPUnit_Framework_TestCase
{
    
    public function testRenderNoLoader()
    {
        $Vx44ywczaw14 = new Twig_Environment();
        $Vx44ywczaw14->render('test');
    }

    public function testAutoescapeOption()
    {
        $Vpnd0azzvluw = new Twig_Loader_Array(array(
            'html' => '{{ foo }} {{ foo }}',
            'js' => '{{ bar }} {{ bar }}',
        ));

        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw, array(
            'debug' => true,
            'cache' => false,
            'autoescape' => array($this, 'escapingStrategyCallback'),
        ));

        $this->assertEquals('foo&lt;br/ &gt; foo&lt;br/ &gt;', $V2cppyqdygng->render('html', array('foo' => 'foo<br/ >')));
        $this->assertEquals('foo\x3Cbr\x2F\x20\x3E foo\x3Cbr\x2F\x20\x3E', $V2cppyqdygng->render('js', array('bar' => 'foo<br/ >')));
    }

    public function escapingStrategyCallback($V2npxty0bmys)
    {
        return $V2npxty0bmys;
    }

    public function testGlobals()
    {
        
        $V2cppyqdygng = new Twig_Environment($this->getMock('Twig_LoaderInterface'));
        $V2cppyqdygng->addGlobal('foo', 'foo');
        $V2cppyqdygng->getGlobals();
        $V2cppyqdygng->addGlobal('foo', 'bar');
        $Vdvmvneyp5qb = $V2cppyqdygng->getGlobals();
        $this->assertEquals('bar', $Vdvmvneyp5qb['foo']);

        
        $V2cppyqdygng = new Twig_Environment($this->getMock('Twig_LoaderInterface'));
        $V2cppyqdygng->addGlobal('foo', 'foo');
        $V2cppyqdygng->getGlobals();
        $V2cppyqdygng->initRuntime();
        $V2cppyqdygng->addGlobal('foo', 'bar');
        $Vdvmvneyp5qb = $V2cppyqdygng->getGlobals();
        $this->assertEquals('bar', $Vdvmvneyp5qb['foo']);

        
        $V2cppyqdygng = new Twig_Environment($this->getMock('Twig_LoaderInterface'));
        $V2cppyqdygng->addGlobal('foo', 'foo');
        $V2cppyqdygng->getGlobals();
        $V2cppyqdygng->getFunctions();
        $V2cppyqdygng->addGlobal('foo', 'bar');
        $Vdvmvneyp5qb = $V2cppyqdygng->getGlobals();
        $this->assertEquals('bar', $Vdvmvneyp5qb['foo']);

        
        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw = new Twig_Loader_Array(array('index' => '{{foo}}')));
        $V2cppyqdygng->addGlobal('foo', 'foo');
        $V2cppyqdygng->getGlobals();
        $V2cppyqdygng->getFunctions();
        $V2cppyqdygng->initRuntime();
        $V2cppyqdygng->addGlobal('foo', 'bar');
        $Vdvmvneyp5qb = $V2cppyqdygng->getGlobals();
        $this->assertEquals('bar', $Vdvmvneyp5qb['foo']);

        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw);
        $V2cppyqdygng->getGlobals();
        $V2cppyqdygng->addGlobal('foo', 'bar');
        $V4lif0h4bhru = $V2cppyqdygng->loadTemplate('index');
        $this->assertEquals('bar', $V4lif0h4bhru->render(array()));

        
    }

    public function testExtensionsAreNotInitializedWhenRenderingACompiledTemplate()
    {
        $Vbo43qqknf4i = array('cache' => sys_get_temp_dir().'/twig', 'auto_reload' => false, 'debug' => false);

        
        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw = new Twig_Loader_Array(array('index' => '{{ foo }}')), $Vbo43qqknf4i);
        $Vcxwghl1fqnk = $V2cppyqdygng->getCacheFilename('index');
        if (!is_dir(dirname($Vcxwghl1fqnk))) {
            mkdir(dirname($Vcxwghl1fqnk), 0777, true);
        }
        file_put_contents($Vcxwghl1fqnk, $V2cppyqdygng->compileSource('{{ foo }}', 'index'));

        
        $V2cppyqdygng = $this
            ->getMockBuilder('Twig_Environment')
            ->setConstructorArgs(array($Vpnd0azzvluw, $Vbo43qqknf4i))
            ->setMethods(array('initExtensions'))
            ->getMock()
        ;

        $V2cppyqdygng->expects($this->never())->method('initExtensions');

        
        $Vubzayalqgq4 = $V2cppyqdygng->render('index', array('foo' => 'bar'));
        $this->assertEquals('bar', $Vubzayalqgq4);

        unlink($Vcxwghl1fqnk);
    }

    public function testAddExtension()
    {
        $V2cppyqdygng = new Twig_Environment($this->getMock('Twig_LoaderInterface'));
        $V2cppyqdygng->addExtension(new Twig_Tests_EnvironmentTest_Extension());

        $this->assertArrayHasKey('test', $V2cppyqdygng->getTags());
        $this->assertArrayHasKey('foo_filter', $V2cppyqdygng->getFilters());
        $this->assertArrayHasKey('foo_function', $V2cppyqdygng->getFunctions());
        $this->assertArrayHasKey('foo_test', $V2cppyqdygng->getTests());
        $this->assertArrayHasKey('foo_unary', $V2cppyqdygng->getUnaryOperators());
        $this->assertArrayHasKey('foo_binary', $V2cppyqdygng->getBinaryOperators());
        $this->assertArrayHasKey('foo_global', $V2cppyqdygng->getGlobals());
        $Vwhrpr43obxe = $V2cppyqdygng->getNodeVisitors();
        $this->assertEquals('Twig_Tests_EnvironmentTest_NodeVisitor', get_class($Vwhrpr43obxe[2]));
    }

    public function testRemoveExtension()
    {
        $V2cppyqdygng = new Twig_Environment($this->getMock('Twig_LoaderInterface'));
        $V2cppyqdygng->addExtension(new Twig_Tests_EnvironmentTest_Extension());
        $V2cppyqdygng->removeExtension('environment_test');

        $this->assertFalse(array_key_exists('test', $V2cppyqdygng->getTags()));
        $this->assertFalse(array_key_exists('foo_filter', $V2cppyqdygng->getFilters()));
        $this->assertFalse(array_key_exists('foo_function', $V2cppyqdygng->getFunctions()));
        $this->assertFalse(array_key_exists('foo_test', $V2cppyqdygng->getTests()));
        $this->assertFalse(array_key_exists('foo_unary', $V2cppyqdygng->getUnaryOperators()));
        $this->assertFalse(array_key_exists('foo_binary', $V2cppyqdygng->getBinaryOperators()));
        $this->assertFalse(array_key_exists('foo_global', $V2cppyqdygng->getGlobals()));
        $this->assertCount(2, $V2cppyqdygng->getNodeVisitors());
    }
}

class Twig_Tests_EnvironmentTest_Extension extends Twig_Extension
{
    public function getTokenParsers()
    {
        return array(
            new Twig_Tests_EnvironmentTest_TokenParser(),
        );
    }

    public function getNodeVisitors()
    {
        return array(
            new Twig_Tests_EnvironmentTest_NodeVisitor(),
        );
    }

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('foo_filter', 'foo_filter'),
        );
    }

    public function getTests()
    {
        return array(
            new Twig_SimpleTest('foo_test', 'foo_test'),
        );
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('foo_function', 'foo_function'),
        );
    }

    public function getOperators()
    {
        return array(
            array('foo_unary' => array()),
            array('foo_binary' => array()),
        );
    }

    public function getGlobals()
    {
        return array(
            'foo_global' => 'foo_global',
        );
    }

    public function getName()
    {
        return 'environment_test';
    }
}

class Twig_Tests_EnvironmentTest_TokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
    }

    public function getTag()
    {
        return 'test';
    }
}

class Twig_Tests_EnvironmentTest_NodeVisitor implements Twig_NodeVisitorInterface
{
    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        return $Vz3fbiqci0vl;
    }

    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        return $Vz3fbiqci0vl;
    }

    public function getPriority()
    {
        return 0;
    }
}
