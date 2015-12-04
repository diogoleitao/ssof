<?php



class Twig_Tests_Node_SpacelessTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Text('<div>   <div>   foo   </div>   </div>', 1)));
        $Vz3fbiqci0vl = new Twig_Node_Spaceless($Vc5owkzetmkg, 1);

        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body'));
    }

    public function getTests()
    {
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Text('<div>   <div>   foo   </div>   </div>', 1)));
        $Vz3fbiqci0vl = new Twig_Node_Spaceless($Vc5owkzetmkg, 1);

        return array(
            array($Vz3fbiqci0vl, <<<EOF

ob_start();
echo "<div>   <div>   foo   </div>   </div>";
echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
EOF
            ),
        );
    }
}
