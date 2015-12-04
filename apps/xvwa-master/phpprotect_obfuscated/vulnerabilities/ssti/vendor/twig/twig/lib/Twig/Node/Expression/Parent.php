<?php




class Twig_Node_Expression_Parent extends Twig_Node_Expression
{
    public function __construct($Vkkm4e2vaxrv, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array(), array('output' => false, 'name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        if ($this->getAttribute('output')) {
            $V3hf0s3ktsxh
                ->addDebugInfo($this)
                ->write('$this->displayParentBlock(')
                ->string($this->getAttribute('name'))
                ->raw(", \$Vhmvn2c55ghv, \$V1vzehiuu4u4);\n")
            ;
        } else {
            $V3hf0s3ktsxh
                ->raw('$this->renderParentBlock(')
                ->string($this->getAttribute('name'))
                ->raw(', $Vhmvn2c55ghv, $V1vzehiuu4u4)')
            ;
        }
    }
}
