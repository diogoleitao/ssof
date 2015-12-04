<?php


abstract class Twig_Node_Expression_Unary extends Twig_Node_Expression
{
    public function __construct(Twig_NodeInterface $Vz3fbiqci0vl, $Vy5krvyy5dgq)
    {
        parent::__construct(array('node' => $Vz3fbiqci0vl), array(), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->raw(' ');
        $this->operator($V3hf0s3ktsxh);
        $V3hf0s3ktsxh->subcompile($this->getNode('node'));
    }

    abstract public function operator(Twig_Compiler $V3hf0s3ktsxh);
}
