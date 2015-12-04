<?php




class Twig_TokenParser_AutoEscape extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();
        $Vxzcqmu3jtlz = $this->parser->getStream();

        if ($Vxzcqmu3jtlz->test(Twig_Token::BLOCK_END_TYPE)) {
            $V2dijfr3ez0f = 'html';
        } else {
            $Vj4whpw1etp0 = $this->parser->getExpressionParser()->parseExpression();
            if (!$Vj4whpw1etp0 instanceof Twig_Node_Expression_Constant) {
                throw new Twig_Error_Syntax('An escaping strategy must be a string or a Boolean.', $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
            }
            $V2dijfr3ez0f = $Vj4whpw1etp0->getAttribute('value');

            $Vmzm2ky0ve3l = true === $V2dijfr3ez0f || false === $V2dijfr3ez0f;

            if (true === $V2dijfr3ez0f) {
                $V2dijfr3ez0f = 'html';
            }

            if ($Vmzm2ky0ve3l && $Vxzcqmu3jtlz->test(Twig_Token::NAME_TYPE)) {
                if (false === $V2dijfr3ez0f) {
                    throw new Twig_Error_Syntax('Unexpected escaping strategy as you set autoescaping to false.', $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
                }

                $V2dijfr3ez0f = $Vxzcqmu3jtlz->next()->getValue();
            }
        }

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_AutoEscape($V2dijfr3ez0f, $Vc5owkzetmkg, $Vy5krvyy5dgq, $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endautoescape');
    }

    
    public function getTag()
    {
        return 'autoescape';
    }
}
