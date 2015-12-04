<?php




class Twig_TokenParser_Sandbox extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        
        if (!$Vc5owkzetmkg instanceof Twig_Node_Include) {
            foreach ($Vc5owkzetmkg as $Vz3fbiqci0vl) {
                if ($Vz3fbiqci0vl instanceof Twig_Node_Text && ctype_space($Vz3fbiqci0vl->getAttribute('data'))) {
                    continue;
                }

                if (!$Vz3fbiqci0vl instanceof Twig_Node_Include) {
                    throw new Twig_Error_Syntax('Only "include" tags are allowed within a "sandbox" section', $Vz3fbiqci0vl->getLine(), $this->parser->getFilename());
                }
            }
        }

        return new Twig_Node_Sandbox($Vc5owkzetmkg, $Vchzzgk3uvsq->getLine(), $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endsandbox');
    }

    
    public function getTag()
    {
        return 'sandbox';
    }
}
