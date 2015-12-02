<?php
class Twig_Node_Do extends Twig_Node { public function __construct(Twig_Node_Expression $sp005e3e, $sp1f599c, $sp836199 = null) { parent::__construct(array('expr' => $sp005e3e), array(), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write('')->subcompile($this->getNode('expr'))->raw(';
'); } }