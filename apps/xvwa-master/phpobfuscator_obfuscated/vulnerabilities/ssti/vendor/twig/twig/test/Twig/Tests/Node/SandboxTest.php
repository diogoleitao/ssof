<?php
class Twig_Tests_Node_SandboxTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp1965de = new Twig_Node_Text('foo', 1); $spcefb62 = new Twig_Node_Sandbox($sp1965de, 1); $this->assertEquals($sp1965de, $spcefb62->getNode('body')); } public function getTests() { $sp754928 = array(); $sp1965de = new Twig_Node_Text('foo', 1); $spcefb62 = new Twig_Node_Sandbox($sp1965de, 1); $sp754928[] = array($spcefb62, '// line 1
$sandbox = $this->env->getExtension(\'sandbox\');
if (!$alreadySandboxed = $sandbox->isSandboxed()) {
    $sandbox->enableSandbox();
}
echo "foo";
if (!$alreadySandboxed) {
    $sandbox->disableSandbox();
}'); return $sp754928; } }