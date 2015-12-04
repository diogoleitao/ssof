<?php




class Twig_Node_Text extends Twig_Node implements Twig_NodeOutputInterface
{
    public function __construct($V5ttrtwbrnmr, $Vy5krvyy5dgq)
    {
        parent::__construct(array(), array('data' => $V5ttrtwbrnmr), $Vy5krvyy5dgq);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write('echo ')
            ->string($this->getAttribute('data'))
            ->raw(";\n")
        ;
    }
}
