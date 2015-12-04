<?php




class Twig_Node_Include extends Twig_Node implements Twig_NodeOutputInterface
{
    public function __construct(Twig_Node_Expression $Vj4whpw1etp0, Twig_Node_Expression $Vr1c5jdzi5wv = null, $Vtlo4miho3gk = false, $Vkrwmnhjdykz = false, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(array('expr' => $Vj4whpw1etp0, 'variables' => $Vr1c5jdzi5wv), array('only' => (bool) $Vtlo4miho3gk, 'ignore_missing' => (bool) $Vkrwmnhjdykz), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->addDebugInfo($this);

        if ($this->getAttribute('ignore_missing')) {
            $V3hf0s3ktsxh
                ->write("try {\n")
                ->indent()
            ;
        }

        $this->addGetTemplate($V3hf0s3ktsxh);

        $V3hf0s3ktsxh->raw('->display(');

        $this->addTemplateArguments($V3hf0s3ktsxh);

        $V3hf0s3ktsxh->raw(");\n");

        if ($this->getAttribute('ignore_missing')) {
            $V3hf0s3ktsxh
                ->outdent()
                ->write("} catch (Twig_Error_Loader \$Vawjopoun3xn) {\n")
                ->indent()
                ->write("// ignore missing template\n")
                ->outdent()
                ->write("}\n\n")
            ;
        }
    }

    protected function addGetTemplate(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
             ->write('$this->loadTemplate(')
             ->subcompile($this->getNode('expr'))
             ->raw(', ')
             ->repr($V3hf0s3ktsxh->getFilename())
             ->raw(', ')
             ->repr($this->getLine())
             ->raw(')')
         ;
    }

    protected function addTemplateArguments(Twig_Compiler $V3hf0s3ktsxh)
    {
        if (null === $this->getNode('variables')) {
            $V3hf0s3ktsxh->raw(false === $this->getAttribute('only') ? '$Vhmvn2c55ghv' : 'array()');
        } elseif (false === $this->getAttribute('only')) {
            $V3hf0s3ktsxh
                ->raw('array_merge($Vhmvn2c55ghv, ')
                ->subcompile($this->getNode('variables'))
                ->raw(')')
            ;
        } else {
            $V3hf0s3ktsxh->subcompile($this->getNode('variables'));
        }
    }
}
