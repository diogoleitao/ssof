<?php




class Twig_Loader_Chain implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
{
    private $Vwkp0kfk5ca3 = array();
    protected $Viegdnbfgjts = array();

    
    public function __construct(array $Viegdnbfgjts = array())
    {
        foreach ($Viegdnbfgjts as $Vpnd0azzvluw) {
            $this->addLoader($Vpnd0azzvluw);
        }
    }

    
    public function addLoader(Twig_LoaderInterface $Vpnd0azzvluw)
    {
        $this->loaders[] = $Vpnd0azzvluw;
        $this->hasSourceCache = array();
    }

    
    public function getSource($Vkkm4e2vaxrv)
    {
        $Vj5sbmxlydpq = array();
        foreach ($this->loaders as $Vpnd0azzvluw) {
            if ($Vpnd0azzvluw instanceof Twig_ExistsLoaderInterface && !$Vpnd0azzvluw->exists($Vkkm4e2vaxrv)) {
                continue;
            }

            try {
                return $Vpnd0azzvluw->getSource($Vkkm4e2vaxrv);
            } catch (Twig_Error_Loader $Vawjopoun3xn) {
                $Vj5sbmxlydpq[] = $Vawjopoun3xn->getMessage();
            }
        }

        throw new Twig_Error_Loader(sprintf('Template "%s" is not defined (%s).', $Vkkm4e2vaxrv, implode(', ', $Vj5sbmxlydpq)));
    }

    
    public function exists($Vkkm4e2vaxrv)
    {
        $Vkkm4e2vaxrv = (string) $Vkkm4e2vaxrv;

        if (isset($this->hasSourceCache[$Vkkm4e2vaxrv])) {
            return $this->hasSourceCache[$Vkkm4e2vaxrv];
        }

        foreach ($this->loaders as $Vpnd0azzvluw) {
            if ($Vpnd0azzvluw instanceof Twig_ExistsLoaderInterface) {
                if ($Vpnd0azzvluw->exists($Vkkm4e2vaxrv)) {
                    return $this->hasSourceCache[$Vkkm4e2vaxrv] = true;
                }

                continue;
            }

            try {
                $Vpnd0azzvluw->getSource($Vkkm4e2vaxrv);

                return $this->hasSourceCache[$Vkkm4e2vaxrv] = true;
            } catch (Twig_Error_Loader $Vawjopoun3xn) {
            }
        }

        return $this->hasSourceCache[$Vkkm4e2vaxrv] = false;
    }

    
    public function getCacheKey($Vkkm4e2vaxrv)
    {
        $Vj5sbmxlydpq = array();
        foreach ($this->loaders as $Vpnd0azzvluw) {
            if ($Vpnd0azzvluw instanceof Twig_ExistsLoaderInterface && !$Vpnd0azzvluw->exists($Vkkm4e2vaxrv)) {
                continue;
            }

            try {
                return $Vpnd0azzvluw->getCacheKey($Vkkm4e2vaxrv);
            } catch (Twig_Error_Loader $Vawjopoun3xn) {
                $Vj5sbmxlydpq[] = get_class($Vpnd0azzvluw).': '.$Vawjopoun3xn->getMessage();
            }
        }

        throw new Twig_Error_Loader(sprintf('Template "%s" is not defined (%s).', $Vkkm4e2vaxrv, implode(' ', $Vj5sbmxlydpq)));
    }

    
    public function isFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy)
    {
        $Vj5sbmxlydpq = array();
        foreach ($this->loaders as $Vpnd0azzvluw) {
            if ($Vpnd0azzvluw instanceof Twig_ExistsLoaderInterface && !$Vpnd0azzvluw->exists($Vkkm4e2vaxrv)) {
                continue;
            }

            try {
                return $Vpnd0azzvluw->isFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy);
            } catch (Twig_Error_Loader $Vawjopoun3xn) {
                $Vj5sbmxlydpq[] = get_class($Vpnd0azzvluw).': '.$Vawjopoun3xn->getMessage();
            }
        }

        throw new Twig_Error_Loader(sprintf('Template "%s" is not defined (%s).', $Vkkm4e2vaxrv, implode(' ', $Vj5sbmxlydpq)));
    }
}
