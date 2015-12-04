<?php




class Twig_TokenParser_Block extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vkkm4e2vaxrv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();
        if ($this->parser->hasBlock($Vkkm4e2vaxrv)) {
            throw new Twig_Error_Syntax(sprintf("The block '$Vkkm4e2vaxrv' has already been defined line %d", $this->parser->getBlock($Vkkm4e2vaxrv)->getLine()), $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
        }
        $this->parser->setBlock($Vkkm4e2vaxrv, $Vciczzarwsxx = new Twig_Node_Block($Vkkm4e2vaxrv, new Twig_Node(array()), $Vy5krvyy5dgq));
        $this->parser->pushLocalScope();
        $this->parser->pushBlockStack($Vkkm4e2vaxrv);

        if ($Vxzcqmu3jtlz->nextIf(Twig_Token::BLOCK_END_TYPE)) {
            $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
            if ($Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE)) {
                $V2dijfr3ez0f = $Vchzzgk3uvsq->getValue();

                if ($V2dijfr3ez0f != $Vkkm4e2vaxrv) {
                    throw new Twig_Error_Syntax(sprintf('Expected endblock for block "%s" (but "%s" given)', $Vkkm4e2vaxrv, $V2dijfr3ez0f), $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
                }
            }
        } else {
            $Vc5owkzetmkg = new Twig_Node(array(
                new Twig_Node_Print($this->parser->getExpressionParser()->parseExpression(), $Vy5krvyy5dgq),
            ));
        }
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        $Vciczzarwsxx->setNode('body', $Vc5owkzetmkg);
        $this->parser->popBlockStack();
        $this->parser->popLocalScope();

        return new Twig_Node_BlockReference($Vkkm4e2vaxrv, $Vy5krvyy5dgq, $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endblock');
    }

    
    public function getTag()
    {
        return 'block';
    }
}
