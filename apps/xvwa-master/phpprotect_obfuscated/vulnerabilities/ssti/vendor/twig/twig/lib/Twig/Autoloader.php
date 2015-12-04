<?php




class Twig_Autoloader
{
    
    public static function register($V0e1kskgdtoc = false)
    {
        if (PHP_VERSION_ID < 50300) {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        } else {
            spl_autoload_register(array(__CLASS__, 'autoload'), true, $V0e1kskgdtoc);
        }
    }

    
    public static function autoload($Vnwpwvxwn3wh)
    {
        if (0 !== strpos($Vnwpwvxwn3wh, 'Twig')) {
            return;
        }

        if (is_file($Vq4aq0rd5eme = dirname(__FILE__).'/../'.str_replace(array('_', "\0"), array('/', ''), $Vnwpwvxwn3wh).'.php')) {
            require $Vq4aq0rd5eme;
        }
    }
}
