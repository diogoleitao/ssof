<?php
class Twig_Node_Expression_ExtensionReference extends Twig_Node_Expression { public function __construct($sp3eec35, $sp1f599c, $sp836199 = null) { parent::__construct(array(), array('name' => $sp3eec35), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->raw(sprintf('$this->env->getExtension(\'%s\')', $this->getAttribute('name'))); } }