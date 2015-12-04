<?php



class Twig_Tests_Node_SandboxTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Sandbox($Vc5owkzetmkg, 1);

        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Sandbox($Vc5owkzetmkg, 1);

        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vw1ccafnn4lr = \$this->env->getExtension('sandbox');
if (!\$Vc5vp501jlbe = \$Vw1ccafnn4lr->isSandboxed()) {
    \$Vw1ccafnn4lr->enableSandbox();
}
echo "foo";
if (!\$Vc5vp501jlbe) {
    \$Vw1ccafnn4lr->disableSandbox();
}
EOF
        );

        return $V512ofmho3mi;
    }
}
