<?php




class Twig_NodeVisitor_Optimizer implements Twig_NodeVisitorInterface
{
    const OPTIMIZE_ALL = -1;
    const OPTIMIZE_NONE = 0;
    const OPTIMIZE_FOR = 2;
    const OPTIMIZE_RAW_FILTER = 4;
    const OPTIMIZE_VAR_ACCESS = 8;

    protected $Vfcqqaadg1mh = array();
    protected $Vfcqqaadg1mhTargets = array();
    protected $Vx4ecyoyfzfk;
    protected $Vw5fajzozkml = array();
    protected $Vdol1hsx0z30 = false;

    
    public function __construct($Vx4ecyoyfzfk = -1)
    {
        if (!is_int($Vx4ecyoyfzfk) || $Vx4ecyoyfzfk > (self::OPTIMIZE_FOR | self::OPTIMIZE_RAW_FILTER | self::OPTIMIZE_VAR_ACCESS)) {
            throw new InvalidArgumentException(sprintf('Optimizer mode "%s" is not valid.', $Vx4ecyoyfzfk));
        }

        $this->optimizers = $Vx4ecyoyfzfk;
    }

    
    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if (self::OPTIMIZE_FOR === (self::OPTIMIZE_FOR & $this->optimizers)) {
            $this->enterOptimizeFor($Vz3fbiqci0vl, $Vx44ywczaw14);
        }

