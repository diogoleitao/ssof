<?php




class Twig_TokenParser_Macro extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vkkm4e2vaxrv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();

        $V02jggtj2kdh = $this->parser->getExpressionParser()->parseArguments(true, true);

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
        $this->parser->pushLocalScope();
        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        if ($Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE)) {
            $V2dijfr3ez0f = $Vchzzgk3uvsq->getValue();

            if ($V2dijfr3ez0f != $Vkkm4e2vaxrv) {
                throw new Twig_Error_Syntax(sprintf('Expected endmacro for macro "%s" (but "%s" given)', $Vkkm4e2vaxrv, $V2dijfr3ez0f), $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
            }
        }
        $this->parser->popLocalScope();
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        $this->parser->setMacro($Vkkm4e2vaxrv, new Twig_Node_Macro($Vkkm4e2vaxrv, new Twig_Node_Body(array($Vc5owkzetmkg)), $V02jggtj2kdh, $Vy5krvyy5dgq, $this->getTag()));
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endmacro');
    }

    
    public function getTag()
    {
        return 'macro';
    }
}
