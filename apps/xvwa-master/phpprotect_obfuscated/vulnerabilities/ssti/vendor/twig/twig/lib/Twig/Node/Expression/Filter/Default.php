<?php




class Twig_Node_Expression_Filter_Default extends Twig_Node_Expression_Filter
{
    public function __construct(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Node_Expression_Constant $Vhnmuhimprsi, Twig_NodeInterface $V02jggtj2kdh, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        $V0x2y4bdxg4l = new Twig_Node_Expression_Filter($Vz3fbiqci0vl, new Twig_Node_Expression_Constant('default', $Vz3fbiqci0vl->getLine()), $V02jggtj2kdh, $Vz3fbiqci0vl->getLine());

        if ('default' === $Vhnmuhimprsi->getAttribute('value') && ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Name || $Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr)) {
            $Vaks55ym420e = new Twig_Node_Expression_Test_Defined(clone $Vz3fbiqci0vl, 'defined', new Twig_Node(), $Vz3fbiqci0vl->getLine());
            $V13n02uf2jrl = count($V02jggtj2kdh) ? $V02jggtj2kdh->getNode(0) : new Twig_Node_Expression_Constant('', $Vz3fbiqci0vl->getLine());

            $Vz3fbiqci0vl = new Twig_Node_Expression_Conditional($Vaks55ym420e, $V0x2y4bdxg4l, $V13n02uf2jrl, $Vz3fbiqci0vl->getLine());
        } else {
            $Vz3fbiqci0vl = $V0x2y4bdxg4l;
        }

        parent::__construct($Vz3fbiqci0vl, $Vhnmuhimprsi, $V02jggtj2kdh, $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->subcompile($this->getNode('node'));
    }
}
