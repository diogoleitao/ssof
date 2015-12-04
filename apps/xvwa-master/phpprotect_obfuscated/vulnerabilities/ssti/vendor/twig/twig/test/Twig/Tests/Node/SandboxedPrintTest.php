<?php



class Twig_Tests_Node_SandboxedPrintTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_SandboxedPrint($Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo', 1), 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('expr'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $V512ofmho3mi[] = array(new Twig_Node_SandboxedPrint(new Twig_Node_Expression_Constant('foo', 1), 1), <<<EOF

echo \$this->env->getExtension('sandbox')->ensureToStringAllowed("foo");
EOF
        );

        return $V512ofmho3mi;
    }
}
