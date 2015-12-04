<?php




class Twig_NodeVisitor_Sandbox implements Twig_NodeVisitorInterface
{
    protected $Vvvjdr5upnjo = false;
    protected $V5hu3rl2wtua;
    protected $Vh4matx43sow;
    protected $Vakwpkr2roqa;

    
    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Module) {
            $this->inAModule = true;
            $this->tags = array();
            $this->filters = array();
            $this->functions = array();

            return $Vz3fbiqci0vl;
        } elseif ($this->inAModule) {
            
            if ($Vz3fbiqci0vl->getNodeTag() && !isset($this->tags[$Vz3fbiqci0vl->getNodeTag()])) {
                $this->tags[$Vz3fbiqci0vl->getNodeTag()] = $Vz3fbiqci0vl;
            }

            
            if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Filter && !isset($this->filters[$Vz3fbiqci0vl->getNode('filter')->getAttribute('value')])) {
                $this->filters[$Vz3fbiqci0vl->getNode('filter')->getAttribute('value')] = $Vz3fbiqci0vl;
            }

            
            if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Function && !isset($this->functions[$Vz3fbiqci0vl->getAttribute('name')])) {
                $this->functions[$Vz3fbiqci0vl->getAttribute('name')] = $Vz3fbiqci0vl;
            }

            
            if ($Vz3fbiqci0vl instanceof Twig_Node_Print) {
                return new Twig_Node_SandboxedPrint($Vz3fbiqci0vl->getNode('expr'), $Vz3fbiqci0vl->getLine(), $Vz3fbiqci0vl->getNodeTag());
            }
        }

        return $Vz3fbiqci0vl;
    }

    
    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Module) {
            $this->inAModule = false;

            $Vz3fbiqci0vl->setNode('display_start', new Twig_Node(array(new Twig_Node_CheckSecurity($this->filters, $this->tags, $this->functions), $Vz3fbiqci0vl->getNode('display_start'))));
        }

        return $Vz3fbiqci0vl;
    }

    
    public function getPriority()
    {
        return 0;
    }
}
