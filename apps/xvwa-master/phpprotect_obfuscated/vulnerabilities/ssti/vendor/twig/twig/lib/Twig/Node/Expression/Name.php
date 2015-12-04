<?php


class Twig_Node_Expression_Name extends Twig_Node_Expression
{
    protected $Vnyeca4k32xr = array(
        '_self' => '$this',
        '_context' => '$Vhmvn2c55ghv',
        '_charset' => '$this->env->getCharset()',
    );

    public function __construct($Vkkm4e2vaxrv, $Vy5krvyy5dgq)
    {
        parent::__construct(array(), array('name' => $Vkkm4e2vaxrv, 'is_defined_test' => false, 'ignore_strict_check' => false, 'always_defined' => false), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vkkm4e2vaxrv = $this->getAttribute('name');

        $V3hf0s3ktsxh->addDebugInfo($this);

        if ($this->getAttribute('is_defined_test')) {
            if ($this->isSpecial()) {
                $V3hf0s3ktsxh->repr(true);
            } else {
                $V3hf0s3ktsxh->raw('array_key_exists(')->repr($Vkkm4e2vaxrv)->raw(', $Vhmvn2c55ghv)');
            }
        } elseif ($this->isSpecial()) {
            $V3hf0s3ktsxh->raw($this->specialVars[$Vkkm4e2vaxrv]);
        } elseif ($this->getAttribute('always_defined')) {
            $V3hf0s3ktsxh
                ->raw('$Vhmvn2c55ghv[')
                ->string($Vkkm4e2vaxrv)
                ->raw(']')
            ;
        } else {
            
            
            
            if (PHP_VERSION_ID >= 50400) {
                
                $V3hf0s3ktsxh
                    ->raw('(isset($Vhmvn2c55ghv[')
                    ->string($Vkkm4e2vaxrv)
                    ->raw(']) ? $Vhmvn2c55ghv[')
                    ->string($Vkkm4e2vaxrv)
                    ->raw('] : ')
                ;

                if ($this->getAttribute('ignore_strict_check') || !$V3hf0s3ktsxh->getEnvironment()->isStrictVariables()) {
                    $V3hf0s3ktsxh->raw('null)');
                } else {
                    $V3hf0s3ktsxh->raw('$this->getContext($Vhmvn2c55ghv, ')->string($Vkkm4e2vaxrv)->raw('))');
                }
            } else {
                $V3hf0s3ktsxh
                    ->raw('$this->getContext($Vhmvn2c55ghv, ')
                    ->string($Vkkm4e2vaxrv)
                ;

                if ($this->getAttribute('ignore_strict_check')) {
                    $V3hf0s3ktsxh->raw(', true');
                }

                $V3hf0s3ktsxh
                    ->raw(')')
                ;
            }
        }
    }

    public function isSpecial()
    {
        return isset($this->specialVars[$this->getAttribute('name')]);
    }

    public function isSimple()
    {
        return !$this->isSpecial() && !$this->getAttribute('is_defined_test');
    }
}
