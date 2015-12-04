<?php




class Twig_TokenParser_Use extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $V4lif0h4bhru = $this->parser->getExpressionParser()->parseExpression();
        $Vxzcqmu3jtlz = $this->parser->getStream();

        if (!$V4lif0h4bhru instanceof Twig_Node_Expression_Constant) {
            throw new Twig_Error_Syntax('The template references in a "use" statement must be a string.', $Vxzcqmu3jtlz->getCurrent()->getLine(), $Vxzcqmu3jtlz->getFilename());
        }

        $Vmrcb4dwpeux = array();
        if ($Vxzcqmu3jtlz->nextIf('with')) {
            do {
                $Vkkm4e2vaxrv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();

                $Vjzquc3lxvlv = $Vkkm4e2vaxrv;
                if ($Vxzcqmu3jtlz->nextIf('as')) {
                    $Vjzquc3lxvlv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();
                }

                $Vmrcb4dwpeux[$Vkkm4e2vaxrv] = new Twig_Node_Expression_Constant($Vjzquc3lxvlv, -1);

                if (!$Vxzcqmu3jtlz->nextIf(Twig_Token::PUNCTUATION_TYPE, ',')) {
                    break;
                }
            } while (true);
        }

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        $this->parser->addTrait(new Twig_Node(array('template' => $V4lif0h4bhru, 'targets' => new Twig_Node($Vmrcb4dwpeux))));
    }

    
    public function getTag()
    {
        return 'use';
    }
}
