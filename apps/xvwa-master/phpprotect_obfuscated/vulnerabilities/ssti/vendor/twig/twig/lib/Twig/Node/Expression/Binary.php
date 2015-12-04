<?php


abstract class Twig_Node_Expression_Binary extends Twig_Node_Expression
{
    public function __construct(Twig_NodeInterface $Vh3ibowzun00, Twig_NodeInterface $Vz5te4hbfoxv, $Vy5krvyy5dgq)
    {
        parent::__construct(array('left' => $Vh3ibowzun00, 'right' => $Vz5te4hbfoxv), array(), $Vy5krvyy5dgq);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('(')
            ->subcompile($this->getNode('left'))
            ->raw(' ')
        ;
        $this->operator($V3hf0s3ktsxh);
        $V3hf0s3ktsxh
            ->raw(' ')
            ->subcompile($this->getNode('right'))
            ->raw(')')
        ;
    }

    abstract public function operator(Twig_Compiler $V3hf0s3ktsxh);
}
