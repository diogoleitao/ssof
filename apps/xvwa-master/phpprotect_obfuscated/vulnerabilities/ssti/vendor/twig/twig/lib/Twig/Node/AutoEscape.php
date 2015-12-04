<?php




class Twig_Node_AutoEscape extends Twig_Node
{
    public function __construct($V2dijfr3ez0f, Twig_NodeInterface $Vc5owkzetmkg, $Vy5krvyy5dgq, $Vyzs3kd551qh = 'autoescape')
    {
        parent::__construct(array('body' => $Vc5owkzetmkg), array('value' => $V2dijfr3ez0f), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->subcompile($this->getNode('body'));
    }
}
