<?php



class Twig_Tests_Node_BlockReferenceTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_BlockReference('foo', 1);

        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        return array(
            array(new Twig_Node_BlockReference('foo', 1), <<<EOF

\$this->displayBlock('foo', \$Vhmvn2c55ghv, \$V1vzehiuu4u4);
EOF
            ),
        );
    }
}
