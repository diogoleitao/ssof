<?php
class Twig_Tests_Node_SandboxedPrintTest extends Twig_Test_NodeTestCase { public function testConstructor() { $spcefb62 = new Twig_Node_SandboxedPrint($sp005e3e = new Twig_Node_Expression_Constant('foo', 1), 1); $this->assertEquals($sp005e3e, $spcefb62->getNode('expr')); } public function getTests() { $sp754928 = array(); $sp754928[] = array(new Twig_Node_SandboxedPrint(new Twig_Node_Expression_Constant('foo', 1), 1), '// line 1
echo $this->env->getExtension(\'sandbox\')->ensureToStringAllowed("foo");'); return $sp754928; } }