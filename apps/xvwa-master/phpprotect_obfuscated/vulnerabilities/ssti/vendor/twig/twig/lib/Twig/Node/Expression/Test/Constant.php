<?php




class Twig_Node_Expression_Test_Constant extends Twig_Node_Expression_Test
{
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->raw('(')
            ->subcompile($this->getNode('node'))
            ->raw(' === constant(')
        ;

        if ($this->getNode('arguments')->hasNode(1)) {
            $V3hf0s3ktsxh
                ->raw('get_class(')
                ->subcompile($this->getNode('arguments')->getNode(1))
                ->raw(')."::".')
            ;
        }

        $V3hf0s3ktsxh
            ->subcompile($this->getNode('arguments')->getNode(0))
            ->raw('))')
        ;
    }
}
