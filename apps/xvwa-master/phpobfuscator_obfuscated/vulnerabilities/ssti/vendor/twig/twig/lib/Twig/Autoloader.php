<?php
class Twig_Autoloader { public static function register($sp8b9581 = false) { if (PHP_VERSION_ID < 50300) { spl_autoload_register(array(__CLASS__, 'autoload')); } else { spl_autoload_register(array(__CLASS__, 'autoload'), true, $sp8b9581); } } public static function autoload($spbd0159) { if (0 !== strpos($spbd0159, 'Twig')) { return; } if (is_file($spc15032 = dirname(__FILE__) . '/../' . str_replace(array('_', ' '), array('/', ''), $spbd0159) . '.php')) { require $spc15032; } } }