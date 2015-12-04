<?php



class Twig_Tests_Node_PrintTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Print($Vj4whpw1etp0, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('expr'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();
        $V512ofmho3mi[] = array(new Twig_Node_Print(new Twig_Node_Expression_Constant('foo', 1), 1), "// line 1\necho \"foo\";");

        return $V512ofmho3mi;
    }
}
