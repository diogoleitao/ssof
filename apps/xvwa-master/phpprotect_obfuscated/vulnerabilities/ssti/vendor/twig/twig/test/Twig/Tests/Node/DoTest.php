<?php



class Twig_Tests_Node_DoTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Do($Vj4whpw1etp0, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('expr'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Do($Vj4whpw1etp0, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, "// line 1\n\"foo\";");

        return $V512ofmho3mi;
    }
}
