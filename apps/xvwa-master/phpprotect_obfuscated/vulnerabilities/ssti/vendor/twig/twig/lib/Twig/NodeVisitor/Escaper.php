<?php




class Twig_NodeVisitor_Escaper implements Twig_NodeVisitorInterface
{
    protected $Vbacmrflrtm2 = array();
    protected $V1vzehiuu4u4 = array();
    protected $V3ak4nagiaqg;
    protected $Vnwzq3pmlwlm;
    protected $Vfys4tt2ji3o = false;
    protected $Volijp225gbg = array();

    public function __construct()
    {
        $this->safeAnalysis = new Twig_NodeVisitor_SafeAnalysis();
    }

    
    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Module) {
            if ($Vx44ywczaw14->hasExtension('escaper') && $Vfys4tt2ji3o = $Vx44ywczaw14->getExtension('escaper')->getDefaultStrategy($Vz3fbiqci0vl->getAttribute('filename'))) {
                $this->defaultStrategy = $Vfys4tt2ji3o;
            }
            $this->safeVars = array();
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_AutoEscape) {
            $this->statusStack[] = $Vz3fbiqci0vl->getAttribute('value');
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Block) {
            $this->statusStack[] = isset($this->blocks[$Vz3fbiqci0vl->getAttribute('name')]) ? $this->blocks[$Vz3fbiqci0vl->getAttribute('name')] : $this->needEscaping($Vx44ywczaw14);
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Import) {
            $this->safeVars[] = $Vz3fbiqci0vl->getNode('var')->getAttribute('name');
        }

        return $Vz3fbiqci0vl;
    }

    
    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Module) {
            $this->defaultStrategy = false;
            $this->safeVars = array();
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Filter) {
            return $this->preEscapeFilterNode($Vz3fbiqci0vl, $Vx44ywczaw14);
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Print) {
            return $this->escapePrintNode($Vz3fbiqci0vl, $Vx44ywczaw14, $this->needEscaping($Vx44ywczaw14));
        }

        if ($Vz3fbiqci0vl instanceof Twig_Node_AutoEscape || $Vz3fbiqci0vl instanceof Twig_Node_Block) {
            array_pop($this->statusStack);
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_BlockReference) {
            $this->blocks[$Vz3fbiqci0vl->getAttribute('name')] = $this->needEscaping($Vx44ywczaw14);
        }

        return $Vz3fbiqci0vl;
    }

    protected function escapePrintNode(Twig_Node_Print $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14, $Vtathfumoxhu)
    {
        if (false === $Vtathfumoxhu) {
            return $Vz3fbiqci0vl;
        }

        $Vi54krk4edgc = $Vz3fbiqci0vl->getNode('expr');

        if ($this->isSafeFor($Vtathfumoxhu, $Vi54krk4edgc, $Vx44ywczaw14)) {
            return $Vz3fbiqci0vl;
        }

        $Vnwpwvxwn3wh = get_class($Vz3fbiqci0vl);

        return new $Vnwpwvxwn3wh(
            $this->getEscaperFilter($Vtathfumoxhu, $Vi54krk4edgc),
            $Vz3fbiqci0vl->getLine()
        );
    }

    protected function preEscapeFilterNode(Twig_Node_Expression_Filter $Vntaxllqc33j, Twig_Environment $Vx44ywczaw14)
    {
        $Vkkm4e2vaxrv = $Vntaxllqc33j->getNode('filter')->getAttribute('value');

        $Vtathfumoxhu = $Vx44ywczaw14->getFilter($Vkkm4e2vaxrv)->getPreEscape();
        if (null === $Vtathfumoxhu) {
            return $Vntaxllqc33j;
        }

        $Vz3fbiqci0vl = $Vntaxllqc33j->getNode('node');
        if ($this->isSafeFor($Vtathfumoxhu, $Vz3fbiqci0vl, $Vx44ywczaw14)) {
            return $Vntaxllqc33j;
        }

        $Vntaxllqc33j->setNode('node', $this->getEscaperFilter($Vtathfumoxhu, $Vz3fbiqci0vl));

        return $Vntaxllqc33j;
    }

    protected function isSafeFor($Vtathfumoxhu, Twig_NodeInterface $Vi54krk4edgc, $Vx44ywczaw14)
    {
        $Vys3prfoki2r = $this->safeAnalysis->getSafe($Vi54krk4edgc);

        if (null === $Vys3prfoki2r) {
            if (null === $this->traverser) {
                $this->traverser = new Twig_NodeTraverser($Vx44ywczaw14, array($this->safeAnalysis));
            }

            $this->safeAnalysis->setSafeVars($this->safeVars);

            $this->traverser->traverse($Vi54krk4edgc);
            $Vys3prfoki2r = $this->safeAnalysis->getSafe($Vi54krk4edgc);
        }

        return in_array($Vtathfumoxhu, $Vys3prfoki2r) || in_array('all', $Vys3prfoki2r);
    }

    protected function needEscaping(Twig_Environment $Vx44ywczaw14)
    {
        if (count($this->statusStack)) {
            return $this->statusStack[count($this->statusStack) - 1];
        }

        return $this->defaultStrategy ? $this->defaultStrategy : false;
    }

    protected function getEscaperFilter($Vtathfumoxhu, Twig_NodeInterface $Vz3fbiqci0vl)
    {
        $V0devhuwbm4i = $Vz3fbiqci0vl->getLine();
        $Vkkm4e2vaxrv = new Twig_Node_Expression_Constant('escape', $V0devhuwbm4i);
        $V4xqqawawaeh = new Twig_Node(array(new Twig_Node_Expression_Constant((string) $Vtathfumoxhu, $V0devhuwbm4i), new Twig_Node_Expression_Constant(null, $V0devhuwbm4i), new Twig_Node_Expression_Constant(true, $V0devhuwbm4i)));

        return new Twig_Node_Expression_Filter($Vz3fbiqci0vl, $Vkkm4e2vaxrv, $V4xqqawawaeh, $V0devhuwbm4i);
    }

    
    public function getPriority()
    {
        return 0;
    }
}
