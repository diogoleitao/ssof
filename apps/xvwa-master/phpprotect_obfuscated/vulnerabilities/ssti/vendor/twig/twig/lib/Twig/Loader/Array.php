<?php




class Twig_Loader_Array implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
{
    protected $Vc0vo4f1f0kv = array();

    
    public function __construct(array $Vc0vo4f1f0kv)
    {
        $this->templates = $Vc0vo4f1f0kv;
    }

    
    public function setTemplate($Vkkm4e2vaxrv, $V4lif0h4bhru)
    {
        $this->templates[(string) $Vkkm4e2vaxrv] = $V4lif0h4bhru;
    }

    
    public function getSource($Vkkm4e2vaxrv)
    {
        $Vkkm4e2vaxrv = (string) $Vkkm4e2vaxrv;
        if (!isset($this->templates[$Vkkm4e2vaxrv])) {
            throw new Twig_Error_Loader(sprintf('Template "%s" is not defined.', $Vkkm4e2vaxrv));
        }

        return $this->templates[$Vkkm4e2vaxrv];
    }

    
    public function exists($Vkkm4e2vaxrv)
    {
        return isset($this->templates[(string) $Vkkm4e2vaxrv]);
    }

    
    public function getCacheKey($Vkkm4e2vaxrv)
    {
        $Vkkm4e2vaxrv = (string) $Vkkm4e2vaxrv;
        if (!isset($this->templates[$Vkkm4e2vaxrv])) {
            throw new Twig_Error_Loader(sprintf('Template "%s" is not defined.', $Vkkm4e2vaxrv));
        }

        return $this->templates[$Vkkm4e2vaxrv];
    }

    
    public function isFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy)
    {
        $Vkkm4e2vaxrv = (string) $Vkkm4e2vaxrv;
        if (!isset($this->templates[$Vkkm4e2vaxrv])) {
            throw new Twig_Error_Loader(sprintf('Template "%s" is not defined.', $Vkkm4e2vaxrv));
        }

        return true;
    }
}
