<?php
class Twig_Node_Expression_Binary_Range extends Twig_Node_Expression_Binary { public function compile(Twig_Compiler $spa1c015) { $spa1c015->raw('range(')->subcompile($this->getNode('left'))->raw(', ')->subcompile($this->getNode('right'))->raw(')'); } public function operator(Twig_Compiler $spa1c015) { return $spa1c015->raw('..'); } }