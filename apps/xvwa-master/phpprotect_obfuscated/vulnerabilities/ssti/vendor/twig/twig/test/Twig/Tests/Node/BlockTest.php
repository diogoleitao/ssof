<?php



class Twig_Tests_Node_BlockTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Block('foo', $Vc5owkzetmkg, 1);

        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body'));
        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Block('foo', $Vc5owkzetmkg, 1);

        return array(
            array($Vz3fbiqci0vl, <<<EOF

public function block_foo(\$Vhmvn2c55ghv, array \$V1vzehiuu4u4 = array())
{
    echo "foo";
}
EOF
            ),
        );
    }
}
