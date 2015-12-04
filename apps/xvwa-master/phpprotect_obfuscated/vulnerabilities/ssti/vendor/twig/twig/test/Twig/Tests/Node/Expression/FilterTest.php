<?php



class Twig_Tests_Node_Expression_FilterTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vkkm4e2vaxrv = new Twig_Node_Expression_Constant('upper', 1);
        $V4xqqawawaeh = new Twig_Node();
        $Vz3fbiqci0vl = new Twig_Node_Expression_Filter($Vj4whpw1etp0, $Vkkm4e2vaxrv, $V4xqqawawaeh, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('node'));
        $this->assertEquals($Vkkm4e2vaxrv, $Vz3fbiqci0vl->getNode('filter'));
        $this->assertEquals($V4xqqawawaeh, $Vz3fbiqci0vl->getNode('arguments'));
    }

    public function getTests()
    {
        $Vcy0fru44kky = new Twig_Environment();
        $Vcy0fru44kky->addFilter(new Twig_SimpleFilter('bar', 'bar', array('needs_environment' => true)));
        $Vcy0fru44kky->addFilter(new Twig_SimpleFilter('barbar', 'twig_tests_filter_barbar', array('needs_context' => true, 'is_variadic' => true)));

        $V512ofmho3mi = array();

        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vz3fbiqci0vl = $this->createFilter($Vj4whpw1etp0, 'upper');
        $Vz3fbiqci0vl = $this->createFilter($Vz3fbiqci0vl, 'number_format', array(new Twig_Node_Expression_Constant(2, 1), new Twig_Node_Expression_Constant('.', 1), new Twig_Node_Expression_Constant(',', 1)));

        if (function_exists('mb_get_info')) {
            $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_number_format_filter($this->env, twig_upper_filter($this->env, "foo"), 2, ".", ",")');
        } else {
            $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_number_format_filter($this->env, strtoupper("foo"), 2, ".", ",")');
        }

        
        $Vr1gl0j03kjs = new Twig_Node_Expression_Constant(0, 1);
        $Vz3fbiqci0vl = $this->createFilter($Vr1gl0j03kjs, 'date', array(
            'timezone' => new Twig_Node_Expression_Constant('America/Chicago', 1),
            'format' => new Twig_Node_Expression_Constant('d/m/Y H:i:s P', 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_date_format_filter($this->env, 0, "d/m/Y H:i:s P", "America/Chicago")');

        
        $Vr1gl0j03kjs = new Twig_Node_Expression_Constant(0, 1);
        $Vz3fbiqci0vl = $this->createFilter($Vr1gl0j03kjs, 'date', array(
            'timezone' => new Twig_Node_Expression_Constant('America/Chicago', 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_date_format_filter($this->env, 0, null, "America/Chicago")');

        
        $Viabwp03n3sk = new Twig_Node_Expression_Constant('abc', 1);
        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'reverse', array(
            'preserve_keys' => new Twig_Node_Expression_Constant(true, 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_reverse_filter($this->env, "abc", true)');
        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'reverse', array(
            'preserveKeys' => new Twig_Node_Expression_Constant(true, 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_reverse_filter($this->env, "abc", true)');

        
        if (PHP_VERSION_ID >= 50300) {
            $Vz3fbiqci0vl = $this->createFilter(new Twig_Node_Expression_Constant('foo', 1), 'anonymous');
            $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'call_user_func_array($this->env->getFilter(\'anonymous\')->getCallable(), array("foo"))');
        }

        
        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'bar');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'bar($this->env, "abc")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'bar', array(new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'bar($this->env, "abc", "bar")', $Vcy0fru44kky);

        
        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'barbar');
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_filter_barbar($Vhmvn2c55ghv, "abc")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'barbar', array('foo' => new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_filter_barbar($Vhmvn2c55ghv, "abc", null, null, array("foo" => "bar"))', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'barbar', array('arg2' => new Twig_Node_Expression_Constant('bar', 1)));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_filter_barbar($Vhmvn2c55ghv, "abc", null, "bar")', $Vcy0fru44kky);

        $Vz3fbiqci0vl = $this->createFilter($Viabwp03n3sk, 'barbar', array(
            new Twig_Node_Expression_Constant('1', 1),
            new Twig_Node_Expression_Constant('2', 1),
            new Twig_Node_Expression_Constant('3', 1),
            'foo' => new Twig_Node_Expression_Constant('bar', 1),
        ));
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, 'twig_tests_filter_barbar($Vhmvn2c55ghv, "abc", "1", "2", array(0 => "3", "foo" => "bar"))', $Vcy0fru44kky);

        return $V512ofmho3mi;
    }

    
    public function testCompileWithWrongNamedArgumentName()
    {
        $Vr1gl0j03kjs = new Twig_Node_Expression_Constant(0, 1);
        $Vz3fbiqci0vl = $this->createFilter($Vr1gl0j03kjs, 'date', array(
            'foobar' => new Twig_Node_Expression_Constant('America/Chicago', 1),
        ));

        $V3hf0s3ktsxh = $this->getCompiler();
        $V3hf0s3ktsxh->compile($Vz3fbiqci0vl);
    }

    
    public function testCompileWithMissingNamedArgument()
    {
        $V2dijfr3ez0f = new Twig_Node_Expression_Constant(0, 1);
        $Vz3fbiqci0vl = $this->createFilter($V2dijfr3ez0f, 'replace', array(
            'to' => new Twig_Node_Expression_Constant('foo', 1),
        ));

        $V3hf0s3ktsxh = $this->getCompiler();
        $V3hf0s3ktsxh->compile($Vz3fbiqci0vl);
    }

    protected function createFilter($Vz3fbiqci0vl, $Vkkm4e2vaxrv, array $V02jggtj2kdh = array())
    {
        $Vkkm4e2vaxrv = new Twig_Node_Expression_Constant($Vkkm4e2vaxrv, 1);
        $V02jggtj2kdh = new Twig_Node($V02jggtj2kdh);

        return new Twig_Node_Expression_Filter($Vz3fbiqci0vl, $Vkkm4e2vaxrv, $V02jggtj2kdh, 1);
    }

    protected function getEnvironment()
    {
        if (PHP_VERSION_ID >= 50300) {
            return include 'PHP53/FilterInclude.php';
        }

        return parent::getEnvironment();
    }
}

function twig_tests_filter_barbar($Vhmvn2c55ghv, $Viabwp03n3sk, $Vqe0fc4mt1mx = null, $V2gzabphfiad = null, array $V4xqqawawaeh = array())
{
}
