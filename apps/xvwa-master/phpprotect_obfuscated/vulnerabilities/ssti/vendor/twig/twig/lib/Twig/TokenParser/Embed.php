<?php




class Twig_TokenParser_Embed extends Twig_TokenParser_Include
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vxzcqmu3jtlz = $this->parser->getStream();

        $Vvlgul2pgukx = $this->parser->getExpressionParser()->parseExpression();

        list($Vr1c5jdzi5wv, $Vtlo4miho3gk, $Vkrwmnhjdykz) = $this->parseArguments();

        
        $Vxzcqmu3jtlz->injectTokens(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, '', $Vchzzgk3uvsq->getLine()),
            new Twig_Token(Twig_Token::NAME_TYPE, 'extends', $Vchzzgk3uvsq->getLine()),
            new Twig_Token(Twig_Token::STRING_TYPE, '__parent__', $Vchzzgk3uvsq->getLine()),
            new Twig_Token(Twig_Token::BLOCK_END_TYPE, '', $Vchzzgk3uvsq->getLine()),
        ));

        $Vr0sdgtk204d = $this->parser->parse($Vxzcqmu3jtlz, array($this, 'decideBlockEnd'), true);

        
        $Vr0sdgtk204d->setNode('parent', $Vvlgul2pgukx);

        $this->parser->embedTemplate($Vr0sdgtk204d);

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Embed($Vr0sdgtk204d->getAttribute('filename'), $Vr0sdgtk204d->getAttribute('index'), $Vr1c5jdzi5wv, $Vtlo4miho3gk, $Vkrwmnhjdykz, $Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endembed');
    }

    
    public function getTag()
    {
        return 'embed';
    }
}
