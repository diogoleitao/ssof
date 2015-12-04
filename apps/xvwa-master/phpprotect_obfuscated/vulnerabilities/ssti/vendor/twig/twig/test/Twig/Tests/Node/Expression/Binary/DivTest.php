<?php



class Twig_Tests_Node_Expression_Binary_DivTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vh3ibowzun00 = new Twig_Node_Expression_Constant(1, 1);
        $Vz5te4hbfoxv = new Twig_Node_Expression_Constant(2, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Binary_Div($Vh3ibowzun00, $Vz5te4hbfoxv, 1);

        $this->assertEquals($Vh3ibowzun00, $Vz3fbiqci0vl->getNode('left'));
        $this->assertEquals($Vz5te4hbfoxv, $Vz3fbiqci0vl->getNode('right'));
    }

    public function getTests()
    {
        $Vh3ibowzun00 = new Twig_Node_Expression_Constant(1, 1);
        $Vz5te4hbfoxv = new Twig_Node_Expression_Constant(2, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Binary_Div($Vh3ibowzun00, $Vz5te4hbfoxv, 1);

        return array(
            array($Vz3fbiqci0vl, '(1 / 2)'),
        );
    }
}
