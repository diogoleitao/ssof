<?php
abstract class Twig_Node_Expression_Unary extends Twig_Node_Expression { public function __construct(Twig_NodeInterface $spcefb62, $sp1f599c) { parent::__construct(array('node' => $spcefb62), array(), $sp1f599c); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->raw(' '); $this->operator($spa1c015); $spa1c015->subcompile($this->getNode('node')); } public abstract function operator(Twig_Compiler $spa1c015); }