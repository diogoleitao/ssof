<?php




class Twig_FileExtensionEscapingStrategy
{
    
    public static function guess($V2npxty0bmys)
    {
        if (!preg_match('{\.(js|css|txt)(?:\.[^/\\\\]+)?$}', $V2npxty0bmys, $V2pnuu5quolb)) {
            return 'html';
        }

        switch ($V2pnuu5quolb[1]) {
            case 'js':
                return 'js';

            case 'css':
                return 'css';

            case 'txt':
                return false;
        }
    }
}
