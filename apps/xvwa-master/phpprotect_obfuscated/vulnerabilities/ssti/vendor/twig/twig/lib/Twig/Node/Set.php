<?php




class Twig_Node_Set extends Twig_Node
{
    public function __construct($Vi4bpncmuhax, Twig_NodeInterface $Vc5m2qpa3jyp, Twig_NodeInterface $Vpek50boolgn, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('names' => $Vc5m2qpa3jyp, 'values' => $Vpek50boolgn), array('capture' => $Vi4bpncmuhax, 'safe' => false), $Vy5krvyy5dgq, $Vyzs3kd551qh);

        
        if ($this->getAttribute('capture')) {
            $this->setAttribute('safe', true);

            $Vpek50boolgn = $this->getNode('values');
            if ($Vpek50boolgn instanceof Twig_Node_Text) {
                $this->setNode('values', new Twig_Node_Expression_Constant($Vpek50boolgn->getAttribute('data'), $Vpek50boolgn->getLine()));
                $this->setAttribute('capture', false);
            }
        }
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->addDebugInfo($this);

        if (count($this->getNode('names')) > 1) {
            $V3hf0s3ktsxh->write('list(');
            foreach ($this->getNode('names') as $Vcbgtm3cytrg => $Vz3fbiqci0vl) {
                if ($Vcbgtm3cytrg) {
                    $V3hf0s3ktsxh->raw(', ');
                }

                $V3hf0s3ktsxh->subcompile($Vz3fbiqci0vl);
            }
            $V3hf0s3ktsxh->raw(')');
        } else {
            if ($this->getAttribute('capture')) {
                $V3hf0s3ktsxh
                    ->write("ob_start();\n")
                    ->subcompile($this->getNode('values'))
                ;
            }

            $V3hf0s3ktsxh->subcompile($this->getNode('names'), false);

            if ($this->getAttribute('capture')) {
                $V3hf0s3ktsxh->raw(" = ('' === \$Valdd4n2jtbt = ob_get_clean()) ? '' : new Twig_Markup(\$Valdd4n2jtbt, \$this->env->getCharset())");
            }
        }

        if (!$this->getAttribute('capture')) {
            $V3hf0s3ktsxh->raw(' = ');

            if (count($this->getNode('names')) > 1) {
                $V3hf0s3ktsxh->write('array(');
                foreach ($this->getNode('values') as $Vcbgtm3cytrg => $V2dijfr3ez0f) {
                    if ($Vcbgtm3cytrg) {
                        $V3hf0s3ktsxh->raw(', ');
                    }

                    $V3hf0s3ktsxh->subcompile($V2dijfr3ez0f);
                }
                $V3hf0s3ktsxh->raw(')');
            } else {
                if ($this->getAttribute('safe')) {
                    $V3hf0s3ktsxh
                        ->raw("('' === \$Valdd4n2jtbt = ")
                        ->subcompile($this->getNode('values'))
                        ->raw(") ? '' : new Twig_Markup(\$Valdd4n2jtbt, \$this->env->getCharset())")
                    ;
                } else {
                    $V3hf0s3ktsxh->subcompile($this->getNode('values'));
                }
            }
        }

        $V3hf0s3ktsxh->raw(";\n");
    }
}
