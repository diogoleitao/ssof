<?php



class Twig_Tests_ErrorTest extends PHPUnit_Framework_TestCase
{
    public function testErrorWithObjectFilename()
    {
        $Vqqe0oqenswz = new Twig_Error('foo');
        $Vqqe0oqenswz->setTemplateFile(new SplFileInfo(__FILE__));

        $this->assertContains('test'.DIRECTORY_SEPARATOR.'Twig'.DIRECTORY_SEPARATOR.'Tests'.DIRECTORY_SEPARATOR.'ErrorTest.php', $Vqqe0oqenswz->getMessage());
    }

    public function testErrorWithArrayFilename()
    {
        $Vqqe0oqenswz = new Twig_Error('foo');
        $Vqqe0oqenswz->setTemplateFile(array('foo' => 'bar'));

        $this->assertEquals('foo in {"foo":"bar"}', $Vqqe0oqenswz->getMessage());
    }

    public function testTwigExceptionAddsFileAndLineWhenMissingWithInheritanceOnDisk()
    {
        $Vpnd0azzvluw = new Twig_Loader_Filesystem(dirname(__FILE__).'/Fixtures/errors');
        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw, array('strict_variables' => true, 'debug' => true, 'cache' => false));

        $V4lif0h4bhru = $V2cppyqdygng->loadTemplate('index.html');
        try {
            $V4lif0h4bhru->render(array());

            $this->fail();
        } catch (Twig_Error_Runtime $Vawjopoun3xn) {
            $this->assertEquals('Variable "foo" does not exist in "index.html" at line 3', $Vawjopoun3xn->getMessage());
            $this->assertEquals(3, $Vawjopoun3xn->getTemplateLine());
            $this->assertEquals('index.html', $Vawjopoun3xn->getTemplateFile());
        }

        try {
            $V4lif0h4bhru->render(array('foo' => new Twig_Tests_ErrorTest_Foo()));

            $this->fail();
        } catch (Twig_Error_Runtime $Vawjopoun3xn) {
            $this->assertEquals('An exception has been thrown during the rendering of a template ("Runtime error...") in "index.html" at line 3.', $Vawjopoun3xn->getMessage());
            $this->assertEquals(3, $Vawjopoun3xn->getTemplateLine());
            $this->assertEquals('index.html', $Vawjopoun3xn->getTemplateFile());
        }
    }

    
    public function testTwigExceptionAddsFileAndLine($V4lif0h4bhrus, $Vkkm4e2vaxrv, $V0devhuwbm4i)
    {
        $Vpnd0azzvluw = new Twig_Loader_Array($V4lif0h4bhrus);
        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw, array('strict_variables' => true, 'debug' => true, 'cache' => false));

        $V4lif0h4bhru = $V2cppyqdygng->loadTemplate('index');

        try {
            $V4lif0h4bhru->render(array());

            $this->fail();
        } catch (Twig_Error_Runtime $Vawjopoun3xn) {
            $this->assertEquals(sprintf('Variable "foo" does not exist in "%s" at line %d', $Vkkm4e2vaxrv, $V0devhuwbm4i), $Vawjopoun3xn->getMessage());
            $this->assertEquals($V0devhuwbm4i, $Vawjopoun3xn->getTemplateLine());
            $this->assertEquals($Vkkm4e2vaxrv, $Vawjopoun3xn->getTemplateFile());
        }

        try {
            $V4lif0h4bhru->render(array('foo' => new Twig_Tests_ErrorTest_Foo()));

            $this->fail();
        } catch (Twig_Error_Runtime $Vawjopoun3xn) {
            $this->assertEquals(sprintf('An exception has been thrown during the rendering of a template ("Runtime error...") in "%s" at line %d.', $Vkkm4e2vaxrv, $V0devhuwbm4i), $Vawjopoun3xn->getMessage());
            $this->assertEquals($V0devhuwbm4i, $Vawjopoun3xn->getTemplateLine());
            $this->assertEquals($Vkkm4e2vaxrv, $Vawjopoun3xn->getTemplateFile());
        }
    }

    public function getErroredTemplates()
    {
        return array(
            
            array(
                array(
                    'index' => "\n\n{{ foo.bar }}\n\n\n{{ 'foo' }}",
                ),
                'index', 3,
            ),

            
            array(
                array(
                    'index' => "{% include 'partial' %}",
                    'partial' => '{{ foo.bar }}',
                ),
                'partial', 1,
            ),

            
            array(
                array(
                    'index' => "{% extends 'base' %}
                    {% block content %}
                        {{ parent() }}
                    {% endblock %}",
                    'base' => '{% block content %}{{ foo.bar }}{% endblock %}',
                ),
                'base', 1,
            ),

            
            array(
                array(
                    'index' => "{% extends 'base' %}
                    {% block content %}
                        {{ foo.bar }}
                    {% endblock %}
                    {% block foo %}
                        {{ foo.bar }}
                    {% endblock %}",
                    'base' => '{% block content %}{% endblock %}',
                ),
                'index', 3,
            ),
        );
    }
}

class Twig_Tests_ErrorTest_Foo
{
    public function bar()
    {
        throw new Exception('Runtime error...');
    }
}
