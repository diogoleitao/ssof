<?php


class Twig_Node_Expression_Constant extends Twig_Node_Expression
{
    public function __construct($V2dijfr3ez0f, $Vy5krvyy5dgq)
    {
        parent::__construct(array(), array('value' => $V2dijfr3ez0f), $Vy5krvyy5dgq);
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->repr($this->getAttribute('value'));
    }
}
