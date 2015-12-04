<?php


class Twig_Node_Expression_Array extends Twig_Node_Expression
{
    protected $V5ep0o103ibg;

    public function __construct(array $Vf1izqo4gxss, $Vy5krvyy5dgq)
    {
        parent::__construct($Vf1izqo4gxss, array(), $Vy5krvyy5dgq);

        $this->index = -1;
        foreach ($this->getKeyValuePairs() as $Vsgc4cxcemif) {
            if ($Vsgc4cxcemif['key'] instanceof Twig_Node_Expression_Constant && ctype_digit((string) $Vsgc4cxcemif['key']->getAttribute('value')) && $Vsgc4cxcemif['key']->getAttribute('value') > $this->index) {
                $this->index = $Vsgc4cxcemif['key']->getAttribute('value');
            }
        }
    }

    public function getKeyValuePairs()
    {
        $Vsgc4cxcemifs = array();

        foreach (array_chunk($this->nodes, 2) as $Vsgc4cxcemif) {
            $Vsgc4cxcemifs[] = array(
                'key' => $Vsgc4cxcemif[0],
                'value' => $Vsgc4cxcemif[1],
            );
        }

        return $Vsgc4cxcemifs;
    }

    public function hasElement(Twig_Node_Expression $Vks5xpccznyi)
    {
        foreach ($this->getKeyValuePairs() as $Vsgc4cxcemif) {
            
            
            if ((string) $Vks5xpccznyi == (string) $Vsgc4cxcemif['key']) {
                return true;
            }
        }

        return false;
    }

    public function addElement(Twig_Node_Expression $V2dijfr3ez0f, Twig_Node_Expression $Vks5xpccznyi = null)
    {
        if (null === $Vks5xpccznyi) {
            $Vks5xpccznyi = new Twig_Node_Expression_Constant(++$this->index, $V2dijfr3ez0f->getLine());
        }

        array_push($this->nodes, $Vks5xpccznyi, $V2dijfr3ez0f);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->raw('array(');
        $Vspubgfk23ku = true;
        foreach ($this->getKeyValuePairs() as $Vsgc4cxcemif) {
            if (!$Vspubgfk23ku) {
                $V3hf0s3ktsxh->raw(', ');
            }
            $Vspubgfk23ku = false;

            $V3hf0s3ktsxh
                ->subcompile($Vsgc4cxcemif['key'])
                ->raw(' => ')
                ->subcompile($Vsgc4cxcemif['value'])
            ;
        }
        $V3hf0s3ktsxh->raw(')');
    }
}
