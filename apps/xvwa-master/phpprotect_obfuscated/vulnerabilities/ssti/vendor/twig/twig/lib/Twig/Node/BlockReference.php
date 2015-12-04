<?php




class Twig_Node_BlockReference extends Twig_Node implements Twig_NodeOutputInterface
{
    public function __construct($Vkkm4e2vaxrv, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array(), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write(sprintf("\$this->displayBlock('%s', \$Vhmvn2c55ghv, \$V1vzehiuu4u4);\n", $this->getAttribute('name')))
        ;
    }
}
