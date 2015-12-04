<?php


class Twig_Node_Expression_Filter extends Twig_Node_Expression_Call
{
    public function __construct(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Node_Expression_Constant $Vhnmuhimprsi, Twig_NodeInterface $V02jggtj2kdh, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('node' => $Vz3fbiqci0vl, 'filter' => $Vhnmuhimprsi, 'arguments' => $V02jggtj2kdh), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vkkm4e2vaxrv = $this->getNode('filter')->getAttribute('value');
        $Vntaxllqc33j = $V3hf0s3ktsxh->getEnvironment()->getFilter($Vkkm4e2vaxrv);

        $this->setAttribute('name', $Vkkm4e2vaxrv);
        $this->setAttribute('type', 'filter');
        $this->setAttribute('thing', $Vntaxllqc33j);
        $this->setAttribute('needs_environment', $Vntaxllqc33j->needsEnvironment());
        $this->setAttribute('needs_context', $Vntaxllqc33j->needsContext());
        $this->setAttribute('arguments', $Vntaxllqc33j->getArguments());
        if ($Vntaxllqc33j instanceof Twig_FilterCallableInterface || $Vntaxllqc33j instanceof Twig_SimpleFilter) {
            $this->setAttribute('callable', $Vntaxllqc33j->getCallable());
        }
        if ($Vntaxllqc33j instanceof Twig_SimpleFilter) {
            $this->setAttribute('is_variadic', $Vntaxllqc33j->isVariadic());
        }

        $this->compileCallable($V3hf0s3ktsxh);
    }
}
