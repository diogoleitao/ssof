<?php



class Twig_Tests_Loader_FilesystemTest extends PHPUnit_Framework_TestCase
{
    
    public function testSecurity($V4lif0h4bhru)
    {
        $Vpnd0azzvluw = new Twig_Loader_Filesystem(array(dirname(__FILE__).'/../Fixtures'));

        try {
            $Vpnd0azzvluw->getCacheKey($V4lif0h4bhru);
            $this->fail();
        } catch (Twig_Error_Loader $Vawjopoun3xn) {
            $this->assertNotContains('Unable to find template', $Vawjopoun3xn->getMessage());
        }
    }

    public function getSecurityTests()
    {
        return array(
            array("AutoloaderTest\0.php"),
            array('..\\AutoloaderTest.php'),
            array('..\\\\\\AutoloaderTest.php'),
            array('../AutoloaderTest.php'),
            array('..////AutoloaderTest.php'),
            array('./../AutoloaderTest.php'),
            array('.\\..\\AutoloaderTest.php'),
            array('././././././../AutoloaderTest.php'),
            array('.\\./.\\./.\\./../AutoloaderTest.php'),
            array('foo/../../AutoloaderTest.php'),
            array('foo\\..\\..\\AutoloaderTest.php'),
            array('foo/../bar/../../AutoloaderTest.php'),
            array('foo/bar/../../../AutoloaderTest.php'),
            array('filters/../../AutoloaderTest.php'),
            array('filters//..//..//AutoloaderTest.php'),
            array('filters\\..\\..\\AutoloaderTest.php'),
            array('filters\\\\..\\\\..\\\\AutoloaderTest.php'),
            array('filters\\//../\\/\\..\\AutoloaderTest.php'),
            array('/../AutoloaderTest.php'),
        );
    }

    public function testPaths()
    {
        $Vsm2vqr3ovy1 = dirname(__FILE__).'/Fixtures';

        $Vpnd0azzvluw = new Twig_Loader_Filesystem(array($Vsm2vqr3ovy1.'/normal', $Vsm2vqr3ovy1.'/normal_bis'));
        $Vpnd0azzvluw->setPaths(array($Vsm2vqr3ovy1.'/named', $Vsm2vqr3ovy1.'/named_bis'), 'named');
        $Vpnd0azzvluw->addPath($Vsm2vqr3ovy1.'/named_ter', 'named');
        $Vpnd0azzvluw->addPath($Vsm2vqr3ovy1.'/normal_ter');
        $Vpnd0azzvluw->prependPath($Vsm2vqr3ovy1.'/normal_final');
        $Vpnd0azzvluw->prependPath($Vsm2vqr3ovy1.'/named/../named_quater', 'named');
        $Vpnd0azzvluw->prependPath($Vsm2vqr3ovy1.'/named_final', 'named');

        $this->assertEquals(array(
            $Vsm2vqr3ovy1.'/normal_final',
            $Vsm2vqr3ovy1.'/normal',
            $Vsm2vqr3ovy1.'/normal_bis',
            $Vsm2vqr3ovy1.'/normal_ter',
        ), $Vpnd0azzvluw->getPaths());
        $this->assertEquals(array(
            $Vsm2vqr3ovy1.'/named_final',
            $Vsm2vqr3ovy1.'/named/../named_quater',
            $Vsm2vqr3ovy1.'/named',
            $Vsm2vqr3ovy1.'/named_bis',
            $Vsm2vqr3ovy1.'/named_ter',
        ), $Vpnd0azzvluw->getPaths('named'));

        $this->assertEquals(
            realpath($Vsm2vqr3ovy1.'/named_quater/named_absolute.html'),
            realpath($Vpnd0azzvluw->getCacheKey('@named/named_absolute.html'))
        );
        $this->assertEquals("path (final)\n", $Vpnd0azzvluw->getSource('index.html'));
        $this->assertEquals("path (final)\n", $Vpnd0azzvluw->getSource('@__main__/index.html'));
        $this->assertEquals("named path (final)\n", $Vpnd0azzvluw->getSource('@named/index.html'));
    }

