<?php




class Twig_Node_Expression_BlockReference extends Twig_Node_Expression
{
    public function __construct(Twig_NodeInterface $Vkkm4e2vaxrv, $Vuk3htefbesl = false, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('name' => $Vkkm4e2vaxrv), array('as_string' => $Vuk3htefbesl, 'output' => false), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        if ($this->getAttribute('as_string')) {
            $V3hf0s3ktsxh->raw('(string) ');
        }

        if ($this->getAttribute('output')) {
            $V3hf0s3ktsxh
                ->addDebugInfo($this)
                ->write('$this->displayBlock(')
                ->subcompile($this->getNode('name'))
                ->raw(", \$Vhmvn2c55ghv, \$V1vzehiuu4u4);\n")
            ;
        } else {
            $V3hf0s3ktsxh
                ->raw('$this->renderBlock(')
                ->subcompile($this->getNode('name'))
                ->raw(', $Vhmvn2c55ghv, $V1vzehiuu4u4)')
            ;
        }
    }
}
