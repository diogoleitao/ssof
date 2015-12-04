<?php




class Twig_Node_Expression_ExtensionReference extends Twig_Node_Expression
{
    public function __construct($Vkkm4e2vaxrv, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array(), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->raw(sprintf("\$this->env->getExtension('%s')", $this->getAttribute('name')));
    }
}
