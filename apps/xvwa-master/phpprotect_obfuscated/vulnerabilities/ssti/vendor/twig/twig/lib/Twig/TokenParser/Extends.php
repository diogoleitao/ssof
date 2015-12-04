<?php




class Twig_TokenParser_Extends extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        if (!$this->parser->isMainScope()) {
            throw new Twig_Error_Syntax('Cannot extend from a block', $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
        }

        if (null !== $this->parser->getParent()) {
            throw new Twig_Error_Syntax('Multiple extends tags are forbidden', $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
        }
        $this->parser->setParent($this->parser->getExpressionParser()->parseExpression());

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
    }

    
    public function getTag()
    {
        return 'extends';
    }
}
