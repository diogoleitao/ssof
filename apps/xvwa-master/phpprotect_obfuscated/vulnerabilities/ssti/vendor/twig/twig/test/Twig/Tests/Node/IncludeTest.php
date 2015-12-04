<?php



class Twig_Tests_Node_IncludeTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo.twig', 1);
        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, null, false, false, 1);

        $this->assertNull($Vz3fbiqci0vl->getNode('variables'));
        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('expr'));
        $this->assertFalse($Vz3fbiqci0vl->getAttribute('only'));

        $Vbjmvcb1ypn3 = new Twig_Node_Expression_Array(array(new Twig_Node_Expression_Constant('foo', 1), new Twig_Node_Expression_Constant(true, 1)), 1);
        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, $Vbjmvcb1ypn3, true, false, 1);
        $this->assertEquals($Vbjmvcb1ypn3, $Vz3fbiqci0vl->getNode('variables'));
        $this->assertTrue($Vz3fbiqci0vl->getAttribute('only'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo.twig', 1);
        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, null, false, false, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$this->loadTemplate("foo.twig", null, 1)->display(\$Vhmvn2c55ghv);
EOF
        );

        $Vj4whpw1etp0 = new Twig_Node_Expression_Conditional(
                        new Twig_Node_Expression_Constant(true, 1),
                        new Twig_Node_Expression_Constant('foo', 1),
                        new Twig_Node_Expression_Constant('foo', 1),
                        0
                    );
        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, null, false, false, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$this->loadTemplate(((true) ? ("foo") : ("foo")), null, 1)->display(\$Vhmvn2c55ghv);
EOF
        );

        $Vj4whpw1etp0 = new Twig_Node_Expression_Constant('foo.twig', 1);
        $Vbjmvcb1ypn3 = new Twig_Node_Expression_Array(array(new Twig_Node_Expression_Constant('foo', 1), new Twig_Node_Expression_Constant(true, 1)), 1);
        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, $Vbjmvcb1ypn3, false, false, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$this->loadTemplate("foo.twig", null, 1)->display(array_merge(\$Vhmvn2c55ghv, array("foo" => true)));
EOF
        );

        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, $Vbjmvcb1ypn3, true, false, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$this->loadTemplate("foo.twig", null, 1)->display(array("foo" => true));
EOF
        );

        $Vz3fbiqci0vl = new Twig_Node_Include($Vj4whpw1etp0, $Vbjmvcb1ypn3, true, true, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

try {
    \$this->loadTemplate("foo.twig", null, 1)->display(array("foo" => true));
} catch (Twig_Error_Loader \$Vawjopoun3xn) {
    
}
EOF
        );

        return $V512ofmho3mi;
    }
}
