<?php
class Twig_Tests_Node_ForTest extends Twig_Test_NodeTestCase { public function testConstructor() { $spf6dbe1 = new Twig_Node_Expression_AssignName('key', 1); $spf730ed = new Twig_Node_Expression_AssignName('item', 1); $spf6a5d7 = new Twig_Node_Expression_Name('items', 1); $sp8ff448 = new Twig_Node_Expression_Constant(true, 1); $sp1965de = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1); $sp4fa8a7 = null; $spcefb62 = new Twig_Node_For($spf6dbe1, $spf730ed, $spf6a5d7, $sp8ff448, $sp1965de, $sp4fa8a7, 1); $spcefb62->setAttribute('with_loop', false); $this->assertEquals($spf6dbe1, $spcefb62->getNode('key_target')); $this->assertEquals($spf730ed, $spcefb62->getNode('value_target')); $this->assertEquals($spf6a5d7, $spcefb62->getNode('seq')); $this->assertTrue($spcefb62->getAttribute('ifexpr')); $this->assertEquals('Twig_Node_If', get_class($spcefb62->getNode('body'))); $this->assertEquals($sp1965de, $spcefb62->getNode('body')->getNode('tests')->getNode(1)->getNode(0)); $this->assertNull($spcefb62->getNode('else')); $sp4fa8a7 = new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1); $spcefb62 = new Twig_Node_For($spf6dbe1, $spf730ed, $spf6a5d7, $sp8ff448, $sp1965de, $sp4fa8a7, 1); $spcefb62->setAttribute('with_loop', false); $this->assertEquals($sp4fa8a7, $spcefb62->getNode('else')); } public function getTests() { $sp754928 = array(); $spf6dbe1 = new Twig_Node_Expression_AssignName('key', 1); $spf730ed = new Twig_Node_Expression_AssignName('item', 1); $spf6a5d7 = new Twig_Node_Expression_Name('items', 1); $sp8ff448 = null; $sp1965de = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1); $sp4fa8a7 = null; $spcefb62 = new Twig_Node_For($spf6dbe1, $spf730ed, $spf6a5d7, $sp8ff448, $sp1965de, $sp4fa8a7, 1); $spcefb62->setAttribute('with_loop', false); $sp754928[] = array($spcefb62, "// line 1\n\$context['_parent'] = (array) \$context;\n\$context['_seq'] = twig_ensure_traversable({$this->getVariableGetter('items')});\nforeach (\$context['_seq'] as \$context[\"key\"] => \$context[\"item\"]) {\n    echo {$this->getVariableGetter('foo')};\n}\n\$_parent = \$context['_parent'];\nunset(\$context['_seq'], \$context['_iterated'], \$context['key'], \$context['item'], \$context['_parent'], \$context['loop']);\n\$context = array_intersect_key(\$context, \$_parent) + \$_parent;"); $spf6dbe1 = new Twig_Node_Expression_AssignName('k', 1); $spf730ed = new Twig_Node_Expression_AssignName('v', 1); $spf6a5d7 = new Twig_Node_Expression_Name('values', 1); $sp8ff448 = null; $sp1965de = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1); $sp4fa8a7 = null; $spcefb62 = new Twig_Node_For($spf6dbe1, $spf730ed, $spf6a5d7, $sp8ff448, $sp1965de, $sp4fa8a7, 1); $spcefb62->setAttribute('with_loop', true); $sp754928[] = array($spcefb62, "// line 1\n\$context['_parent'] = (array) \$context;\n\$context['_seq'] = twig_ensure_traversable({$this->getVariableGetter('values')});\n\$context['loop'] = array(\n  'parent' => \$context['_parent'],\n  'index0' => 0,\n  'index'  => 1,\n  'first'  => true,\n);\nif (is_array(\$context['_seq']) || (is_object(\$context['_seq']) && \$context['_seq'] instanceof Countable)) {\n    \$length = count(\$context['_seq']);\n    \$context['loop']['revindex0'] = \$length - 1;\n    \$context['loop']['revindex'] = \$length;\n    \$context['loop']['length'] = \$length;\n    \$context['loop']['last'] = 1 === \$length;\n}\nforeach (\$context['_seq'] as \$context[\"k\"] => \$context[\"v\"]) {\n    echo {$this->getVariableGetter('foo')};\n    ++\$context['loop']['index0'];\n    ++\$context['loop']['index'];\n    \$context['loop']['first'] = false;\n    if (isset(\$context['loop']['length'])) {\n        --\$context['loop']['revindex0'];\n        --\$context['loop']['revindex'];\n        \$context['loop']['last'] = 0 === \$context['loop']['revindex0'];\n    }\n}\n\$_parent = \$context['_parent'];\nunset(\$context['_seq'], \$context['_iterated'], \$context['k'], \$context['v'], \$context['_parent'], \$context['loop']);\n\$context = array_intersect_key(\$context, \$_parent) + \$_parent;"); $spf6dbe1 = new Twig_Node_Expression_AssignName('k', 1); $spf730ed = new Twig_Node_Expression_AssignName('v', 1); $spf6a5d7 = new Twig_Node_Expression_Name('values', 1); $sp8ff448 = new Twig_Node_Expression_Constant(true, 1); $sp1965de = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1); $sp4fa8a7 = null; $spcefb62 = new Twig_Node_For($spf6dbe1, $spf730ed, $spf6a5d7, $sp8ff448, $sp1965de, $sp4fa8a7, 1); $spcefb62->setAttribute('with_loop', true); $sp754928[] = array($spcefb62, "// line 1\n\$context['_parent'] = (array) \$context;\n\$context['_seq'] = twig_ensure_traversable({$this->getVariableGetter('values')});\n\$context['loop'] = array(\n  'parent' => \$context['_parent'],\n  'index0' => 0,\n  'index'  => 1,\n  'first'  => true,\n);\nforeach (\$context['_seq'] as \$context[\"k\"] => \$context[\"v\"]) {\n    if (true) {\n        echo {$this->getVariableGetter('foo')};\n        ++\$context['loop']['index0'];\n        ++\$context['loop']['index'];\n        \$context['loop']['first'] = false;\n    }\n}\n\$_parent = \$context['_parent'];\nunset(\$context['_seq'], \$context['_iterated'], \$context['k'], \$context['v'], \$context['_parent'], \$context['loop']);\n\$context = array_intersect_key(\$context, \$_parent) + \$_parent;"); $spf6dbe1 = new Twig_Node_Expression_AssignName('k', 1); $spf730ed = new Twig_Node_Expression_AssignName('v', 1); $spf6a5d7 = new Twig_Node_Expression_Name('values', 1); $sp8ff448 = null; $sp1965de = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1)), array(), 1); $sp4fa8a7 = new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1); $spcefb62 = new Twig_Node_For($spf6dbe1, $spf730ed, $spf6a5d7, $sp8ff448, $sp1965de, $sp4fa8a7, 1); $spcefb62->setAttribute('with_loop', true); $sp754928[] = array($spcefb62, "// line 1\n\$context['_parent'] = (array) \$context;\n\$context['_seq'] = twig_ensure_traversable({$this->getVariableGetter('values')});\n\$context['_iterated'] = false;\n\$context['loop'] = array(\n  'parent' => \$context['_parent'],\n  'index0' => 0,\n  'index'  => 1,\n  'first'  => true,\n);\nif (is_array(\$context['_seq']) || (is_object(\$context['_seq']) && \$context['_seq'] instanceof Countable)) {\n    \$length = count(\$context['_seq']);\n    \$context['loop']['revindex0'] = \$length - 1;\n    \$context['loop']['revindex'] = \$length;\n    \$context['loop']['length'] = \$length;\n    \$context['loop']['last'] = 1 === \$length;\n}\nforeach (\$context['_seq'] as \$context[\"k\"] => \$context[\"v\"]) {\n    echo {$this->getVariableGetter('foo')};\n    \$context['_iterated'] = true;\n    ++\$context['loop']['index0'];\n    ++\$context['loop']['index'];\n    \$context['loop']['first'] = false;\n    if (isset(\$context['loop']['length'])) {\n        --\$context['loop']['revindex0'];\n        --\$context['loop']['revindex'];\n        \$context['loop']['last'] = 0 === \$context['loop']['revindex0'];\n    }\n}\nif (!\$context['_iterated']) {\n    echo {$this->getVariableGetter('foo')};\n}\n\$_parent = \$context['_parent'];\nunset(\$context['_seq'], \$context['_iterated'], \$context['k'], \$context['v'], \$context['_parent'], \$context['loop']);\n\$context = array_intersect_key(\$context, \$_parent) + \$_parent;"); return $sp754928; } }