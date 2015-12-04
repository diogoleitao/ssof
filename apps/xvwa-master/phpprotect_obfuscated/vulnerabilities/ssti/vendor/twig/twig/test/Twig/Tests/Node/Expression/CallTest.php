<?php



class Twig_Tests_Node_Expression_CallTest extends PHPUnit_Framework_TestCase
{
    public function testGetArguments()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'date'));
        $this->assertEquals(array('U', null), $Vz3fbiqci0vl->getArguments('date', array('format' => 'U', 'timestamp' => null)));
    }

    
    public function testGetArgumentsWhenPositionalArgumentsAfterNamedArguments()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'date'));
        $Vz3fbiqci0vl->getArguments('date', array('timestamp' => 123456, 'Y-m-d'));
    }

    
    public function testGetArgumentsWhenArgumentIsDefinedTwice()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'date'));
        $Vz3fbiqci0vl->getArguments('date', array('Y-m-d', 'format' => 'U'));
    }

    
    public function testGetArgumentsWithWrongNamedArgumentName()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'date'));
        $Vz3fbiqci0vl->getArguments('date', array('Y-m-d', 'timestamp' => null, 'unknown' => ''));
    }

    
    public function testGetArgumentsWithWrongNamedArgumentNames()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'date'));
        $Vz3fbiqci0vl->getArguments('date', array('Y-m-d', 'timestamp' => null, 'unknown1' => '', 'unknown2' => ''));
    }

    
    public function testResolveArgumentsWithMissingValueForOptionalArgument()
    {
        if (defined('HHVM_VERSION')) {
            $this->markTestSkipped('Skip under HHVM as the behavior is not the same as plain PHP (which is an edge case anyway)');
        }

        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'substr_compare'));
        $Vz3fbiqci0vl->getArguments('substr_compare', array('abcd', 'bc', 'offset' => 1, 'case_sensitivity' => true));
    }

    public function testResolveArgumentsOnlyNecessaryArgumentsForCustomFunction()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'custom_function'));

        $this->assertEquals(array('arg1'), $Vz3fbiqci0vl->getArguments(array($this, 'customFunction'), array('arg1' => 'arg1')));
    }

    public function testGetArgumentsForStaticMethod()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'custom_static_function'));
        $this->assertEquals(array('arg1'), $Vz3fbiqci0vl->getArguments(__CLASS__.'::customStaticFunction', array('arg1' => 'arg1')));
    }

    
    public function testResolveArgumentsWithMissingParameterForArbitraryArguments()
    {
        $Vz3fbiqci0vl = new Twig_Tests_Node_Expression_Call(array(), array('type' => 'function', 'name' => 'foo', 'is_variadic' => true));
        $Vz3fbiqci0vl->getArguments(array($this, 'customFunctionWithArbitraryArguments'), array());
    }

    public static function customStaticFunction($Vqe0fc4mt1mx, $V2gzabphfiad = 'default', $Vw043td3uoxu = array())
    {
    }

    public function customFunction($Vqe0fc4mt1mx, $V2gzabphfiad = 'default', $Vw043td3uoxu = array())
    {
    }

    public function customFunctionWithArbitraryArguments()
    {
    }
}

class Twig_Tests_Node_Expression_Call extends Twig_Node_Expression_Call
{
    public function getArguments($Vicg521opc2w, $V02jggtj2kdh)
    {
        return parent::getArguments($Vicg521opc2w, $V02jggtj2kdh);
    }
}
