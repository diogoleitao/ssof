<?php
class Twig_Node_Expression_Test extends Twig_Node_Expression_Call { public function __construct(Twig_NodeInterface $spcefb62, $sp3eec35, Twig_NodeInterface $spc5cc06 = null, $sp1f599c) { parent::__construct(array('node' => $spcefb62, 'arguments' => $spc5cc06), array('name' => $sp3eec35), $sp1f599c); } public function compile(Twig_Compiler $spa1c015) { $sp3eec35 = $this->getAttribute('name'); $sp26d1b4 = $spa1c015->getEnvironment()->getTest($sp3eec35); $this->setAttribute('name', $sp3eec35); $this->setAttribute('type', 'test'); $this->setAttribute('thing', $sp26d1b4); if ($sp26d1b4 instanceof Twig_TestCallableInterface || $sp26d1b4 instanceof Twig_SimpleTest) { $this->setAttribute('callable', $sp26d1b4->getCallable()); } if ($sp26d1b4 instanceof Twig_SimpleTest) { $this->setAttribute('is_variadic', $sp26d1b4->isVariadic()); } $this->compileCallable($spa1c015); } }