<?php



class Twig_Tests_Node_SetTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5m2qpa3jyp = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1);
        $Vpek50boolgn = new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 1)), array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Set(false, $Vc5m2qpa3jyp, $Vpek50boolgn, 1);

        $this->assertEquals($Vc5m2qpa3jyp, $Vz3fbiqci0vl->getNode('names'));
        $this->assertEquals($Vpek50boolgn, $Vz3fbiqci0vl->getNode('values'));
        $this->assertFalse($Vz3fbiqci0vl->getAttribute('capture'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vc5m2qpa3jyp = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1);
        $Vpek50boolgn = new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 1)), array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Set(false, $Vc5m2qpa3jyp, $Vpek50boolgn, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv["foo"] = "foo";
EOF
        );

        $Vc5m2qpa3jyp = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1);
        $Vpek50boolgn = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Constant('foo', 1), 1)), array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Set(true, $Vc5m2qpa3jyp, $Vpek50boolgn, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

ob_start();
echo "foo";
\$Vhmvn2c55ghv["foo"] = ('' === \$Valdd4n2jtbt = ob_get_clean()) ? '' : new Twig_Markup(\$Valdd4n2jtbt, \$this->env->getCharset());
EOF
        );

        $Vc5m2qpa3jyp = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1);
        $Vpek50boolgn = new Twig_Node_Text('foo', 1);
        $Vz3fbiqci0vl = new Twig_Node_Set(true, $Vc5m2qpa3jyp, $Vpek50boolgn, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv["foo"] = ('' === \$Valdd4n2jtbt = "foo") ? '' : new Twig_Markup(\$Valdd4n2jtbt, \$this->env->getCharset());
EOF
        );

        $Vc5m2qpa3jyp = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1), new Twig_Node_Expression_AssignName('bar', 1)), array(), 1);
        $Vpek50boolgn = new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 1), new Twig_Node_Expression_Name('bar', 1)), array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Set(false, $Vc5m2qpa3jyp, $Vpek50boolgn, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

list(\$Vhmvn2c55ghv["foo"], \$Vhmvn2c55ghv["bar"]) = array("foo", {$this->getVariableGetter('bar')});
EOF
        );

        return $V512ofmho3mi;
    }
}
