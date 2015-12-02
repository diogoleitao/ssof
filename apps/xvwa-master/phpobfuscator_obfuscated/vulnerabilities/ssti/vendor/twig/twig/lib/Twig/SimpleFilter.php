<?php
class Twig_SimpleFilter { protected $name; protected $callable; protected $options; protected $arguments = array(); public function __construct($sp3eec35, $sp9a2590, array $sp44f03d = array()) { $this->name = $sp3eec35; $this->callable = $sp9a2590; $this->options = array_merge(array('needs_environment' => false, 'needs_context' => false, 'is_variadic' => false, 'is_safe' => null, 'is_safe_callback' => null, 'pre_escape' => null, 'preserves_safety' => null, 'node_class' => 'Twig_Node_Expression_Filter'), $sp44f03d); } public function getName() { return $this->name; } public function getCallable() { return $this->callable; } public function getNodeClass() { return $this->options['node_class']; } public function setArguments($spc5cc06) { $this->arguments = $spc5cc06; } public function getArguments() { return $this->arguments; } public function needsEnvironment() { return $this->options['needs_environment']; } public function needsContext() { return $this->options['needs_context']; } public function getSafe(Twig_Node $sp9f1878) { if (null !== $this->options['is_safe']) { return $this->options['is_safe']; } if (null !== $this->options['is_safe_callback']) { return call_user_func($this->options['is_safe_callback'], $sp9f1878); } } public function getPreservesSafety() { return $this->options['preserves_safety']; } public function getPreEscape() { return $this->options['pre_escape']; } public function isVariadic() { return $this->options['is_variadic']; } }