<?php
class Twig_Node_Expression_GetAttr extends Twig_Node_Expression { public function __construct(Twig_Node_Expression $spcefb62, Twig_Node_Expression $spd4a003, Twig_Node_Expression $spc5cc06 = null, $sp32ff7e, $sp1f599c) { parent::__construct(array('node' => $spcefb62, 'attribute' => $spd4a003, 'arguments' => $spc5cc06), array('type' => $sp32ff7e, 'is_defined_test' => false, 'ignore_strict_check' => false, 'disable_c_ext' => false), $sp1f599c); } public function compile(Twig_Compiler $spa1c015) { if (function_exists('twig_template_get_attributes') && !$this->getAttribute('disable_c_ext')) { $spa1c015->raw('twig_template_get_attributes($this, '); } else { $spa1c015->raw('$this->getAttribute('); } if ($this->getAttribute('ignore_strict_check')) { $this->getNode('node')->setAttribute('ignore_strict_check', true); } $spa1c015->subcompile($this->getNode('node')); $spa1c015->raw(', ')->subcompile($this->getNode('attribute')); $spf96298 = $this->getAttribute('ignore_strict_check'); $sp6ab34f = $spf96298 || $this->getAttribute('is_defined_test'); $sp0e23a1 = $sp6ab34f || Twig_Template::ANY_CALL !== $this->getAttribute('type'); $sp1dce11 = $sp0e23a1 || null !== $this->getNode('arguments'); if ($sp1dce11) { if (null !== $this->getNode('arguments')) { $spa1c015->raw(', ')->subcompile($this->getNode('arguments')); } else { $spa1c015->raw(', array()'); } } if ($sp0e23a1) { $spa1c015->raw(', ')->repr($this->getAttribute('type')); } if ($sp6ab34f) { $spa1c015->raw(', ')->repr($this->getAttribute('is_defined_test')); } if ($spf96298) { $spa1c015->raw(', ')->repr($this->getAttribute('ignore_strict_check')); } $spa1c015->raw(')'); } }