<?php



class Twig_Tests_Node_Expression_FunctionTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vkkm4e2vaxrv = 'function';
        $V4xqqawawaeh = new Twig_Node();
        $Vz3fbiqci0vl = new Twig_Node_Expression_Function($Vkkm4e2vaxrv, $V4xqqawawaeh, 1);

        $this->assertEquals($Vkkm4e2vaxrv, $Vz3fbiqci0vl->getAttribute('name'));
        $this->assertEquals($V4xqqawawaeh, $Vz3fbiqci0vl->getNode('arguments'));
    }

    public function getTests()
    {
        $Vcy0fru44kky = new Twig_Environment();
        $Vcy0fru44kky->addFunction(new Twig_SimpleFunction('foo', 'foo', array()));
        $Vcy0fru44kky->addFunction(new Twig_SimpleFunction('bar', 'bar', array('needs_environment' => true)));
        $Vcy0fru44kky->addFunction(new Twig_SimpleFunction('foofoo', 'foofoo', array('needs_context' => true)));
        $Vcy0fru44kky->addFunction(new Twig_SimpleFunction('foobar', 'foobar', array('needs_environment' => true, 'needs_context' => true)));
        $Vcy0fru44kky->addFunction(new Twig_SimpleFunction('barbar', 'twig_tests_function_barbar', array('is_variadic' => true)));

        $V512ofmho3mi = array();

        $Vz3fbiqci0vl = $this->createFunction('foo');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'foo()', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('foo', array(new Twig_Node_Expression_Constant('bar', 1), new Twig_Node_Expression_Constant('foobar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'foo("bar", "foobar")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('bar');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'bar($this->env)', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('bar', array(new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'bar($this->env, "bar")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('foofoo');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'foofoo($Vhmvn2c55ghv)', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('foofoo', array(new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'foofoo($Vhmvn2c55ghv, "bar")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('foobar');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'foobar($this->env, $Vhmvn2c55ghv)', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('foobar', array(new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'foobar($this->env, $Vhmvn2c55ghv, "bar")', $Vcy0fru44kky);

        
        $Vz3fbiqci0vl = $this->createFunction('date', array(
            'timezone' => new Twig_Node_Expression_Constant('America/Chicago', 1),
            'date' => new Twig_Node_Expression_Constant(0, 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_date_converter($this->env, 0, "America/Chicago")');

        
        $Vz3fbiqci0vl = $this->createFunction('barbar');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_function_barbar()', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('barbar', array('foo' => new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_function_barbar(null, null, array("foo" => "bar"))', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('barbar', array('arg2' => new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_function_barbar(null, "bar")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFunction('barbar', array(
            new Twig_Node_Expression_Constant('1', 1),
            new Twig_Node_Expression_Constant('2', 1),
            new Twig_Node_Expression_Constant('3', 1),
            'foo' => new Twig_Node_Expression_Constant('bar', 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_function_barbar("1", "2", array(0 => "3", "foo" => "bar"))', $Vcy0fru44kky);

        
        if (PHP_VERSION_ID >= 50300) {
            $Vz3fbiqci0vl = $this->createFunction('anonymous', array(new Twig_Node_Expression_Constant('foo', 1)));
            $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'call_user_func_array($this->env->getFunction(\'anonymous\')->getCallable(), array("foo"))');
        }

        return $V512ofmho3mi;
    }

    protected function createFunction($Vkkm4e2vaxrv, array $V02jggtj2kdh = array())
    {
        return new Twig_Node_Expression_Function($Vkkm4e2vaxrv, new Twig_Node($V02jggtj2kdh), 1);
    }

    protected function getEnvironment()
    {
        if (PHP_VERSION_ID >= 50300) {
            return include 'PHP53/FunctionInclude.php';
        }

        return parent::getEnvironment();
    }
}

function twig_tests_function_barbar($Vqe0fc4mt1mx = null, $V2gzabphfiad = null, array $V4xqqawawaeh = array())
{
}
