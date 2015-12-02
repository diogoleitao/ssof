<?php
class Twig_Profiler_Node_LeaveProfile extends Twig_Node { public function __construct($sp6bbb60) { parent::__construct(array(), array('var_name' => $sp6bbb60)); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->write('
')->write(sprintf('$%s->leave($%s);

', $this->getAttribute('var_name'), $this->getAttribute('var_name') . '_prof')); } }