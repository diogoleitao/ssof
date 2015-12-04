<?php



class Twig_Tests_Node_ImportTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vja2lgdp4gkw = new Twig_Node_Expression_Constant('foo.twig', 1);
        $Vl2x41mifdiq = new Twig_Node_Expression_AssignName('macro', 1);
        $Vz3fbiqci0vl = new Twig_Node_Import($Vja2lgdp4gkw, $Vl2x41mifdiq, 1);

        $this->assertEquals($Vja2lgdp4gkw, $Vz3fbiqci0vl->getNode('expr'));
        $this->assertEquals($Vl2x41mifdiq, $Vz3fbiqci0vl->getNode('var'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vja2lgdp4gkw = new Twig_Node_Expression_Constant('foo.twig', 1);
        $Vl2x41mifdiq = new Twig_Node_Expression_AssignName('macro', 1);
        $Vz3fbiqci0vl = new Twig_Node_Import($Vja2lgdp4gkw, $Vl2x41mifdiq, 1);

        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv["macro"] = \$this->loadTemplate("foo.twig", null, 1);
EOF
        );

        return $V512ofmho3mi;
    }
}
