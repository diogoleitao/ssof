<?php




class Twig_Node_Flush extends Twig_Node
{
    public function __construct($Vy5krvyy5dgq, $Vyzs3kd551qh)
    {
        parent::__construct(array(), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write("flush();\n")
        ;
    }
}
