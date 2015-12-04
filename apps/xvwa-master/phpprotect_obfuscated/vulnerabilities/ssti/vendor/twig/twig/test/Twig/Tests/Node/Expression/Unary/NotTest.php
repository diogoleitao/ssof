<?php



class Twig_Tests_Node_Expression_Unary_NotTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant(1, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Unary_Not($Vj4whpw1etp0, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('node'));
    }

    public function getTests()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant(1, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Unary_Not($Vz3fbiqci0vl, 1);

        return array(
            array($Vz3fbiqci0vl, '!1'),
        );
    }
}
