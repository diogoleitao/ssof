<?php



class Twig_Tests_Node_Expression_ConditionalTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vi3n3vjobu0w = new Twig_Node_Expression_Constant(1, 1);
        $Vfxdvj1ybfhn = new Twig_Node_Expression_Constant(2, 1);
        $Vn2g1w5bgl1r = new Twig_Node_Expression_Constant(3, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Conditional($Vi3n3vjobu0w, $Vfxdvj1ybfhn, $Vn2g1w5bgl1r, 1);

        $this->assertEquals($Vi3n3vjobu0w, $Vz3fbiqci0vl->getNode('expr1'));
        $this->assertEquals($Vfxdvj1ybfhn, $Vz3fbiqci0vl->getNode('expr2'));
        $this->assertEquals($Vn2g1w5bgl1r, $Vz3fbiqci0vl->getNode('expr3'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vi3n3vjobu0w = new Twig_Node_Expression_Constant(1, 1);
        $Vfxdvj1ybfhn = new Twig_Node_Expression_Constant(2, 1);
        $Vn2g1w5bgl1r = new Twig_Node_Expression_Constant(3, 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_Conditional($Vi3n3vjobu0w, $Vfxdvj1ybfhn, $Vn2g1w5bgl1r, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, '((1) ? (2) : (3))');

        return $V512ofmho3mi;
    }
}
