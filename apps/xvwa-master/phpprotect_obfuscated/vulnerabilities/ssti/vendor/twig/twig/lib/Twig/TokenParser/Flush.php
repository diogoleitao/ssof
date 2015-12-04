<?php




class Twig_TokenParser_Flush extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Flush($Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    
    public function getTag()
    {
        return 'flush';
    }
}
