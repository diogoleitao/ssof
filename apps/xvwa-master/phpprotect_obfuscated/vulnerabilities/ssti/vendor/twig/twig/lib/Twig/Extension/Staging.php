<?php




class Twig_Extension_Staging extends Twig_Extension
{
    protected $Vakwpkr2roqa = array();
    protected $Vh4matx43sow = array();
    protected $Vwhrpr43obxe = array();
    protected $V1hkqhl3egrj = array();
    protected $Vdvmvneyp5qb = array();
    protected $V512ofmho3mi = array();

    public function addFunction($Vkkm4e2vaxrv, $Vpdqyyybdwv1)
    {
        $this->functions[$Vkkm4e2vaxrv] = $Vpdqyyybdwv1;
    }

    
    public function getFunctions()
    {
        return $this->functions;
    }

    public function addFilter($Vkkm4e2vaxrv, $Vntaxllqc33j)
    {
        $this->filters[$Vkkm4e2vaxrv] = $Vntaxllqc33j;
    }

    
    public function getFilters()
    {
        return $this->filters;
    }

    public function addNodeVisitor(Twig_NodeVisitorInterface $Vy4jojjdmqtp)
    {
        $this->visitors[] = $Vy4jojjdmqtp;
    }

    
    public function getNodeVisitors()
    {
        return $this->visitors;
    }

    public function addTokenParser(Twig_TokenParserInterface $Vqfx20r3yfax)
    {
        $this->tokenParsers[] = $Vqfx20r3yfax;
    }

    
    public function getTokenParsers()
    {
        return $this->tokenParsers;
    }

    public function addGlobal($Vkkm4e2vaxrv, $V2dijfr3ez0f)
    {
        $this->globals[$Vkkm4e2vaxrv] = $V2dijfr3ez0f;
    }

    
    public function getGlobals()
    {
        return $this->globals;
    }

    public function addTest($Vkkm4e2vaxrv, $Vaks55ym420e)
    {
        $this->tests[$Vkkm4e2vaxrv] = $Vaks55ym420e;
    }

    
    public function getTests()
    {
        return $this->tests;
    }

    
    public function getName()
    {
        return 'staging';
    }
}
