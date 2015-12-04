<?php


class Twig_Extension_StringLoader extends Twig_Extension
{
    
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('template_from_string', 'twig_template_from_string', array('needs_environment' => true)),
        );
    }

    
    public function getName()
    {
        return 'string_loader';
    }
}


function twig_template_from_string(Twig_Environment $Vx44ywczaw14, $V4lif0h4bhru)
{
    return $Vx44ywczaw14->createTemplate($V4lif0h4bhru);
}
