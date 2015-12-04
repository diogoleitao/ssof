<?php




class Twig_Node_Macro extends Twig_Node
{
    const VARARGS_NAME = 'varargs';

    public function __construct($Vkkm4e2vaxrv, Twig_NodeInterface $Vc5owkzetmkg, Twig_NodeInterface $V02jggtj2kdh, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        foreach ($V02jggtj2kdh as $Vhfysjkr1fr5 => $Vnlyqa1zys3i) {
            if (self::VARARGS_NAME === $Vhfysjkr1fr5) {
                throw new Twig_Error_Syntax(sprintf('The argument "%s" in macro "%s" cannot be defined because the variable "%s" is reserved for arbitrary arguments', self::VARARGS_NAME, $Vkkm4e2vaxrv, self::VARARGS_NAME), $Vnlyqa1zys3i->getLine());
            }
        }

        parent::__construct(array('body' => $Vc5owkzetmkg, 'arguments' => $V02jggtj2kdh), array('name' => $Vkkm4e2vaxrv), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            ->write(sprintf('public function get%s(', $this->getAttribute('name')))
        ;

        $Vc2wt4svqann = count($this->getNode('arguments'));
        $Vbjmk1rrxfqv = 0;
        foreach ($this->getNode('arguments') as $Vkkm4e2vaxrv => $V0x2y4bdxg4l) {
            $V3hf0s3ktsxh
                ->raw('$Vdyqak55uxqq'.$Vkkm4e2vaxrv.'__ = ')
                ->subcompile($V0x2y4bdxg4l)
            ;

            if (++$Vbjmk1rrxfqv < $Vc2wt4svqann) {
                $V3hf0s3ktsxh->raw(', ');
            }
        }

        if (PHP_VERSION_ID >= 50600) {
            if ($Vc2wt4svqann) {
                $V3hf0s3ktsxh->raw(', ');
            }

            $V3hf0s3ktsxh->raw('...$Vdyqak55uxqqvarargs__');
        }

        $V3hf0s3ktsxh
            ->raw(")\n")
            ->write("{\n")
            ->indent()
        ;

        $V3hf0s3ktsxh
            ->write("\$Vhmvn2c55ghv = \$this->env->mergeGlobals(array(\n")
            ->indent()
        ;

        foreach ($this->getNode('arguments') as $Vkkm4e2vaxrv => $V0x2y4bdxg4l) {
            $V3hf0s3ktsxh
                ->addIndentation()
                ->string($Vkkm4e2vaxrv)
                ->raw(' => $Vdyqak55uxqq'.$Vkkm4e2vaxrv.'__')
                ->raw(",\n")
            ;
        }

        $V3hf0s3ktsxh
            ->addIndentation()
            ->string(self::VARARGS_NAME)
            ->raw(' => ')
        ;

        if (PHP_VERSION_ID >= 50600) {
            $V3hf0s3ktsxh->raw("\$Vdyqak55uxqqvarargs__,\n");
        } else {
            $V3hf0s3ktsxh
                ->raw('func_num_args() > ')
                ->repr($Vc2wt4svqann)
                ->raw(' ? array_slice(func_get_args(), ')
                ->repr($Vc2wt4svqann)
                ->raw(") : array(),\n")
            ;
        }

        $V3hf0s3ktsxh
            ->outdent()
            ->write("));\n\n")
            ->write("\$V1vzehiuu4u4 = array();\n\n")
            ->write("ob_start();\n")
            ->write("try {\n")
            ->indent()
            ->subcompile($this->getNode('body'))
            ->outdent()
            ->write("} catch (Exception \$Vawjopoun3xn) {\n")
            ->indent()
            ->write("ob_end_clean();\n\n")
            ->write("throw \$Vawjopoun3xn;\n")
            ->outdent()
            ->write("}\n\n")
            ->write("return ('' === \$Valdd4n2jtbt = ob_get_clean()) ? '' : new Twig_Markup(\$Valdd4n2jtbt, \$this->env->getCharset());\n")
            ->outdent()
            ->write("}\n\n")
        ;
    }
}
