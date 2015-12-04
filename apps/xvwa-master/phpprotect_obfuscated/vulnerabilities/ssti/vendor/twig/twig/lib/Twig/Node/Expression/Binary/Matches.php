<?php


class Twig_Node_Expression_Binary_Matches extends Twig_Node_Expression_Binary
{
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('preg_match(')
            ->subcompile($this->getNode('right'))
            ->raw(', ')
            ->subcompile($this->getNode('left'))
            ->raw(')')
        ;
    }

    public function operator(Twig_Compiler $V3hf0s3ktsxh)
    {
        return $V3hf0s3ktsxh->raw('');
    }
}
