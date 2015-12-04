<?php




class Twig_Node_ForLoop extends Twig_Node
{
    public function __construct($Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array(), array('with_loop' => false, 'ifexpr' => false, 'else' => false), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        if ($this->getAttribute('else')) {
            $V3hf0s3ktsxh->write("\$Vhmvn2c55ghv['_iterated'] = true;\n");
        }

        if ($this->getAttribute('with_loop')) {
            $V3hf0s3ktsxh
                ->write("++\$Vhmvn2c55ghv['loop']['index0'];\n")
                ->write("++\$Vhmvn2c55ghv['loop']['index'];\n")
                ->write("\$Vhmvn2c55ghv['loop']['first'] = false;\n")
            ;

            if (!$this->getAttribute('ifexpr')) {
                $V3hf0s3ktsxh
                    ->write("if (isset(\$Vhmvn2c55ghv['loop']['length'])) {\n")
                    ->indent()
                    ->write("--\$Vhmvn2c55ghv['loop']['revindex0'];\n")
                    ->write("--\$Vhmvn2c55ghv['loop']['revindex'];\n")
                    ->write("\$Vhmvn2c55ghv['loop']['last'] = 0 === \$Vhmvn2c55ghv['loop']['revindex0'];\n")
                    ->outdent()
                    ->write("}\n")
                ;
            }
        }
    }
}
