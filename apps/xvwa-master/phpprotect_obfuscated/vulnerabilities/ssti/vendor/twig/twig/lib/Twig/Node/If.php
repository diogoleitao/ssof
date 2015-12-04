<?php




class Twig_Node_If extends Twig_Node
{
    public function __construct(Twig_NodeInterface $V512ofmho3mi, Twig_NodeInterface $Vjut20h40opi = null, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('tests' => $V512ofmho3mi, 'else' => $Vjut20h40opi), array(), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->addDebugInfo($this);
        for ($Vh3cz3bzejsf = 0, $Vc2wt4svqann = count($this->getNode('tests')); $Vh3cz3bzejsf < $Vc2wt4svqann; $Vh3cz3bzejsf += 2) {
            if ($Vh3cz3bzejsf > 0) {
                $V3hf0s3ktsxh
                    ->outdent()
                    ->write('} elseif (')
                ;
            } else {
                $V3hf0s3ktsxh
                    ->write('if (')
                ;
            }

            $V3hf0s3ktsxh
                ->subcompile($this->getNode('tests')->getNode($Vh3cz3bzejsf))
                ->raw(") {\n")
                ->indent()
                ->subcompile($this->getNode('tests')->getNode($Vh3cz3bzejsf + 1))
            ;
        }

        if ($this->hasNode('else') && null !== $this->getNode('else')) {
            $V3hf0s3ktsxh
                ->outdent()
                ->write("} else {\n")
                ->indent()
                ->subcompile($this->getNode('else'))
            ;
        }

        $V3hf0s3ktsxh
            ->outdent()
            ->write("}\n");
    }
}
