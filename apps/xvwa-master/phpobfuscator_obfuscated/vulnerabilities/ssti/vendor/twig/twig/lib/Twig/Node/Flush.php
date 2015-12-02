<?php
class Twig_Node_Flush extends Twig_Node { public function __construct($sp1f599c, $sp836199) { parent::__construct(array(), array(), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write('flush();
'); } }