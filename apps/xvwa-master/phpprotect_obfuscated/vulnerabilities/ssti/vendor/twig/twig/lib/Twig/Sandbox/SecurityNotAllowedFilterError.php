<?php




class Twig_Sandbox_SecurityNotAllowedFilterError extends Twig_Sandbox_SecurityError
{
    private $Vhnmuhimprsi;

    public function __construct($Vnpz33gb3cxs, $Vx4nrs53t0hg, $Vy5krvyy5dgq = -1, $V2npxty0bmys = null, Exception $Vda0un1ul0vl = null)
    {
        parent::__construct($Vnpz33gb3cxs, $Vy5krvyy5dgq, $V2npxty0bmys, $Vda0un1ul0vl);
        $this->filterName = $Vx4nrs53t0hg;
    }

    public function getFilterName()
    {
        return $this->filterName;
    }
}
