<?php




class Twig_Node_Print extends Twig_Node implements Twig_NodeOutputInterface
{
    public function __construct(Twig_Node_Expression $Vj4whpw1etp0, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('expr' => $Vj4whpw1etp0), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write('echo ')
            ->subcompile($this->getNode('expr'))
            ->raw(";\n")
        ;
    }
}
