<?php




class Twig_TokenParser_Import extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vja2lgdp4gkw = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect('as');
        $Vl2x41mifdiq = new Twig_Node_Expression_AssignName($this->parser->getStream()->expect(Twig_Token::NAME_TYPE)->getValue(), $Vchzzgk3uvsq->getLine());
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        $this->parser->addImportedSymbol('template', $Vl2x41mifdiq->getAttribute('name'));

        return new Twig_Node_Import($Vja2lgdp4gkw, $Vl2x41mifdiq, $Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    
    public function getTag()
    {
        return 'import';
    }
}
