<?php
class Twig_Node_Sandbox extends Twig_Node { public function __construct(Twig_NodeInterface $sp1965de, $sp1f599c, $sp836199 = null) { parent::__construct(array('body' => $sp1965de), array(), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write('$sandbox = $this->env->getExtension(\'sandbox\');
')->write('if (!$alreadySandboxed = $sandbox->isSandboxed()) {
')->indent()->write('$sandbox->enableSandbox();
')->outdent()->write('}
')->subcompile($this->getNode('body'))->write('if (!$alreadySandboxed) {
')->indent()->write('$sandbox->disableSandbox();
')->outdent()->write('}
'); } }