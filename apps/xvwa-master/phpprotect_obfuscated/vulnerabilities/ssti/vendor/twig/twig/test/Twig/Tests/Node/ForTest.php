<?php



class Twig_Tests_Node_ForTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vknwqh0mapks = new Twig_Node_Expression_AssignName('key', 1);
        $Vr3fkhakslod = new Twig_Node_Expression_AssignName('item', 1);
        $Vngl2xdldp0y = new Twig_Node_Expression_Name('items', 1);
        $Vsp4nllgbxbn = new Twig_Node_Expression_Constant(true, 1);
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, 1);
        $Vz3fbiqci0vl->setAttribute('with_loop', false);

        $this->assertEquals($Vknwqh0mapks, $Vz3fbiqci0vl->getNode('key_target'));
        $this->assertEquals($Vr3fkhakslod, $Vz3fbiqci0vl->getNode('value_target'));
        $this->assertEquals($Vngl2xdldp0y, $Vz3fbiqci0vl->getNode('seq'));
        $this->assertTrue($Vz3fbiqci0vl->getAttribute('ifexpr'));
        $this->assertEquals('Twig_Node_If', get_class($Vz3fbiqci0vl->getNode('body')));
        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body')->getNode('tests')->getNode(1)->getNode(0));
        $this->assertNull($Vz3fbiqci0vl->getNode('else'));

        $Vjut20h40opi = new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1);
        $Vz3fbiqci0vl = new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, 1);
        $Vz3fbiqci0vl->setAttribute('with_loop', false);
        $this->assertEquals($Vjut20h40opi, $Vz3fbiqci0vl->getNode('else'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vknwqh0mapks = new Twig_Node_Expression_AssignName('key', 1);
        $Vr3fkhakslod = new Twig_Node_Expression_AssignName('item', 1);
        $Vngl2xdldp0y = new Twig_Node_Expression_Name('items', 1);
        $Vsp4nllgbxbn = null;
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, 1);
        $Vz3fbiqci0vl->setAttribute('with_loop', false);

        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv['_parent'] = (array) \$Vhmvn2c55ghv;
\$Vhmvn2c55ghv['_seq'] = twig_ensure_traversable({$this->getVariableGetter('items')});
foreach (\$Vhmvn2c55ghv['_seq'] as \$Vhmvn2c55ghv["key"] => \$Vhmvn2c55ghv["item"]) {
    echo {$this->getVariableGetter('foo')};
}
\$Vyondy1qwhw0 = \$Vhmvn2c55ghv['_parent'];
unset(\$Vhmvn2c55ghv['_seq'], \$Vhmvn2c55ghv['_iterated'], \$Vhmvn2c55ghv['key'], \$Vhmvn2c55ghv['item'], \$Vhmvn2c55ghv['_parent'], \$Vhmvn2c55ghv['loop']);
\$Vhmvn2c55ghv = array_intersect_key(\$Vhmvn2c55ghv, \$Vyondy1qwhw0) + \$Vyondy1qwhw0;
EOF
        );

        $Vknwqh0mapks = new Twig_Node_Expression_AssignName('k', 1);
        $Vr3fkhakslod = new Twig_Node_Expression_AssignName('v', 1);
        $Vngl2xdldp0y = new Twig_Node_Expression_Name('values', 1);
        $Vsp4nllgbxbn = null;
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, 1);
        $Vz3fbiqci0vl->setAttribute('with_loop', true);

        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv['_parent'] = (array) \$Vhmvn2c55ghv;
\$Vhmvn2c55ghv['_seq'] = twig_ensure_traversable({$this->getVariableGetter('values')});
\$Vhmvn2c55ghv['loop'] = array(
  'parent' => \$Vhmvn2c55ghv['_parent'],
  'index0' => 0,
  'index'  => 1,
  'first'  => true,
);
if (is_array(\$Vhmvn2c55ghv['_seq']) || (is_object(\$Vhmvn2c55ghv['_seq']) && \$Vhmvn2c55ghv['_seq'] instanceof Countable)) {
    \$Vac2bf3qhtlh = count(\$Vhmvn2c55ghv['_seq']);
    \$Vhmvn2c55ghv['loop']['revindex0'] = \$Vac2bf3qhtlh - 1;
    \$Vhmvn2c55ghv['loop']['revindex'] = \$Vac2bf3qhtlh;
    \$Vhmvn2c55ghv['loop']['length'] = \$Vac2bf3qhtlh;
    \$Vhmvn2c55ghv['loop']['last'] = 1 === \$Vac2bf3qhtlh;
}
foreach (\$Vhmvn2c55ghv['_seq'] as \$Vhmvn2c55ghv["k"] => \$Vhmvn2c55ghv["v"]) {
    echo {$this->getVariableGetter('foo')};
    ++\$Vhmvn2c55ghv['loop']['index0'];
    ++\$Vhmvn2c55ghv['loop']['index'];
    \$Vhmvn2c55ghv['loop']['first'] = false;
    if (isset(\$Vhmvn2c55ghv['loop']['length'])) {
        --\$Vhmvn2c55ghv['loop']['revindex0'];
        --\$Vhmvn2c55ghv['loop']['revindex'];
        \$Vhmvn2c55ghv['loop']['last'] = 0 === \$Vhmvn2c55ghv['loop']['revindex0'];
    }
}
\$Vyondy1qwhw0 = \$Vhmvn2c55ghv['_parent'];
unset(\$Vhmvn2c55ghv['_seq'], \$Vhmvn2c55ghv['_iterated'], \$Vhmvn2c55ghv['k'], \$Vhmvn2c55ghv['v'], \$Vhmvn2c55ghv['_parent'], \$Vhmvn2c55ghv['loop']);
\$Vhmvn2c55ghv = array_intersect_key(\$Vhmvn2c55ghv, \$Vyondy1qwhw0) + \$Vyondy1qwhw0;
EOF
        );

        $Vknwqh0mapks = new Twig_Node_Expression_AssignName('k', 1);
        $Vr3fkhakslod = new Twig_Node_Expression_AssignName('v', 1);
        $Vngl2xdldp0y = new Twig_Node_Expression_Name('values', 1);
        $Vsp4nllgbxbn = new Twig_Node_Expression_Constant(true, 1);
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, 1);
        $Vz3fbiqci0vl->setAttribute('with_loop', true);

        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv['_parent'] = (array) \$Vhmvn2c55ghv;
