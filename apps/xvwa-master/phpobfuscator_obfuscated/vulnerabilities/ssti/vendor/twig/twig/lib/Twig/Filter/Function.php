<?php
class Twig_Filter_Function extends Twig_Filter { protected $function; public function __construct($sp9b51b9, array $sp44f03d = array()) { $sp44f03d['callable'] = $sp9b51b9; parent::__construct($sp44f03d); $this->function = $sp9b51b9; } public function compile() { return $this->function; } }