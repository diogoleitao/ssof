<?php



class Twig_Tests_Node_Expression_ConstantTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant('foo', 1);

        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('value'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant('foo', 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, '"foo"');

        return $V512ofmho3mi;
    }
}
