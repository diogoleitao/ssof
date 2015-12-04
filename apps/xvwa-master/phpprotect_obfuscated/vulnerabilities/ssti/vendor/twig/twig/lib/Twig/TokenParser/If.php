<?php




class Twig_TokenParser_If extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();
        $Vj4whpw1etp0 = $this->parser->getExpressionParser()->parseExpression();
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideIfFork'));
        $V512ofmho3mi = array($Vj4whpw1etp0, $Vc5owkzetmkg);
        $Vjut20h40opi = null;

        $Vl1bb13d5p2x = false;
        while (!$Vl1bb13d5p2x) {
            switch ($Vxzcqmu3jtlz->next()->getValue()) {
                case 'else':
                    $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
                    $Vjut20h40opi = $this->parser->subparse(array($this, 'decideIfEnd'));
                    break;

                case 'elseif':
                    $Vj4whpw1etp0 = $this->parser->getExpressionParser()->parseExpression();
                    $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
                    $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideIfFork'));
                    $V512ofmho3mi[] = $Vj4whpw1etp0;
                    $V512ofmho3mi[] = $Vc5owkzetmkg;
                    break;

                case 'endif':
                    $Vl1bb13d5p2x = true;
                    break;

                default:
                    throw new Twig_Error_Syntax(sprintf('Unexpected end of template. Twig was looking for the following tags "else", "elseif", or "endif" to close the "if" block started at line %d)', $Vy5krvyy5dgq), $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
            }
        }

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_If(new Twig_Node($V512ofmho3mi), $Vjut20h40opi, $Vy5krvyy5dgq, $this->getTag());
    }

    public function decideIfFork(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test(array('elseif', 'else', 'endif'));
    }

    public function decideIfEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test(array('endif'));
    }

    
    public function getTag()
    {
        return 'if';
    }
}
