<?php


class Twig_Node_Expression_TempName extends Twig_Node_Expression
{
    public function __construct($Vkkm4e2vaxrv, $Vy5krvyy5dgq)
    {
        parent::__construct(array(), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('$Vegeyxlhenez')
            ->raw($this->getAttribute('name'))
            ->raw('_')
        ;
    }
}
