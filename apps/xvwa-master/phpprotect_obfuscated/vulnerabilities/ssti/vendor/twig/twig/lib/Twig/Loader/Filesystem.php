<?php




class Twig_Loader_Filesystem implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
{
    
    const MAIN_NAMESPACE = '__main__';

    protected $Vtu5xx5bwusw = array();
    protected $Vcxwghl1fqnk = array();

    
    public function __construct($Vtu5xx5bwusw = array())
    {
        if ($Vtu5xx5bwusw) {
            $this->setPaths($Vtu5xx5bwusw);
        }
    }

    
    public function getPaths($Vbfcbzoi2ub2 = self::MAIN_NAMESPACE)
    {
        return isset($this->paths[$Vbfcbzoi2ub2]) ? $this->paths[$Vbfcbzoi2ub2] : array();
    }

    
    public function getNamespaces()
    {
        return array_keys($this->paths);
    }

    
    public function setPaths($Vtu5xx5bwusw, $Vbfcbzoi2ub2 = self::MAIN_NAMESPACE)
    {
        if (!is_array($Vtu5xx5bwusw)) {
            $Vtu5xx5bwusw = array($Vtu5xx5bwusw);
        }

        $this->paths[$Vbfcbzoi2ub2] = array();
        foreach ($Vtu5xx5bwusw as $Vtxu0t3moyaa) {
            $this->addPath($Vtxu0t3moyaa, $Vbfcbzoi2ub2);
        }
    }

    
    public function addPath($Vtxu0t3moyaa, $Vbfcbzoi2ub2 = self::MAIN_NAMESPACE)
    {
        
        $this->cache = array();

        if (!is_dir($Vtxu0t3moyaa)) {
            throw new Twig_Error_Loader(sprintf('The "%s" directory does not exist.', $Vtxu0t3moyaa));
        }

        $this->paths[$Vbfcbzoi2ub2][] = rtrim($Vtxu0t3moyaa, '/\\');
    }

    
    public function prependPath($Vtxu0t3moyaa, $Vbfcbzoi2ub2 = self::MAIN_NAMESPACE)
    {
        
        $this->cache = array();

        if (!is_dir($Vtxu0t3moyaa)) {
            throw new Twig_Error_Loader(sprintf('The "%s" directory does not exist.', $Vtxu0t3moyaa));
        }

        $Vtxu0t3moyaa = rtrim($Vtxu0t3moyaa, '/\\');

        if (!isset($this->paths[$Vbfcbzoi2ub2])) {
            $this->paths[$Vbfcbzoi2ub2][] = $Vtxu0t3moyaa;
        } else {
            array_unshift($this->paths[$Vbfcbzoi2ub2], $Vtxu0t3moyaa);
        }
    }

    
    public function getSource($Vkkm4e2vaxrv)
    {
        return file_get_contents($this->findTemplate($Vkkm4e2vaxrv));
    }

    
    public function getCacheKey($Vkkm4e2vaxrv)
    {
        return $this->findTemplate($Vkkm4e2vaxrv);
    }

    
    public function exists($Vkkm4e2vaxrv)
    {
        $Vkkm4e2vaxrv = $this->normalizeName($Vkkm4e2vaxrv);

        if (isset($this->cache[$Vkkm4e2vaxrv])) {
            return true;
        }

        try {
            $this->findTemplate($Vkkm4e2vaxrv);

            return true;
        } catch (Twig_Error_Loader $Vvpibbwbvf5d) {
            return false;
        }
    }

    
    public function isFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy)
    {
        return filemtime($this->findTemplate($Vkkm4e2vaxrv)) <= $Vxb1yyvkglmy;
    }

    protected function findTemplate($Vkkm4e2vaxrv)
    {
        $Vkkm4e2vaxrv = $this->normalizeName($Vkkm4e2vaxrv);

        if (isset($this->cache[$Vkkm4e2vaxrv])) {
            return $this->cache[$Vkkm4e2vaxrv];
        }

        $this->validateName($Vkkm4e2vaxrv);

        list($Vbfcbzoi2ub2, $Vtpt4cnfumni) = $this->parseName($Vkkm4e2vaxrv);

        if (!isset($this->paths[$Vbfcbzoi2ub2])) {
            throw new Twig_Error_Loader(sprintf('There are no registered paths for namespace "%s".', $Vbfcbzoi2ub2));
        }

        foreach ($this->paths[$Vbfcbzoi2ub2] as $Vtxu0t3moyaa) {
            if (is_file($Vtxu0t3moyaa.'/'.$Vtpt4cnfumni)) {
                if (false !== $Vaxtazkxkzgo = realpath($Vtxu0t3moyaa.'/'.$Vtpt4cnfumni)) {
                    return $this->cache[$Vkkm4e2vaxrv] = $Vaxtazkxkzgo;
                }

                return $this->cache[$Vkkm4e2vaxrv] = $Vtxu0t3moyaa.'/'.$Vtpt4cnfumni;
            }
        }

        throw new Twig_Error_Loader(sprintf('Unable to find template "%s" (looked into: %s).', $Vkkm4e2vaxrv, implode(', ', $this->paths[$Vbfcbzoi2ub2])));
    }

    protected function parseName($Vkkm4e2vaxrv, $V0x2y4bdxg4l = self::MAIN_NAMESPACE)
    {
        if (isset($Vkkm4e2vaxrv[0]) && '@' == $Vkkm4e2vaxrv[0]) {
            if (false === $Vbjmk1rrxfqv = strpos($Vkkm4e2vaxrv, '/')) {
                throw new Twig_Error_Loader(sprintf('Malformed namespaced template name "%s" (expecting "@namespace/template_name").', $Vkkm4e2vaxrv));
            }

            $Vbfcbzoi2ub2 = substr($Vkkm4e2vaxrv, 1, $Vbjmk1rrxfqv - 1);
            $Vtpt4cnfumni = substr($Vkkm4e2vaxrv, $Vbjmk1rrxfqv + 1);

            return array($Vbfcbzoi2ub2, $Vtpt4cnfumni);
        }

        return array($V0x2y4bdxg4l, $Vkkm4e2vaxrv);
    }

    protected function normalizeName($Vkkm4e2vaxrv)
    {
        return preg_replace('#/{2,}#', '/', strtr((string) $Vkkm4e2vaxrv, '\\', '/'));
    }

    protected function validateName($Vkkm4e2vaxrv)
    {
        if (false !== strpos($Vkkm4e2vaxrv, "\0")) {
            throw new Twig_Error_Loader('A template name cannot contain NUL bytes.');
        }

        $Vkkm4e2vaxrv = ltrim($Vkkm4e2vaxrv, '/');
        $Vom1f4hwxsut = explode('/', $Vkkm4e2vaxrv);
        $Vnavz4mpyufb = 0;
        foreach ($Vom1f4hwxsut as $Vrflcxjjviu3) {
            if ('..' === $Vrflcxjjviu3) {
                --$Vnavz4mpyufb;
            } elseif ('.' !== $Vrflcxjjviu3) {
                ++$Vnavz4mpyufb;
            }

            if ($Vnavz4mpyufb < 0) {
                throw new Twig_Error_Loader(sprintf('Looks like you try to load a template outside configured directories (%s).', $Vkkm4e2vaxrv));
            }
        }
    }
}
