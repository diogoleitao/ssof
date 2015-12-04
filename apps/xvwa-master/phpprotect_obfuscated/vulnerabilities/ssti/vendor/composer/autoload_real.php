<?php



class ComposerAutoloaderInitc4cf692d72af66b561be4abe65a6d0c6
{
    private static $Vpnd0azzvluw;

    public static function loadClassLoader($Vnwpwvxwn3wh)
    {
        if ('Composer\Autoload\ClassLoader' === $Vnwpwvxwn3wh) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$Vpnd0azzvluw) {
            return self::$Vpnd0azzvluw;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc4cf692d72af66b561be4abe65a6d0c6', 'loadClassLoader'), true, true);
        self::$Vpnd0azzvluw = $Vpnd0azzvluw = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInitc4cf692d72af66b561be4abe65a6d0c6', 'loadClassLoader'));

        $V3fcn0ijkhn4 = require __DIR__ . '/autoload_namespaces.php';
        foreach ($V3fcn0ijkhn4 as $Vbfcbzoi2ub2 => $Vtxu0t3moyaa) {
            $Vpnd0azzvluw->set($Vbfcbzoi2ub2, $Vtxu0t3moyaa);
        }

        $V3fcn0ijkhn4 = require __DIR__ . '/autoload_psr4.php';
        foreach ($V3fcn0ijkhn4 as $Vbfcbzoi2ub2 => $Vtxu0t3moyaa) {
            $Vpnd0azzvluw->setPsr4($Vbfcbzoi2ub2, $Vtxu0t3moyaa);
        }

        $Vnwpwvxwn3whMap = require __DIR__ . '/autoload_classmap.php';
        if ($Vnwpwvxwn3whMap) {
            $Vpnd0azzvluw->addClassMap($Vnwpwvxwn3whMap);
        }

        $Vpnd0azzvluw->register(true);

        return $Vpnd0azzvluw;
    }
}

function composerRequirec4cf692d72af66b561be4abe65a6d0c6($Vq4aq0rd5eme)
{
    require $Vq4aq0rd5eme;
}
