<?php




class Twig_TokenParser_From extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vja2lgdp4gkw = $this->parser->getExpressionParser()->parseExpression();
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vxzcqmu3jtlz->expect('import');

        $Vmrcb4dwpeux = array();
        do {
            $Vkkm4e2vaxrv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();

            $Vjzquc3lxvlv = $Vkkm4e2vaxrv;
            if ($Vxzcqmu3jtlz->nextIf('as')) {
                $Vjzquc3lxvlv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();
            }

            $Vmrcb4dwpeux[$Vkkm4e2vaxrv] = $Vjzquc3lxvlv;

            if (!$Vxzcqmu3jtlz->nextIf(Twig_Token::PUNCTUATION_TYPE, ',')) {
                break;
            }
        } while (true);

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        $Vz3fbiqci0vl = new Twig_Node_Import($Vja2lgdp4gkw, new Twig_Node_Expression_AssignName($this->parser->getVarName(), $Vchzzgk3uvsq->getLine()), $Vchzzgk3uvsq->getLine(), $this->getTag());

        foreach ($Vmrcb4dwpeux as $Vkkm4e2vaxrv => $Vjzquc3lxvlv) {
            $this->parser->addImportedSymbol('function', $Vjzquc3lxvlv, 'get'.$Vkkm4e2vaxrv, $Vz3fbiqci0vl->getNode('var'));
        }

        return $Vz3fbiqci0vl;
    }

    
    public function getTag()
    {
        return 'from';
    }
}
