<?php



class Twig_Tests_Node_Expression_TestTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vkkm4e2vaxrv = new Twig_Node_Expression_Constant('null', 1);
        $V4xqqawawaeh = new Twig_Node();
        $Vz3fbiqci0vl = new Twig_Node_Expression_Test($Vj4whpw1etp0, $Vkkm4e2vaxrv, $V4xqqawawaeh, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('node'));
        $this->assertEquals($V4xqqawawaeh, $Vz3fbiqci0vl->getNode('arguments'));
        $this->assertEquals($Vkkm4e2vaxrv, $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        $Vcy0fru44kky = new Twig_Environment();
        $Vcy0fru44kky->addTest(new Twig_SimpleTest('barbar', 'twig_tests_test_barbar', array('is_variadic' => true, 'need_context' => true)));

        $V512ofmho3mi = array();

        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Test_Null($Vj4whpw1etp0, 'null', new Twig_Node(array()), 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, '(null === "foo")');

        
        if (PHP_VERSION_ID >= 50300) {
            $Vz3fbiqci0vl = $this->createTest(new Twig_Node_Expression_Constant('foo', 1), 'anonymous', array(new Twig_Node_Expression_Constant('foo', 1)));
            $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'call_user_func_array($this->env->getTest(\'anonymous\')->getCallable(), array("foo", "foo"))');
        }

        
        $Viabwp03n3sk = new Twig_Node_Expression_Constant('abc', 1);
        $Vz3fbiqci0vl = $this->createTest($Viabwp03n3sk, 'barbar');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_test_barbar("abc")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createTest($Viabwp03n3sk, 'barbar', array('foo' => new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_test_barbar("abc", null, null, array("foo" => "bar"))', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createTest($Viabwp03n3sk, 'barbar', array('arg2' => new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_test_barbar("abc", null, "bar")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createTest($Viabwp03n3sk, 'barbar', array(
            new Twig_Node_Expression_Constant('1', 1),
            new Twig_Node_Expression_Constant('2', 1),
            new Twig_Node_Expression_Constant('3', 1),
            'foo' => new Twig_Node_Expression_Constant('bar', 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_test_barbar("abc", "1", "2", array(0 => "3", "foo" => "bar"))', $Vcy0fru44kky);

        return $V512ofmho3mi;
    }

    protected function createTest($Vz3fbiqci0vl, $Vkkm4e2vaxrv, array $V02jggtj2kdh = array())
    {
        return new Twig_Node_Expression_Test($Vz3fbiqci0vl, $Vkkm4e2vaxrv, new Twig_Node($V02jggtj2kdh), 1);
    }

    protected function getEnvironment()
    {
        if (PHP_VERSION_ID >= 50300) {
            return include 'PHP53/TestInclude.php';
        }

        return parent::getEnvironment();
    }
}

function twig_tests_test_barbar($Viabwp03n3sk, $Vqe0fc4mt1mx = null, $V2gzabphfiad = null, array $V4xqqawawaeh = array())
{
}
