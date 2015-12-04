<?php




class Twig_TokenParser_Include extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vj4whpw1etp0 = $this->parser->getExpressionParser()->parseExpression();

        list($Vr1c5jdzi5wv, $Vtlo4miho3gk, $Vkrwmnhjdykz) = $this->parseArguments();

        return new Twig_Node_Include($Vj4whpw1etp0, $Vr1c5jdzi5wv, $Vtlo4miho3gk, $Vkrwmnhjdykz, $Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    protected function parseArguments()
    {
        $Vxzcqmu3jtlz = $this->parser->getStream();

        $Vkrwmnhjdykz = false;
        if ($Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE, 'ignore')) {
            $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE, 'missing');

            $Vkrwmnhjdykz = true;
        }

        $Vr1c5jdzi5wv = null;
        if ($Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE, 'with')) {
            $Vr1c5jdzi5wv = $this->parser->getExpressionParser()->parseExpression();
        }

        $Vtlo4miho3gk = false;
        if ($Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE, 'only')) {
            $Vtlo4miho3gk = true;
        }

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        return array($Vr1c5jdzi5wv, $Vtlo4miho3gk, $Vkrwmnhjdykz);
    }

    
    public function getTag()
    {
        return 'include';
    }
}
