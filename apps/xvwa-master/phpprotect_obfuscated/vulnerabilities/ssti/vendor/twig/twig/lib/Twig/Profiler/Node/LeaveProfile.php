<?php




class Twig_Profiler_Node_LeaveProfile extends Twig_Node
{
    public function __construct($V2tqz5k4ndy2)
    {
        parent::__construct(array(), array('var_name' => $V2tqz5k4ndy2));
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write("\n")
            ->write(sprintf("\$%s->leave(\$%s);\n\n", $this->getAttribute('var_name'), $this->getAttribute('var_name').'_prof'))
        ;
    }
}
