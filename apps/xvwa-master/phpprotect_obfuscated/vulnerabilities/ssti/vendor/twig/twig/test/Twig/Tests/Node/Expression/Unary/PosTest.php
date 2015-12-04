<?php



class Twig_Tests_Node_Expression_Unary_PosTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant(1, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Unary_Pos($Vj4whpw1etp0, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('node'));
    }

    public function getTests()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant(1, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Unary_Pos($Vz3fbiqci0vl, 1);

        return array(
            array($Vz3fbiqci0vl, '+1'),
        );
    }
}
