<?php
class Twig_Extension_Optimizer extends Twig_Extension { protected $optimizers; public function __construct($sp8ee00a = -1) { $this->optimizers = $sp8ee00a; } public function getNodeVisitors() { return array(new Twig_NodeVisitor_Optimizer($this->optimizers)); } public function getName() { return 'optimizer'; } }