    public function testEmptyConstructor()
    {
        $Vpnd0azzvluw = new Twig_Loader_Filesystem();
        $this->assertEquals(array(), $Vpnd0azzvluw->getPaths());
    }

    public function testGetNamespaces()
    {
        $Vpnd0azzvluw = new Twig_Loader_Filesystem(sys_get_temp_dir());
        $this->assertEquals(array(Twig_Loader_Filesystem::MAIN_NAMESPACE), $Vpnd0azzvluw->getNamespaces());

        $Vpnd0azzvluw->addPath(sys_get_temp_dir(), 'named');
        $this->assertEquals(array(Twig_Loader_Filesystem::MAIN_NAMESPACE, 'named'), $Vpnd0azzvluw->getNamespaces());
    }

    public function testFindTemplateExceptionNamespace()
    {
        $Vsm2vqr3ovy1 = dirname(__FILE__).'/Fixtures';

        $Vpnd0azzvluw = new Twig_Loader_Filesystem(array($Vsm2vqr3ovy1.'/normal'));
        $Vpnd0azzvluw->addPath($Vsm2vqr3ovy1.'/named', 'named');

        try {
            $Vpnd0azzvluw->getSource('@named/nowhere.html');
        } catch (Exception $Vawjopoun3xn) {
            $this->assertInstanceof('Twig_Error_Loader', $Vawjopoun3xn);
            $this->assertContains('Unable to find template "@named/nowhere.html"', $Vawjopoun3xn->getMessage());
        }
    }

    public function testFindTemplateWithCache()
    {
        $Vsm2vqr3ovy1 = dirname(__FILE__).'/Fixtures';

        $Vpnd0azzvluw = new Twig_Loader_Filesystem(array($Vsm2vqr3ovy1.'/normal'));
        $Vpnd0azzvluw->addPath($Vsm2vqr3ovy1.'/named', 'named');

        
        $Vuyqd0g3fngj = $Vpnd0azzvluw->getSource('@named/index.html');
        $this->assertEquals("named path\n", $Vuyqd0g3fngj);

        
        $this->assertEquals("path\n", $Vpnd0azzvluw->getSource('index.html'));
    }

    public function testLoadTemplateAndRenderBlockWithCache()
    {
        $Vpnd0azzvluw = new Twig_Loader_Filesystem(array());
        $Vpnd0azzvluw->addPath(dirname(__FILE__).'/Fixtures/themes/theme2');
        $Vpnd0azzvluw->addPath(dirname(__FILE__).'/Fixtures/themes/theme1');
        $Vpnd0azzvluw->addPath(dirname(__FILE__).'/Fixtures/themes/theme1', 'default_theme');

        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw);

        $V4lif0h4bhru = $V2cppyqdygng->loadTemplate('blocks.html.twig');
        $this->assertSame('block from theme 1', $V4lif0h4bhru->renderBlock('b1', array()));

        $V4lif0h4bhru = $V2cppyqdygng->loadTemplate('blocks.html.twig');
        $this->assertSame('block from theme 2', $V4lif0h4bhru->renderBlock('b2', array()));
    }

    public function getArrayInheritanceTests()
    {
        return array(
            'valid array inheritance' => array('array_inheritance_valid_parent.html.twig'),
            'array inheritance with null first template' => array('array_inheritance_null_parent.html.twig'),
            'array inheritance with empty first template' => array('array_inheritance_empty_parent.html.twig'),
            'array inheritance with non-existent first template' => array('array_inheritance_nonexistent_parent.html.twig'),
        );
    }

    
    public function testArrayInheritance($V4lif0h4bhruName)
    {
        $Vpnd0azzvluw = new Twig_Loader_Filesystem(array());
        $Vpnd0azzvluw->addPath(dirname(__FILE__).'/Fixtures/inheritance');

        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw);

        $V4lif0h4bhru = $V2cppyqdygng->loadTemplate($V4lif0h4bhruName);
        $this->assertSame('VALID Child', $V4lif0h4bhru->renderBlock('body', array()));
    }
}
