<?php
class Twig_Markup implements Countable { protected $content; protected $charset; public function __construct($spd1867e, $spdc716e) { $this->content = (string) $spd1867e; $this->charset = $spdc716e; } public function __toString() { return $this->content; } public function count() { return function_exists('mb_get_info') ? mb_strlen($this->content, $this->charset) : strlen($this->content); } }