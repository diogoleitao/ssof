<?php


class Twig_Node_Expression_MethodCall extends Twig_Node_Expression
{
    public function __construct(Twig_Node_Expression $Vz3fbiqci0vl, $Vng2lb3h3obx, Twig_Node_Expression_Array $V02jggtj2kdh, $Vy5krvyy5dgq)
    {
        parent::__construct(array('node' => $Vz3fbiqci0vl, 'arguments' => $V02jggtj2kdh), array('method' => $Vng2lb3h3obx, 'safe' => false), $Vy5krvyy5dgq);

        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Name) {
            $Vz3fbiqci0vl->setAttribute('always_defined', true);
        }
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->subcompile($this->getNode('node'))
            ->raw('->')
            ->raw($this->getAttribute('method'))
            ->raw('(')
        ;
        $Vspubgfk23ku = true;
        foreach ($this->getNode('arguments')->getKeyValuePairs() as $Vsgc4cxcemif) {
            if (!$Vspubgfk23ku) {
                $V3hf0s3ktsxh->raw(', ');
            }
            $Vspubgfk23ku = false;

            $V3hf0s3ktsxh->subcompile($Vsgc4cxcemif['value']);
        }
        $V3hf0s3ktsxh->raw(')');
    }
}
