<?php


class Twig_Node_Expression_GetAttr extends Twig_Node_Expression
{
    public function __construct(Twig_Node_Expression $Vz3fbiqci0vl, Twig_Node_Expression $Vmjdwhnseos2, Twig_Node_Expression $V02jggtj2kdh = null, $Vtathfumoxhu, $Vy5krvyy5dgq)
    {
        parent::__construct(array('node' => $Vz3fbiqci0vl, 'attribute' => $Vmjdwhnseos2, 'arguments' => $V02jggtj2kdh), array('type' => $Vtathfumoxhu, 'is_defined_test' => false, 'ignore_strict_check' => false, 'disable_c_ext' => false), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        if (function_exists('twig_template_get_attributes') && !$this->getAttribute('disable_c_ext')) {
            $V3hf0s3ktsxh->raw('twig_template_get_attributes($this, ');
        } else {
            $V3hf0s3ktsxh->raw('$this->getAttribute(');
        }

        if ($this->getAttribute('ignore_strict_check')) {
            $this->getNode('node')->setAttribute('ignore_strict_check', true);
        }

        $V3hf0s3ktsxh->subcompile($this->getNode('node'));

        $V3hf0s3ktsxh->raw(', ')->subcompile($this->getNode('attribute'));

        
        $Vojd0zikmfp5 = $this->getAttribute('ignore_strict_check');
        $V2kigdrjmdss = $Vojd0zikmfp5 || $this->getAttribute('is_defined_test');
        $Vyw5abtlij21 = $V2kigdrjmdss || Twig_Template::ANY_CALL !== $this->getAttribute('type');
        $V4wtvoviecwc = $Vyw5abtlij21 || null !== $this->getNode('arguments');

        if ($V4wtvoviecwc) {
            if (null !== $this->getNode('arguments')) {
                $V3hf0s3ktsxh->raw(', ')->subcompile($this->getNode('arguments'));
            } else {
                $V3hf0s3ktsxh->raw(', array()');
            }
        }

        if ($Vyw5abtlij21) {
            $V3hf0s3ktsxh->raw(', ')->repr($this->getAttribute('type'));
        }

        if ($V2kigdrjmdss) {
            $V3hf0s3ktsxh->raw(', ')->repr($this->getAttribute('is_defined_test'));
        }

        if ($Vojd0zikmfp5) {
            $V3hf0s3ktsxh->raw(', ')->repr($this->getAttribute('ignore_strict_check'));
        }

        $V3hf0s3ktsxh->raw(')');
    }
}
