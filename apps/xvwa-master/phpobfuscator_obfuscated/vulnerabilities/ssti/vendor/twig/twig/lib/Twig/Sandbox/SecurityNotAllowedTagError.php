<?php
class Twig_Sandbox_SecurityNotAllowedTagError extends Twig_Sandbox_SecurityError { private $tagName; public function __construct($sp9f2d02, $sp940100, $sp1f599c = -1, $sp79b407 = null, Exception $sp02a259 = null) { parent::__construct($sp9f2d02, $sp1f599c, $sp79b407, $sp02a259); $this->tagName = $sp940100; } public function getTagName() { return $this->tagName; } }