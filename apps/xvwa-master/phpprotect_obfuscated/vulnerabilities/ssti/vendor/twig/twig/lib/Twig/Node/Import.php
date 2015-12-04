<?php




class Twig_Node_Import extends Twig_Node
{
    public function __construct(Twig_Node_Expression $Vj4whpw1etp0, Twig_Node_Expression $Vl2x41mifdiq, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('expr' => $Vj4whpw1etp0, 'var' => $Vl2x41mifdiq), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write('')
            ->subcompile($this->getNode('var'))
            ->raw(' = ')
        ;

        if ($this->getNode('expr') instanceof Twig_Node_Expression_Name && '_self' === $this->getNode('expr')->getAttribute('name')) {
            $V3hf0s3ktsxh->raw('$this');
        } else {
            $V3hf0s3ktsxh
                ->raw('$this->loadTemplate(')
                ->subcompile($this->getNode('expr'))
                ->raw(', ')
                ->repr($V3hf0s3ktsxh->getFilename())
                ->raw(', ')
                ->repr($this->getLine())
                ->raw(')')
            ;
        }

        $V3hf0s3ktsxh->raw(";\n");
    }
}
