<?php




class Twig_TokenParser_Do extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vj4whpw1etp0 = $this->parser->getExpressionParser()->parseExpression();

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Do($Vj4whpw1etp0, $Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    
    public function getTag()
    {
        return 'do';
    }
}
