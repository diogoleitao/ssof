<?php



class Twig_Node_SetTemp extends Twig_Node
{
    public function __construct($Vkkm4e2vaxrv, $Vy5krvyy5dgq)
    {
        parent::__construct(array(), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vkkm4e2vaxrv = $this->getAttribute('name');
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write('if (isset($Vhmvn2c55ghv[')
            ->string($Vkkm4e2vaxrv)
            ->raw('])) { $Vegeyxlhenez')
            ->raw($Vkkm4e2vaxrv)
            ->raw('_ = $Vhmvn2c55ghv[')
            ->repr($Vkkm4e2vaxrv)
            ->raw(']; } else { $Vegeyxlhenez')
            ->raw($Vkkm4e2vaxrv)
            ->raw("_ = null; }\n")
        ;
    }
}
