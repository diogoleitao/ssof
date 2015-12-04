<?php




class Twig_Node_Embed extends Twig_Node_Include
{
    
    public function __construct($V2npxty0bmys, $V5ep0o103ibg, Twig_Node_Expression $Vr1c5jdzi5wv = null, $Vtlo4miho3gk = false, $Vkrwmnhjdykz = false, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        parent::__construct(new Twig_Node_Expression_Constant('not_used', $Vy5krvyy5dgq), $Vr1c5jdzi5wv, $Vtlo4miho3gk, $Vkrwmnhjdykz, $Vy5krvyy5dgq, $Vyzs3kd551qh);

        $this->setAttribute('filename', $V2npxty0bmys);
        $this->setAttribute('index', $V5ep0o103ibg);
    }

    protected function addGetTemplate(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write('$this->loadTemplate(')
            ->string($this->getAttribute('filename'))
            ->raw(', ')
            ->repr($V3hf0s3ktsxh->getFilename())
            ->raw(', ')
            ->repr($this->getLine())
            ->raw(', ')
            ->string($this->getAttribute('index'))
            ->raw(')')
        ;
    }
}
