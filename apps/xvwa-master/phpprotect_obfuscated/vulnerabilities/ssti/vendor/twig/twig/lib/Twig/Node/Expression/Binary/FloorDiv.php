<?php


class Twig_Node_Expression_Binary_FloorDiv extends Twig_Node_Expression_Binary
{
    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->raw('intval(floor(');
        parent::compile($V3hf0s3ktsxh);
        $V3hf0s3ktsxh->raw('))');
    }

    public function operator(Twig_Compiler $V3hf0s3ktsxh)
    {
        return $V3hf0s3ktsxh->raw('/');
    }
}