        if (PHP_VERSION_ID < 50400 && self::OPTIMIZE_VAR_ACCESS === (self::OPTIMIZE_VAR_ACCESS & $this->optimizers) && !$Vx44ywczaw14->isStrictVariables() && !$Vx44ywczaw14->hasExtension('sandbox')) {
            if ($this->inABody) {
                if (!$Vz3fbiqci0vl instanceof Twig_Node_Expression) {
                    if (get_class($Vz3fbiqci0vl) !== 'Twig_Node') {
                        array_unshift($this->prependedNodes, array());
                    }
                } else {
                    $Vz3fbiqci0vl = $this->optimizeVariables($Vz3fbiqci0vl, $Vx44ywczaw14);
                }
            } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Body) {
                $this->inABody = true;
            }
        }

        return $Vz3fbiqci0vl;
    }

    
    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        $Vi54krk4edgc = $Vz3fbiqci0vl instanceof Twig_Node_Expression;

        if (self::OPTIMIZE_FOR === (self::OPTIMIZE_FOR & $this->optimizers)) {
            $this->leaveOptimizeFor($Vz3fbiqci0vl, $Vx44ywczaw14);
        }

        if (self::OPTIMIZE_RAW_FILTER === (self::OPTIMIZE_RAW_FILTER & $this->optimizers)) {
            $Vz3fbiqci0vl = $this->optimizeRawFilter($Vz3fbiqci0vl, $Vx44ywczaw14);
        }

        $Vz3fbiqci0vl = $this->optimizePrintNode($Vz3fbiqci0vl, $Vx44ywczaw14);

        if (self::OPTIMIZE_VAR_ACCESS === (self::OPTIMIZE_VAR_ACCESS & $this->optimizers) && !$Vx44ywczaw14->isStrictVariables() && !$Vx44ywczaw14->hasExtension('sandbox')) {
            if ($Vz3fbiqci0vl instanceof Twig_Node_Body) {
                $this->inABody = false;
            } elseif ($this->inABody) {
                if (!$Vi54krk4edgc && get_class($Vz3fbiqci0vl) !== 'Twig_Node' && $Vw5fajzozkml = array_shift($this->prependedNodes)) {
                    $Vz3fbiqci0vls = array();
                    foreach (array_unique($Vw5fajzozkml) as $Vkkm4e2vaxrv) {
                        $Vz3fbiqci0vls[] = new Twig_Node_SetTemp($Vkkm4e2vaxrv, $Vz3fbiqci0vl->getLine());
                    }

                    $Vz3fbiqci0vls[] = $Vz3fbiqci0vl;
                    $Vz3fbiqci0vl = new Twig_Node($Vz3fbiqci0vls);
                }
            }
        }

        return $Vz3fbiqci0vl;
    }

    protected function optimizeVariables(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ('Twig_Node_Expression_Name' === get_class($Vz3fbiqci0vl) && $Vz3fbiqci0vl->isSimple()) {
            $this->prependedNodes[0][] = $Vz3fbiqci0vl->getAttribute('name');

            return new Twig_Node_Expression_TempName($Vz3fbiqci0vl->getAttribute('name'), $Vz3fbiqci0vl->getLine());
        }

        return $Vz3fbiqci0vl;
    }

    
    protected function optimizePrintNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if (!$Vz3fbiqci0vl instanceof Twig_Node_Print) {
            return $Vz3fbiqci0vl;
        }

        if (
            $Vz3fbiqci0vl->getNode('expr') instanceof Twig_Node_Expression_BlockReference ||
            $Vz3fbiqci0vl->getNode('expr') instanceof Twig_Node_Expression_Parent
        ) {
            $Vz3fbiqci0vl->getNode('expr')->setAttribute('output', true);

            return $Vz3fbiqci0vl->getNode('expr');
        }

        return $Vz3fbiqci0vl;
    }

    
    protected function optimizeRawFilter(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Filter && 'raw' == $Vz3fbiqci0vl->getNode('filter')->getAttribute('value')) {
            return $Vz3fbiqci0vl->getNode('node');
        }

        return $Vz3fbiqci0vl;
    }

    
    protected function enterOptimizeFor(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_For) {
            
            $Vz3fbiqci0vl->setAttribute('with_loop', false);
            array_unshift($this->loops, $Vz3fbiqci0vl);
            array_unshift($this->loopsTargets, $Vz3fbiqci0vl->getNode('value_target')->getAttribute('name'));
            array_unshift($this->loopsTargets, $Vz3fbiqci0vl->getNode('key_target')->getAttribute('name'));
        } elseif (!$this->loops) {
            
            return;
        }

        

        
        elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Name && 'loop' === $Vz3fbiqci0vl->getAttribute('name')) {
            $Vz3fbiqci0vl->setAttribute('always_defined', true);
            $this->addLoopToCurrent();
        }

        
        elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Name && in_array($Vz3fbiqci0vl->getAttribute('name'), $this->loopsTargets)) {
            $Vz3fbiqci0vl->setAttribute('always_defined', true);
        }

        
        elseif ($Vz3fbiqci0vl instanceof Twig_Node_BlockReference || $Vz3fbiqci0vl instanceof Twig_Node_Expression_BlockReference) {
            $this->addLoopToCurrent();
        }

        
        elseif ($Vz3fbiqci0vl instanceof Twig_Node_Include && !$Vz3fbiqci0vl->getAttribute('only')) {
            $this->addLoopToAll();
        }

        
        elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Function
            && 'include' === $Vz3fbiqci0vl->getAttribute('name')
            && (!$Vz3fbiqci0vl->getNode('arguments')->hasNode('with_context')
                 || false !== $Vz3fbiqci0vl->getNode('arguments')->getNode('with_context')->getAttribute('value')
               )
        ) {
            $this->addLoopToAll();
        }

        
        elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr
            && (!$Vz3fbiqci0vl->getNode('attribute') instanceof Twig_Node_Expression_Constant
                || 'parent' === $Vz3fbiqci0vl->getNode('attribute')->getAttribute('value')
               )
            && (true === $this->loops[0]->getAttribute('with_loop')
                || ($Vz3fbiqci0vl->getNode('node') instanceof Twig_Node_Expression_Name
                    && 'loop' === $Vz3fbiqci0vl->getNode('node')->getAttribute('name')
                   )
               )
        ) {
            $this->addLoopToAll();
        }
    }

    
    protected function leaveOptimizeFor(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_For) {
            array_shift($this->loops);
            array_shift($this->loopsTargets);
            array_shift($this->loopsTargets);
        }
    }

    protected function addLoopToCurrent()
    {
        $this->loops[0]->setAttribute('with_loop', true);
    }

    protected function addLoopToAll()
    {
        foreach ($this->loops as $Vhwccm4hjp3t) {
            $Vhwccm4hjp3t->setAttribute('with_loop', true);
        }
    }

    
    public function getPriority()
    {
        return 255;
    }
}
