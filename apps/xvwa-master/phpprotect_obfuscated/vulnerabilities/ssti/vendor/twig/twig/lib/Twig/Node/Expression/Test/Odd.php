<?php




class Twig_Node_Expression_Test_Odd extends Twig_Node_Expression_Test
{
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('(')
            ->subcompile($this->getNode('node'))
            ->raw(' % 2 == 1')
            ->raw(')')
        ;
    }
}
