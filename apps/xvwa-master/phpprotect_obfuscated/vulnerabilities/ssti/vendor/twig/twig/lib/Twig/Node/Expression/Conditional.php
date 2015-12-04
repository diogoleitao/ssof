<?php


class Twig_Node_Expression_Conditional extends Twig_Node_Expression
{
    public function __construct(Twig_Node_Expression $Vi3n3vjobu0w, Twig_Node_Expression $Vfxdvj1ybfhn, Twig_Node_Expression $Vn2g1w5bgl1r, $Vy5krvyy5dgq)
    {
        parent::__construct(array('expr1' => $Vi3n3vjobu0w, 'expr2' => $Vfxdvj1ybfhn, 'expr3' => $Vn2g1w5bgl1r), array(), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('((')
            ->subcompile($this->getNode('expr1'))
            ->raw(') ? (')
            ->subcompile($this->getNode('expr2'))
            ->raw(') : (')
            ->subcompile($this->getNode('expr3'))
            ->raw('))')
        ;
    }
}
