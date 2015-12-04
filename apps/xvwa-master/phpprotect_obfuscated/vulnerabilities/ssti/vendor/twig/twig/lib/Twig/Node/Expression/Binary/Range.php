<?php


class Twig_Node_Expression_Binary_Range extends Twig_Node_Expression_Binary
{
    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('range(')
            ->subcompile($this->getNode('left'))
            ->raw(', ')
            ->subcompile($this->getNode('right'))
            ->raw(')')
        ;
    }

    public function operator(Twig_Compiler $V3hf0s3ktsxh)
    {
        return $V3hf0s3ktsxh->raw('..');
    }
}
