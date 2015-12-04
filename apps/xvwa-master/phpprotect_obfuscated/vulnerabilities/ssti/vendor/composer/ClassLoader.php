<?php



namespace Composer\Autoload;


class ClassLoader
{
    
    private $Vqntayjtv00y = array();
    private $Vp1qvk3k50qc = array();
    private $V04hh3wa1mcc = array();

    
    private $V5tkpzqz2vdg = array();
    private $Vb1fcbvrnypn = array();

    private $Vgpop0swlhft = false;
    private $Vx4pym13khin = array();

    private $Vx4pym13khinAuthoritative = false;

    public function getPrefixes()
    {
        if (!empty($this->prefixesPsr0)) {
            return call_user_func_array('array_merge', $this->prefixesPsr0);
        }

        return array();
    }

    public function getPrefixesPsr4()
    {
        return $this->prefixDirsPsr4;
    }

    public function getFallbackDirs()
    {
        return $this->fallbackDirsPsr0;
    }

    public function getFallbackDirsPsr4()
    {
        return $this->fallbackDirsPsr4;
    }

    public function getClassMap()
    {
        return $this->classMap;
    }

    
    public function addClassMap(array $Vx4pym13khin)
    {
        if ($this->classMap) {
            $this->classMap = array_merge($this->classMap, $Vx4pym13khin);
        } else {
            $this->classMap = $Vx4pym13khin;
        }
    }

    
    public function add($V3w1lkk3bwtz, $Vtu5xx5bwusw, $V0e1kskgdtoc = false)
    {
        if (!$V3w1lkk3bwtz) {
            if ($V0e1kskgdtoc) {
                $this->fallbackDirsPsr0 = array_merge(
                    (array) $Vtu5xx5bwusw,
                    $this->fallbackDirsPsr0
                );
            } else {
                $this->fallbackDirsPsr0 = array_merge(
                    $this->fallbackDirsPsr0,
                    (array) $Vtu5xx5bwusw
                );
            }

            return;
        }

        $Vspubgfk23ku = $V3w1lkk3bwtz[0];
        if (!isset($this->prefixesPsr0[$Vspubgfk23ku][$V3w1lkk3bwtz])) {
            $this->prefixesPsr0[$Vspubgfk23ku][$V3w1lkk3bwtz] = (array) $Vtu5xx5bwusw;

            return;
        }
        if ($V0e1kskgdtoc) {
            $this->prefixesPsr0[$Vspubgfk23ku][$V3w1lkk3bwtz] = array_merge(
                (array) $Vtu5xx5bwusw,
                $this->prefixesPsr0[$Vspubgfk23ku][$V3w1lkk3bwtz]
            );
        } else {
            $this->prefixesPsr0[$Vspubgfk23ku][$V3w1lkk3bwtz] = array_merge(
                $this->prefixesPsr0[$Vspubgfk23ku][$V3w1lkk3bwtz],
                (array) $Vtu5xx5bwusw
            );
        }
    }

    
    public function addPsr4($V3w1lkk3bwtz, $Vtu5xx5bwusw, $V0e1kskgdtoc = false)
    {
        if (!$V3w1lkk3bwtz) {
            
            if ($V0e1kskgdtoc) {
                $this->fallbackDirsPsr4 = array_merge(
                    (array) $Vtu5xx5bwusw,
                    $this->fallbackDirsPsr4
                );
            } else {
                $this->fallbackDirsPsr4 = array_merge(
                    $this->fallbackDirsPsr4,
                    (array) $Vtu5xx5bwusw
                );
            }
        } elseif (!isset($this->prefixDirsPsr4[$V3w1lkk3bwtz])) {
            
            $Vac2bf3qhtlh = strlen($V3w1lkk3bwtz);
            if ('\\' !== $V3w1lkk3bwtz[$Vac2bf3qhtlh - 1]) {
                throw new \InvalidArgumentException("A non-empty PSR-4 prefix must end with a namespace separator.");
            }
            $this->prefixLengthsPsr4[$V3w1lkk3bwtz[0]][$V3w1lkk3bwtz] = $Vac2bf3qhtlh;
            $this->prefixDirsPsr4[$V3w1lkk3bwtz] = (array) $Vtu5xx5bwusw;
        } elseif ($V0e1kskgdtoc) {
            
            $this->prefixDirsPsr4[$V3w1lkk3bwtz] = array_merge(
                (array) $Vtu5xx5bwusw,
                $this->prefixDirsPsr4[$V3w1lkk3bwtz]
            );
        } else {
            
            $this->prefixDirsPsr4[$V3w1lkk3bwtz] = array_merge(
                $this->prefixDirsPsr4[$V3w1lkk3bwtz],
                (array) $Vtu5xx5bwusw
            );
        }
    }

    
    public function set($V3w1lkk3bwtz, $Vtu5xx5bwusw)
    {
        if (!$V3w1lkk3bwtz) {
            $this->fallbackDirsPsr0 = (array) $Vtu5xx5bwusw;
        } else {
            $this->prefixesPsr0[$V3w1lkk3bwtz[0]][$V3w1lkk3bwtz] = (array) $Vtu5xx5bwusw;
        }
    }

    
    public function setPsr4($V3w1lkk3bwtz, $Vtu5xx5bwusw)
    {
        if (!$V3w1lkk3bwtz) {
            $this->fallbackDirsPsr4 = (array) $Vtu5xx5bwusw;
        } else {
            $Vac2bf3qhtlh = strlen($V3w1lkk3bwtz);
            if ('\\' !== $V3w1lkk3bwtz[$Vac2bf3qhtlh - 1]) {
                throw new \InvalidArgumentException("A non-empty PSR-4 prefix must end with a namespace separator.");
            }
            $this->prefixLengthsPsr4[$V3w1lkk3bwtz[0]][$V3w1lkk3bwtz] = $Vac2bf3qhtlh;
            $this->prefixDirsPsr4[$V3w1lkk3bwtz] = (array) $Vtu5xx5bwusw;
        }
    }

    
    public function setUseIncludePath($Vgpop0swlhft)
    {
        $this->useIncludePath = $Vgpop0swlhft;
    }

    
    public function getUseIncludePath()
    {
        return $this->useIncludePath;
    }

    
    public function setClassMapAuthoritative($Vx4pym13khinAuthoritative)
    {
        $this->classMapAuthoritative = $Vx4pym13khinAuthoritative;
    }

    
    public function isClassMapAuthoritative()
    {
        return $this->classMapAuthoritative;
    }

    
    public function register($V0e1kskgdtoc = false)
    {
        spl_autoload_register(array($this, 'loadClass'), true, $V0e1kskgdtoc);
    }

    
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    
    public function loadClass($Vnwpwvxwn3wh)
    {
        if ($Vq4aq0rd5eme = $this->findFile($Vnwpwvxwn3wh)) {
            includeFile($Vq4aq0rd5eme);

            return true;
        }
    }

    
    public function findFile($Vnwpwvxwn3wh)
    {
        
        if ('\\' == $Vnwpwvxwn3wh[0]) {
            $Vnwpwvxwn3wh = substr($Vnwpwvxwn3wh, 1);
        }

        
        if (isset($this->classMap[$Vnwpwvxwn3wh])) {
            return $this->classMap[$Vnwpwvxwn3wh];
        }
        if ($this->classMapAuthoritative) {
            return false;
        }

        $Vq4aq0rd5eme = $this->findFileWithExtension($Vnwpwvxwn3wh, '.php');

        
        if ($Vq4aq0rd5eme === null && defined('HHVM_VERSION')) {
            $Vq4aq0rd5eme = $this->findFileWithExtension($Vnwpwvxwn3wh, '.hh');
        }

        if ($Vq4aq0rd5eme === null) {
            
            return $this->classMap[$Vnwpwvxwn3wh] = false;
        }

        return $Vq4aq0rd5eme;
    }

