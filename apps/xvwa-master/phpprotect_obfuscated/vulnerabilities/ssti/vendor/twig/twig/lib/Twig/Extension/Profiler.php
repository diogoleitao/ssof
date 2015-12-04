<?php



class Twig_Extension_Profiler extends Twig_Extension
{
    private $Vjojeqnussh3;

    public function __construct(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        $this->actives = array($V02pvw3wfyzg);
    }

    public function enter(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        $this->actives[0]->addProfile($V02pvw3wfyzg);
        array_unshift($this->actives, $V02pvw3wfyzg);
    }

    public function leave(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        $V02pvw3wfyzg->leave();
        array_shift($this->actives);

        if (1 === count($this->actives)) {
            $this->actives[0]->leave();
        }
    }

    
    public function getNodeVisitors()
    {
        return array(new Twig_Profiler_NodeVisitor_Profiler($this->getName()));
    }

    
    public function getName()
    {
        return 'profiler';
    }
}
