<?php




class Twig_Node_SandboxedPrint extends Twig_Node_Print
{
    public function __construct(Twig_Node_Expression $Vj4whpw1etp0, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct($Vj4whpw1etp0, $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write('echo $this->env->getExtension(\'sandbox\')->ensureToStringAllowed(')
            ->subcompile($this->getNode('expr'))
            ->raw(");\n")
        ;
    }

    
    protected function removeNodeFilter($Vz3fbiqci0vl)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Filter) {
            return $this->removeNodeFilter($Vz3fbiqci0vl->getNode('node'));
        }

        return $Vz3fbiqci0vl;
    }
}