\$Vhmvn2c55ghv['_seq'] = twig_ensure_traversable({$this->getVariableGetter('values')});
\$Vhmvn2c55ghv['loop'] = array(
  'parent' => \$Vhmvn2c55ghv['_parent'],
  'index0' => 0,
  'index'  => 1,
  'first'  => true,
);
foreach (\$Vhmvn2c55ghv['_seq'] as \$Vhmvn2c55ghv["k"] => \$Vhmvn2c55ghv["v"]) {
    if (true) {
        echo {$this->getVariableGetter('foo')};
        ++\$Vhmvn2c55ghv['loop']['index0'];
        ++\$Vhmvn2c55ghv['loop']['index'];
        \$Vhmvn2c55ghv['loop']['first'] = false;
    }
}
\$Vyondy1qwhw0 = \$Vhmvn2c55ghv['_parent'];
unset(\$Vhmvn2c55ghv['_seq'], \$Vhmvn2c55ghv['_iterated'], \$Vhmvn2c55ghv['k'], \$Vhmvn2c55ghv['v'], \$Vhmvn2c55ghv['_parent'], \$Vhmvn2c55ghv['loop']);
\$Vhmvn2c55ghv = array_intersect_key(\$Vhmvn2c55ghv, \$Vyondy1qwhw0) + \$Vyondy1qwhw0;
EOF
        );

        $Vknwqh0mapks = new Twig_Node_Expression_AssignName('k', 1);
        $Vr3fkhakslod = new Twig_Node_Expression_AssignName('v', 1);
        $Vngl2xdldp0y = new Twig_Node_Expression_Name('values', 1);
        $Vsp4nllgbxbn = null;
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1);
        $Vjut20h40opi = new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1);
        $Vz3fbiqci0vl = new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, 1);
        $Vz3fbiqci0vl->setAttribute('with_loop', true);

        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF

\$Vhmvn2c55ghv['_parent'] = (array) \$Vhmvn2c55ghv;
\$Vhmvn2c55ghv['_seq'] = twig_ensure_traversable({$this->getVariableGetter('values')});
\$Vhmvn2c55ghv['_iterated'] = false;
\$Vhmvn2c55ghv['loop'] = array(
  'parent' => \$Vhmvn2c55ghv['_parent'],
  'index0' => 0,
  'index'  => 1,
  'first'  => true,
);
if (is_array(\$Vhmvn2c55ghv['_seq']) || (is_object(\$Vhmvn2c55ghv['_seq']) && \$Vhmvn2c55ghv['_seq'] instanceof Countable)) {
    \$Vac2bf3qhtlh = count(\$Vhmvn2c55ghv['_seq']);
    \$Vhmvn2c55ghv['loop']['revindex0'] = \$Vac2bf3qhtlh - 1;
    \$Vhmvn2c55ghv['loop']['revindex'] = \$Vac2bf3qhtlh;
    \$Vhmvn2c55ghv['loop']['length'] = \$Vac2bf3qhtlh;
    \$Vhmvn2c55ghv['loop']['last'] = 1 === \$Vac2bf3qhtlh;
}
foreach (\$Vhmvn2c55ghv['_seq'] as \$Vhmvn2c55ghv["k"] => \$Vhmvn2c55ghv["v"]) {
    echo {$this->getVariableGetter('foo')};
    \$Vhmvn2c55ghv['_iterated'] = true;
    ++\$Vhmvn2c55ghv['loop']['index0'];
    ++\$Vhmvn2c55ghv['loop']['index'];
    \$Vhmvn2c55ghv['loop']['first'] = false;
    if (isset(\$Vhmvn2c55ghv['loop']['length'])) {
        --\$Vhmvn2c55ghv['loop']['revindex0'];
        --\$Vhmvn2c55ghv['loop']['revindex'];
        \$Vhmvn2c55ghv['loop']['last'] = 0 === \$Vhmvn2c55ghv['loop']['revindex0'];
    }
}
if (!\$Vhmvn2c55ghv['_iterated']) {
    echo {$this->getVariableGetter('foo')};
}
\$Vyondy1qwhw0 = \$Vhmvn2c55ghv['_parent'];
unset(\$Vhmvn2c55ghv['_seq'], \$Vhmvn2c55ghv['_iterated'], \$Vhmvn2c55ghv['k'], \$Vhmvn2c55ghv['v'], \$Vhmvn2c55ghv['_parent'], \$Vhmvn2c55ghv['loop']);
\$Vhmvn2c55ghv = array_intersect_key(\$Vhmvn2c55ghv, \$Vyondy1qwhw0) + \$Vyondy1qwhw0;
EOF
        );

        return $V512ofmho3mi;
    }
}
