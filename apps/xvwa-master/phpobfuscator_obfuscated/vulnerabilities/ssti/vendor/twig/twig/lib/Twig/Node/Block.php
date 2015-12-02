<?php
class Twig_Node_Block extends Twig_Node { public function __construct($sp3eec35, Twig_NodeInterface $sp1965de, $sp1f599c, $sp836199 = null) { parent::__construct(array('body' => $sp1965de), array('name' => $sp3eec35), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write(sprintf('public function block_%s($context, array $blocks = array())
', $this->getAttribute('name')), '{
')->indent(); $spa1c015->subcompile($this->getNode('body'))->outdent()->write('}

'); } }