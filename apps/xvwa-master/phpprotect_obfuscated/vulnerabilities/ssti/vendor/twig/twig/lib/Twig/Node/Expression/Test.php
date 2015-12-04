<?php


class Twig_Node_Expression_Test extends Twig_Node_Expression_Call
{
    public function __construct(Twig_NodeInterface $Vz3fbiqci0vl, $Vkkm4e2vaxrv, Twig_NodeInterface $V02jggtj2kdh = null, $Vy5krvyy5dgq)
    {
        parent::__construct(array('node' => $Vz3fbiqci0vl, 'arguments' => $V02jggtj2kdh), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vkkm4e2vaxrv = $this->getAttribute('name');
        $Vaks55ym420e = $V3hf0s3ktsxh->getEnvironment()->getTest($Vkkm4e2vaxrv);

        $this->setAttribute('name', $Vkkm4e2vaxrv);
        $this->setAttribute('type', 'test');
        $this->setAttribute('thing', $Vaks55ym420e);
        if ($Vaks55ym420e instanceof Twig_TestCallableInterface || $Vaks55ym420e instanceof Twig_SimpleTest) {
            $this->setAttribute('callable', $Vaks55ym420e->getCallable());
        }
        if ($Vaks55ym420e instanceof Twig_SimpleTest) {
            $this->setAttribute('is_variadic', $Vaks55ym420e->isVariadic());
        }

        $this->compileCallable($V3hf0s3ktsxh);
    }
}
