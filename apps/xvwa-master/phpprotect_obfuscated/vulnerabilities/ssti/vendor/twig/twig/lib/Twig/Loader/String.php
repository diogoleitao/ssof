<?php




class Twig_Loader_String implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
{
    
    public function getSource($Vkkm4e2vaxrv)
    {
        return $Vkkm4e2vaxrv;
    }

    
    public function exists($Vkkm4e2vaxrv)
    {
        return true;
    }

    
    public function getCacheKey($Vkkm4e2vaxrv)
    {
        return $Vkkm4e2vaxrv;
    }

    
    public function isFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy)
    {
        return true;
    }
}
