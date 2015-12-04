<?php




class Twig_TokenParser_Filter extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vkkm4e2vaxrv = $this->parser->getVarName();
        $V0p5smomzt5x = new Twig_Node_Expression_BlockReference(new Twig_Node_Expression_Constant($Vkkm4e2vaxrv, $Vchzzgk3uvsq->getLine()), true, $Vchzzgk3uvsq->getLine(), $this->getTag());

        $Vntaxllqc33j = $this->parser->getExpressionParser()->parseFilterExpressionRaw($V0p5smomzt5x, $this->getTag());
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        $Vciczzarwsxx = new Twig_Node_Block($Vkkm4e2vaxrv, $Vc5owkzetmkg, $Vchzzgk3uvsq->getLine());
        $this->parser->setBlock($Vkkm4e2vaxrv, $Vciczzarwsxx);

        return new Twig_Node_Print($Vntaxllqc33j, $Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endfilter');
    }

    
    public function getTag()
    {
        return 'filter';
    }
}
