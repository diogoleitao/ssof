<?php




class Twig_Node_Spaceless extends Twig_Node
{
    public function __construct(Twig_NodeInterface $Vc5owkzetmkg, $Vy5krvyy5dgq, $Vyzs3kd551qh = 'spaceless')
    {
        parent::__construct(array('body' => $Vc5owkzetmkg), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));\n")
        ;
    }
}
