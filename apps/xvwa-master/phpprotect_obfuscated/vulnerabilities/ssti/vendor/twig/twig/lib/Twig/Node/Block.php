<?php




class Twig_Node_Block extends Twig_Node
{
    public function __construct($Vkkm4e2vaxrv, Twig_NodeInterface $Vc5owkzetmkg, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('body' => $Vc5owkzetmkg), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write(sprintf("public function block_%s(\$Vhmvn2c55ghv, array \$V1vzehiuu4u4 = array())\n", $this->getAttribute('name')), "{\n")
            ->indent()
        ;

        $V3hf0s3ktsxh
            ->subcompile($this->getNode('body'))
            ->outdent()
            ->write("}\n\n")
        ;
    }
}
