<?php


class Twig_Node_Expression_Binary_StartsWith extends Twig_Node_Expression_Binary
{
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vh3ibowzun00 = $V3hf0s3ktsxh->getVarName();
        $Vz5te4hbfoxv = $V3hf0s3ktsxh->getVarName();
        $V3hf0s3ktsxh
            ->raw(sprintf('(is_string($%s = ', $Vh3ibowzun00))
            ->subcompile($this->getNode('left'))
            ->raw(sprintf(') && is_string($%s = ', $Vz5te4hbfoxv))
            ->subcompile($this->getNode('right'))
            ->raw(sprintf(') && (\'\' === $%2$V5ypjfsh2rju || 0 === strpos($%1$V5ypjfsh2rju, $%2$V5ypjfsh2rju)))', $Vh3ibowzun00, $Vz5te4hbfoxv))
        ;
    }

    public function operator(Twig_Compiler $V3hf0s3ktsxh)
    {
        return $V3hf0s3ktsxh->raw('');
    }
}
