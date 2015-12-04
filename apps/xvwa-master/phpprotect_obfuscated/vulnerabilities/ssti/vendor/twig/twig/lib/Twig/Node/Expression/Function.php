<?php


class Twig_Node_Expression_Function extends Twig_Node_Expression_Call
{
    public function __construct($Vkkm4e2vaxrv, Twig_NodeInterface $V02jggtj2kdh, $Vy5krvyy5dgq)
    {
        parent::__construct(array('arguments' => $V02jggtj2kdh), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vkkm4e2vaxrv = $this->getAttribute('name');
        $Vpdqyyybdwv1 = $V3hf0s3ktsxh->getEnvironment()->getFunction($Vkkm4e2vaxrv);

        $this->setAttribute('name', $Vkkm4e2vaxrv);
        $this->setAttribute('type', 'function');
        $this->setAttribute('thing', $Vpdqyyybdwv1);
        $this->setAttribute('needs_environment', $Vpdqyyybdwv1->needsEnvironment());
        $this->setAttribute('needs_context', $Vpdqyyybdwv1->needsContext());
        $this->setAttribute('arguments', $Vpdqyyybdwv1->getArguments());
        if ($Vpdqyyybdwv1 instanceof Twig_FunctionCallableInterface || $Vpdqyyybdwv1 instanceof Twig_SimpleFunction) {
            $this->setAttribute('callable', $Vpdqyyybdwv1->getCallable());
        }
        if ($Vpdqyyybdwv1 instanceof Twig_SimpleFunction) {
            $this->setAttribute('is_variadic', $Vpdqyyybdwv1->isVariadic());
        }

        $this->compileCallable($V3hf0s3ktsxh);
    }
}
