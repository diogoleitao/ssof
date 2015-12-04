<?php


class Twig_Extension_Debug extends Twig_Extension
{
    
    public function getFunctions()
    {
        
        $Vdcserfblkrv = extension_loaded('xdebug')
            
            && (false === ini_get('xdebug.overload_var_dump') || ini_get('xdebug.overload_var_dump'))
            
            
            && (false === ini_get('html_errors') || ini_get('html_errors'))
            || 'cli' === php_sapi_name()
        ;

        return array(
            new Twig_SimpleFunction('dump', 'twig_var_dump', array('is_safe' => $Vdcserfblkrv ? array('html') : array(), 'needs_context' => true, 'needs_environment' => true)),
        );
    }

    
    public function getName()
    {
        return 'debug';
    }
}

function twig_var_dump(Twig_Environment $Vx44ywczaw14, $Vhmvn2c55ghv)
{
    if (!$Vx44ywczaw14->isDebug()) {
        return;
    }

    ob_start();

    $Vc2wt4svqann = func_num_args();
    if (2 === $Vc2wt4svqann) {
        $Vbjmvcb1ypn3 = array();
        foreach ($Vhmvn2c55ghv as $Vks5xpccznyi => $V2dijfr3ez0f) {
            if (!$V2dijfr3ez0f instanceof Twig_Template) {
                $Vbjmvcb1ypn3[$Vks5xpccznyi] = $V2dijfr3ez0f;
            }
        }

        var_dump($Vbjmvcb1ypn3);
    } else {
        for ($Vh3cz3bzejsf = 2; $Vh3cz3bzejsf < $Vc2wt4svqann; ++$Vh3cz3bzejsf) {
            var_dump(func_get_arg($Vh3cz3bzejsf));
        }
    }

    return ob_get_clean();
}
