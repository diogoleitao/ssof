<?php




class Twig_Profiler_Profile implements IteratorAggregate, Serializable
{
    const ROOT = 'ROOT';
    const BLOCK = 'block';
    const TEMPLATE = 'template';
    const MACRO = 'macro';

    private $V4lif0h4bhru;
    private $Vkkm4e2vaxrv;
    private $Vtathfumoxhu;
    private $V2yp1jejffn3 = array();
    private $Vjf4lhiwmbtw = array();
    private $Vcp3ors5shku = array();

    public function __construct($V4lif0h4bhru = 'main', $Vtathfumoxhu = self::ROOT, $Vkkm4e2vaxrv = 'main')
    {
        $this->template = $V4lif0h4bhru;
        $this->type = $Vtathfumoxhu;
        $this->name = 0 === strpos($Vkkm4e2vaxrv, '__internal_') ? 'INTERNAL' : $Vkkm4e2vaxrv;
        $this->enter();
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isRoot()
    {
        return self::ROOT === $this->type;
    }

    public function isTemplate()
    {
        return self::TEMPLATE === $this->type;
    }

    public function isBlock()
    {
        return self::BLOCK === $this->type;
    }

    public function isMacro()
    {
        return self::MACRO === $this->type;
    }

    public function getProfiles()
    {
        return $this->profiles;
    }

    public function addProfile(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        $this->profiles[] = $V02pvw3wfyzg;
    }

    
    public function getDuration()
    {
        return isset($this->ends['wt']) && isset($this->starts['wt']) ? $this->ends['wt'] - $this->starts['wt'] : 0;
    }

    
    public function getMemoryUsage()
    {
        return isset($this->ends['mu']) && isset($this->starts['mu']) ? $this->ends['mu'] - $this->starts['mu'] : 0;
    }

    
    public function getPeakMemoryUsage()
    {
        return isset($this->ends['pmu']) && isset($this->starts['pmu']) ? $this->ends['pmu'] - $this->starts['pmu'] : 0;
    }

    
    public function enter()
    {
        $this->starts = array(
            'wt' => microtime(true),
            'mu' => memory_get_usage(),
            'pmu' => memory_get_peak_usage(),
        );
    }

    
    public function leave()
    {
        $this->ends = array(
            'wt' => microtime(true),
            'mu' => memory_get_usage(),
            'pmu' => memory_get_peak_usage(),
        );
    }

    public function getIterator()
    {
        return new ArrayIterator($this->profiles);
    }

    public function serialize()
    {
        return serialize(array($this->template, $this->name, $this->type, $this->starts, $this->ends, $this->profiles));
    }

    public function unserialize($V5ttrtwbrnmr)
    {
        list($this->template, $this->name, $this->type, $this->starts, $this->ends, $this->profiles) = unserialize($V5ttrtwbrnmr);
    }
}
