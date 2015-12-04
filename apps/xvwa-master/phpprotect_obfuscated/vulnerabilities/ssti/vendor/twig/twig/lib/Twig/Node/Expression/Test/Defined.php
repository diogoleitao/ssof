<?php




class Twig_Node_Expression_Test_Defined extends Twig_Node_Expression_Test
{
    public function __construct(Twig_NodeInterface $Vz3fbiqci0vl, $Vkkm4e2vaxrv, Twig_NodeInterface $V02jggtj2kdh = null, $Vy5krvyy5dgq)
    {
        parent::__construct($Vz3fbiqci0vl, $Vkkm4e2vaxrv, $V02jggtj2kdh, $Vy5krvyy5dgq);

        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Name) {
            $Vz3fbiqci0vl->setAttribute('is_defined_test', true);
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr) {
            $Vz3fbiqci0vl->setAttribute('is_defined_test', true);

            $this->changeIgnoreStrictCheck($Vz3fbiqci0vl);
        } else {
            throw new Twig_Error_Syntax('The "defined" test only works with simple variables', $this->getLine());
        }
    }

    protected function changeIgnoreStrictCheck(Twig_Node_Expression_GetAttr $Vz3fbiqci0vl)
    {
        $Vz3fbiqci0vl->setAttribute('ignore_strict_check', true);

        if ($Vz3fbiqci0vl->getNode('node') instanceof Twig_Node_Expression_GetAttr) {
            $this->changeIgnoreStrictCheck($Vz3fbiqci0vl->getNode('node'));
        }
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->subcompile($this->getNode('node'));
    }
}
