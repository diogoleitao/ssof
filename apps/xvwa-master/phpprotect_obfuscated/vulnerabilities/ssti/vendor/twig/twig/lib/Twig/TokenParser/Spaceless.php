<?php




class Twig_TokenParser_Spaceless extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideSpacelessEnd'), true);
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Spaceless($Vc5owkzetmkg, $Vy5krvyy5dgq, $this->getTag());
    }

    public function decideSpacelessEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endspaceless');
    }

    
    public function getTag()
    {
        return 'spaceless';
    }
}
