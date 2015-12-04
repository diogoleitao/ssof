<?php



class Twig_Tests_Node_MacroTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $V02jggtj2kdh = new Twig_Node(array(new Twig_Node_Expression_Name('foo', 1)), array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Macro('foo', $Vc5owkzetmkg, $V02jggtj2kdh, 1);

        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body'));
        $this->assertEquals($V02jggtj2kdh, $Vz3fbiqci0vl->getNode('arguments'));
        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $V02jggtj2kdh = new Twig_Node(array(
            'foo' => new Twig_Node_Expression_Constant(null, 1),
            'bar' => new Twig_Node_Expression_Constant('Foo', 1),
        ), array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Macro('foo', $Vc5owkzetmkg, $V02jggtj2kdh, 1);

        if (PHP_VERSION_ID >= 50600) {
            $Vcp4caaeooc1 = ', ...$Vnqk3ypoxmrb';
            $V21omjzbc1sr = '$Vnqk3ypoxmrb';
        } else {
            $Vcp4caaeooc1 = '';
            $V21omjzbc1sr = 'func_num_args() > 2 ? array_slice(func_get_args(), 2) : array()';
        }

        return array(
            array($Vz3fbiqci0vl, <<<EOF

public function getfoo(\$Vjjrklciq4c3 = null, \$V0xpvoedtbnf = "Foo"$Vcp4caaeooc1)
{
    \$Vhmvn2c55ghv = \$this->env->mergeGlobals(array(
        "foo" => \$Vjjrklciq4c3,
        "bar" => \$V0xpvoedtbnf,
        "varargs" => $V21omjzbc1sr,
    ));

    \$V1vzehiuu4u4 = array();

    ob_start();
    try {
        echo "foo";
    } catch (Exception \$Vawjopoun3xn) {
        ob_end_clean();

        throw \$Vawjopoun3xn;
    }

    return ('' === \$Valdd4n2jtbt = ob_get_clean()) ? '' : new Twig_Markup(\$Valdd4n2jtbt, \$this->env->getCharset());
}
EOF
            ),
        );
    }
}
