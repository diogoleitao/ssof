<?php




class Twig_Node_Sandbox extends Twig_Node
{
    public function __construct(Twig_NodeInterface $Vc5owkzetmkg, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('body' => $Vc5owkzetmkg), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write("\$Vw1ccafnn4lr = \$this->env->getExtension('sandbox');\n")
            ->write("if (!\$Vc5vp501jlbe = \$Vw1ccafnn4lr->isSandboxed()) {\n")
            ->indent()
            ->write("\$Vw1ccafnn4lr->enableSandbox();\n")
            ->outdent()
            ->write("}\n")
            ->subcompile($this->getNode('body'))
            ->write("if (!\$Vc5vp501jlbe) {\n")
            ->indent()
            ->write("\$Vw1ccafnn4lr->disableSandbox();\n")
            ->outdent()
            ->write("}\n")
        ;
    }
}
