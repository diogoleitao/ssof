<?php
class Twig_Node_Expression_Binary_FloorDiv extends Twig_Node_Expression_Binary { public function compile(Twig_Compiler $spa1c015) { $spa1c015->raw('intval(floor('); parent::compile($spa1c015); $spa1c015->raw('))'); } public function operator(Twig_Compiler $spa1c015) { return $spa1c015->raw('/'); } }