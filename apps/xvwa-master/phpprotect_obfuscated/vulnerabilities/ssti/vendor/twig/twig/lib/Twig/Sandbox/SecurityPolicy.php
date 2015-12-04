<?php




class Twig_Sandbox_SecurityPolicy implements Twig_Sandbox_SecurityPolicyInterface
{
    protected $V2xanyhipc3f;
    protected $Vilfdz3pu5tl;
    protected $Vbinpyljzxft;
    protected $Vnmj3ax4y0rs;
    protected $V21hpo0by1x0;

    public function __construct(array $V2xanyhipc3f = array(), array $Vilfdz3pu5tl = array(), array $Vbinpyljzxft = array(), array $Vnmj3ax4y0rs = array(), array $V21hpo0by1x0 = array())
    {
        $this->allowedTags = $V2xanyhipc3f;
        $this->allowedFilters = $Vilfdz3pu5tl;
        $this->setAllowedMethods($Vbinpyljzxft);
        $this->allowedProperties = $Vnmj3ax4y0rs;
        $this->allowedFunctions = $V21hpo0by1x0;
    }

    public function setAllowedTags(array $V5hu3rl2wtua)
    {
        $this->allowedTags = $V5hu3rl2wtua;
    }

    public function setAllowedFilters(array $Vh4matx43sow)
    {
        $this->allowedFilters = $Vh4matx43sow;
    }

    public function setAllowedMethods(array $Vyyyytst25qz)
    {
        $this->allowedMethods = array();
        foreach ($Vyyyytst25qz as $Vnwpwvxwn3wh => $Vzmyizpribkc) {
            $this->allowedMethods[$Vnwpwvxwn3wh] = array_map('strtolower', is_array($Vzmyizpribkc) ? $Vzmyizpribkc : array($Vzmyizpribkc));
        }
    }

    public function setAllowedProperties(array $Vqmd5qvqgvzi)
    {
        $this->allowedProperties = $Vqmd5qvqgvzi;
    }

    public function setAllowedFunctions(array $Vakwpkr2roqa)
    {
        $this->allowedFunctions = $Vakwpkr2roqa;
    }

    public function checkSecurity($V5hu3rl2wtua, $Vh4matx43sow, $Vakwpkr2roqa)
    {
        foreach ($V5hu3rl2wtua as $Vyzs3kd551qh) {
            if (!in_array($Vyzs3kd551qh, $this->allowedTags)) {
                throw new Twig_Sandbox_SecurityNotAllowedTagError(sprintf('Tag "%s" is not allowed.', $Vyzs3kd551qh), $Vyzs3kd551qh);
            }
        }

        foreach ($Vh4matx43sow as $Vntaxllqc33j) {
            if (!in_array($Vntaxllqc33j, $this->allowedFilters)) {
                throw new Twig_Sandbox_SecurityNotAllowedFilterError(sprintf('Filter "%s" is not allowed.', $Vntaxllqc33j), $Vntaxllqc33j);
            }
        }

        foreach ($Vakwpkr2roqa as $Vpdqyyybdwv1) {
            if (!in_array($Vpdqyyybdwv1, $this->allowedFunctions)) {
                throw new Twig_Sandbox_SecurityNotAllowedFunctionError(sprintf('Function "%s" is not allowed.', $Vpdqyyybdwv1), $Vpdqyyybdwv1);
            }
        }
    }

    public function checkMethodAllowed($Vb03gyaku5il, $Vzmyizpribkcethod)
    {
        if ($Vb03gyaku5il instanceof Twig_TemplateInterface || $Vb03gyaku5il instanceof Twig_Markup) {
            return true;
        }

        $Vp1qvwk2ghzx = false;
        $Vzmyizpribkcethod = strtolower($Vzmyizpribkcethod);
        foreach ($this->allowedMethods as $Vnwpwvxwn3wh => $Vyyyytst25qz) {
            if ($Vb03gyaku5il instanceof $Vnwpwvxwn3wh) {
                $Vp1qvwk2ghzx = in_array($Vzmyizpribkcethod, $Vyyyytst25qz);

                break;
            }
        }

        if (!$Vp1qvwk2ghzx) {
            throw new Twig_Sandbox_SecurityError(sprintf('Calling "%s" method on a "%s" object is not allowed.', $Vzmyizpribkcethod, get_class($Vb03gyaku5il)));
        }
    }

    public function checkPropertyAllowed($Vb03gyaku5il, $Vhhs1tleulju)
    {
        $Vp1qvwk2ghzx = false;
        foreach ($this->allowedProperties as $Vnwpwvxwn3wh => $Vqmd5qvqgvzi) {
            if ($Vb03gyaku5il instanceof $Vnwpwvxwn3wh) {
                $Vp1qvwk2ghzx = in_array($Vhhs1tleulju, is_array($Vqmd5qvqgvzi) ? $Vqmd5qvqgvzi : array($Vqmd5qvqgvzi));

                break;
            }
        }

        if (!$Vp1qvwk2ghzx) {
            throw new Twig_Sandbox_SecurityError(sprintf('Calling "%s" property on a "%s" object is not allowed.', $Vhhs1tleulju, get_class($Vb03gyaku5il)));
        }
    }
}
