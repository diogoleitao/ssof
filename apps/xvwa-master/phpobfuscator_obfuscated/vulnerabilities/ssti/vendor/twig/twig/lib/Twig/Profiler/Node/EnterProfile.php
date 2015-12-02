<?php
class Twig_Profiler_Node_EnterProfile extends Twig_Node { public function __construct($sp7fddff, $sp32ff7e, $sp3eec35, $sp6bbb60) { parent::__construct(array(), array('extension_name' => $sp7fddff, 'name' => $sp3eec35, 'type' => $sp32ff7e, 'var_name' => $sp6bbb60)); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->write(sprintf('$%s = $this->env->getExtension(', $this->getAttribute('var_name')))->repr($this->getAttribute('extension_name'))->raw(');
')->write(sprintf('$%s->enter($%s = new Twig_Profiler_Profile($this->getTemplateName(), ', $this->getAttribute('var_name'), $this->getAttribute('var_name') . '_prof'))->repr($this->getAttribute('type'))->raw(', ')->repr($this->getAttribute('name'))->raw('));

'); } }