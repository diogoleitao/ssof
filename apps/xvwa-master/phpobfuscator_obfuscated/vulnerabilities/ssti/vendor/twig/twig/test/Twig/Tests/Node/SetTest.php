<?php
class Twig_Tests_Node_SetTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp5d289c = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1); $sp14b89a = new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 1)), array(), 1); $spcefb62 = new Twig_Node_Set(false, $sp5d289c, $sp14b89a, 1); $this->assertEquals($sp5d289c, $spcefb62->getNode('names')); $this->assertEquals($sp14b89a, $spcefb62->getNode('values')); $this->assertFalse($spcefb62->getAttribute('capture')); } public function getTests() { $sp754928 = array(); $sp5d289c = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1); $sp14b89a = new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 1)), array(), 1); $spcefb62 = new Twig_Node_Set(false, $sp5d289c, $sp14b89a, 1); $sp754928[] = array($spcefb62, '// line 1
$context["foo"] = "foo";'); $sp5d289c = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1); $sp14b89a = new Twig_Node(array(new Twig_Node_Print(new Twig_Node_Expression_Constant('foo', 1), 1)), array(), 1); $spcefb62 = new Twig_Node_Set(true, $sp5d289c, $sp14b89a, 1); $sp754928[] = array($spcefb62, '// line 1
ob_start();
echo "foo";
$context["foo"] = (\'\' === $tmp = ob_get_clean()) ? \'\' : new Twig_Markup($tmp, $this->env->getCharset());'); $sp5d289c = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1)), array(), 1); $sp14b89a = new Twig_Node_Text('foo', 1); $spcefb62 = new Twig_Node_Set(true, $sp5d289c, $sp14b89a, 1); $sp754928[] = array($spcefb62, '// line 1
$context["foo"] = (\'\' === $tmp = "foo") ? \'\' : new Twig_Markup($tmp, $this->env->getCharset());'); $sp5d289c = new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 1), new Twig_Node_Expression_AssignName('bar', 1)), array(), 1); $sp14b89a = new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 1), new Twig_Node_Expression_Name('bar', 1)), array(), 1); $spcefb62 = new Twig_Node_Set(false, $sp5d289c, $sp14b89a, 1); $sp754928[] = array($spcefb62, "// line 1\nlist(\$context[\"foo\"], \$context[\"bar\"]) = array(\"foo\", {$this->getVariableGetter('bar')});"); return $sp754928; } }