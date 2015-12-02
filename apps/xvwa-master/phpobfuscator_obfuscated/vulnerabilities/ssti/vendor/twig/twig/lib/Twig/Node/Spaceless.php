<?php
class Twig_Node_Spaceless extends Twig_Node { public function __construct(Twig_NodeInterface $sp1965de, $sp1f599c, $sp836199 = 'spaceless') { parent::__construct(array('body' => $sp1965de), array(), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write('ob_start();
')->subcompile($this->getNode('body'))->write('echo trim(preg_replace(\'/>\\s+</\', \'><\', ob_get_clean()));
'); } }