<?php
class Twig_Node_Set extends Twig_Node { public function __construct($spb5d187, Twig_NodeInterface $sp5d289c, Twig_NodeInterface $sp14b89a, $sp1f599c, $sp836199 = null) { parent::__construct(array('names' => $sp5d289c, 'values' => $sp14b89a), array('capture' => $spb5d187, 'safe' => false), $sp1f599c, $sp836199); if ($this->getAttribute('capture')) { $this->setAttribute('safe', true); $sp14b89a = $this->getNode('values'); if ($sp14b89a instanceof Twig_Node_Text) { $this->setNode('values', new Twig_Node_Expression_Constant($sp14b89a->getAttribute('data'), $sp14b89a->getLine())); $this->setAttribute('capture', false); } } } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this); if (count($this->getNode('names')) > 1) { $spa1c015->write('list('); foreach ($this->getNode('names') as $spb847db => $spcefb62) { if ($spb847db) { $spa1c015->raw(', '); } $spa1c015->subcompile($spcefb62); } $spa1c015->raw(')'); } else { if ($this->getAttribute('capture')) { $spa1c015->write('ob_start();
')->subcompile($this->getNode('values')); } $spa1c015->subcompile($this->getNode('names'), false); if ($this->getAttribute('capture')) { $spa1c015->raw(' = (\'\' === $tmp = ob_get_clean()) ? \'\' : new Twig_Markup($tmp, $this->env->getCharset())'); } } if (!$this->getAttribute('capture')) { $spa1c015->raw(' = '); if (count($this->getNode('names')) > 1) { $spa1c015->write('array('); foreach ($this->getNode('values') as $spb847db => $spbb4d96) { if ($spb847db) { $spa1c015->raw(', '); } $spa1c015->subcompile($spbb4d96); } $spa1c015->raw(')'); } else { if ($this->getAttribute('safe')) { $spa1c015->raw('(\'\' === $tmp = ')->subcompile($this->getNode('values'))->raw(') ? \'\' : new Twig_Markup($tmp, $this->env->getCharset())'); } else { $spa1c015->subcompile($this->getNode('values')); } } } $spa1c015->raw(';
'); } }