<?php




class Twig_TokenParser_Set extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vc5m2qpa3jyp = $this->parser->getExpressionParser()->parseAssignmentExpression();

        $Vi4bpncmuhax = false;
        if ($Vxzcqmu3jtlz->nextIf(Twig_Token::OPERATOR_TYPE, '=')) {
            $Vpek50boolgn = $this->parser->getExpressionParser()->parseMultitargetExpression();

            $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

            if (count($Vc5m2qpa3jyp) !== count($Vpek50boolgn)) {
                throw new Twig_Error_Syntax('When using set, you must have the same number of variables and assignments.', $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
            }
        } else {
            $Vi4bpncmuhax = true;

            if (count($Vc5m2qpa3jyp) > 1) {
                throw new Twig_Error_Syntax('When using set with a block, you cannot have a multi-target.', $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
            }

            $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

            $Vpek50boolgn = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
            $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
        }

        return new Twig_Node_Set($Vi4bpncmuhax, $Vc5m2qpa3jyp, $Vpek50boolgn, $Vy5krvyy5dgq, $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endset');
    }

    
    public function getTag()
    {
        return 'set';
    }
}
