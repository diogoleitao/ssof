<?php



class Twig_Tests_Node_Expression_Unary_NegTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant(1, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Unary_Neg($Vj4whpw1etp0, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('node'));
    }

    public function getTests()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant(1, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Unary_Neg($Vz3fbiqci0vl, 1);

        return array(
            array($Vz3fbiqci0vl, '-1'),
            array(new Twig_Node_Expression_Unary_Neg($Vz3fbiqci0vl, 1), '- -1'),
        );
    }
}
