<?php
class Twig_Node_Expression_Binary_In extends Twig_Node_Expression_Binary { public function compile(Twig_Compiler $spa1c015) { $spa1c015->raw('twig_in_filter(')->subcompile($this->getNode('left'))->raw(', ')->subcompile($this->getNode('right'))->raw(')'); } public function operator(Twig_Compiler $spa1c015) { return $spa1c015->raw('in'); } }