<?php
class Twig_Node_Expression_Test_Divisibleby extends Twig_Node_Expression_Test { public function compile(Twig_Compiler $spa1c015) { $spa1c015->raw('(0 == ')->subcompile($this->getNode('node'))->raw(' % ')->subcompile($this->getNode('arguments')->getNode(0))->raw(')'); } }