    private function findFileWithExtension($Vnwpwvxwn3wh, $Vyhuesrgwgy4)
    {
        
        $V0rdq2ut2dip = strtr($Vnwpwvxwn3wh, '\\', DIRECTORY_SEPARATOR) . $Vyhuesrgwgy4;

        $Vspubgfk23ku = $Vnwpwvxwn3wh[0];
        if (isset($this->prefixLengthsPsr4[$Vspubgfk23ku])) {
            foreach ($this->prefixLengthsPsr4[$Vspubgfk23ku] as $V3w1lkk3bwtz => $Vac2bf3qhtlh) {
                if (0 === strpos($Vnwpwvxwn3wh, $V3w1lkk3bwtz)) {
                    foreach ($this->prefixDirsPsr4[$V3w1lkk3bwtz] as $Vsadndaabphy) {
                        if (file_exists($Vq4aq0rd5eme = $Vsadndaabphy . DIRECTORY_SEPARATOR . substr($V0rdq2ut2dip, $Vac2bf3qhtlh))) {
                            return $Vq4aq0rd5eme;
                        }
                    }
                }
            }
        }

        
        foreach ($this->fallbackDirsPsr4 as $Vsadndaabphy) {
            if (file_exists($Vq4aq0rd5eme = $Vsadndaabphy . DIRECTORY_SEPARATOR . $V0rdq2ut2dip)) {
                return $Vq4aq0rd5eme;
            }
        }

        
        if (false !== $Vbjmk1rrxfqv = strrpos($Vnwpwvxwn3wh, '\\')) {
            
            $V5pfuqmx55wu = substr($V0rdq2ut2dip, 0, $Vbjmk1rrxfqv + 1)
                . strtr(substr($V0rdq2ut2dip, $Vbjmk1rrxfqv + 1), '_', DIRECTORY_SEPARATOR);
        } else {
            
            $V5pfuqmx55wu = strtr($Vnwpwvxwn3wh, '_', DIRECTORY_SEPARATOR) . $Vyhuesrgwgy4;
        }

        if (isset($this->prefixesPsr0[$Vspubgfk23ku])) {
            foreach ($this->prefixesPsr0[$Vspubgfk23ku] as $V3w1lkk3bwtz => $Vsadndaabphys) {
                if (0 === strpos($Vnwpwvxwn3wh, $V3w1lkk3bwtz)) {
                    foreach ($Vsadndaabphys as $Vsadndaabphy) {
                        if (file_exists($Vq4aq0rd5eme = $Vsadndaabphy . DIRECTORY_SEPARATOR . $V5pfuqmx55wu)) {
                            return $Vq4aq0rd5eme;
                        }
                    }
                }
            }
        }

        
        foreach ($this->fallbackDirsPsr0 as $Vsadndaabphy) {
            if (file_exists($Vq4aq0rd5eme = $Vsadndaabphy . DIRECTORY_SEPARATOR . $V5pfuqmx55wu)) {
                return $Vq4aq0rd5eme;
            }
        }

        
        if ($this->useIncludePath && $Vq4aq0rd5eme = stream_resolve_include_path($V5pfuqmx55wu)) {
            return $Vq4aq0rd5eme;
        }
    }
}


function includeFile($Vq4aq0rd5eme)
{
    include $Vq4aq0rd5eme;
}
