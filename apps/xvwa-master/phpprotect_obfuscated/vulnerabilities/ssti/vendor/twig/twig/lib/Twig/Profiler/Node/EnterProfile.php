<?php




class Twig_Profiler_Node_EnterProfile extends Twig_Node
{
    public function __construct($Vwd3kv1nljcw, $Vtathfumoxhu, $Vkkm4e2vaxrv, $V2tqz5k4ndy2)
    {
        parent::__construct(array(), array('extension_name' => $Vwd3kv1nljcw, 'name' => $Vkkm4e2vaxrv, 'type' => $Vtathfumoxhu, 'var_name' => $V2tqz5k4ndy2));
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write(sprintf('$%s = $this->env->getExtension(', $this->getAttribute('var_name')))
            ->repr($this->getAttribute('extension_name'))
            ->raw(");\n")
            ->write(sprintf('$%s->enter($%s = new Twig_Profiler_Profile($this->getTemplateName(), ', $this->getAttribute('var_name'), $this->getAttribute('var_name').'_prof'))
            ->repr($this->getAttribute('type'))
            ->raw(', ')
            ->repr($this->getAttribute('name'))
            ->raw("));\n\n")
        ;
    }
}
