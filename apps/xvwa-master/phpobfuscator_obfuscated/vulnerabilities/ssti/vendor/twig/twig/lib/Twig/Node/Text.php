<?php
class Twig_Node_Text extends Twig_Node implements Twig_NodeOutputInterface { public function __construct($sp1c9c90, $sp1f599c) { parent::__construct(array(), array('data' => $sp1c9c90), $sp1f599c); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write('echo ')->string($this->getAttribute('data'))->raw(';
'); } }