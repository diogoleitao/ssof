<?php



class Twig_Node_Expression_AssignName extends Twig_Node_Expression_Name
{
    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('$Vhmvn2c55ghv[')
            ->string($this->getAttribute('name'))
            ->raw(']')
        ;
    }
}
