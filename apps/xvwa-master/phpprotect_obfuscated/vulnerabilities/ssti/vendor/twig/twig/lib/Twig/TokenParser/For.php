<?php




class Twig_TokenParser_For extends Twig_TokenParser
{
    
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $Vy5krvyy5dgq = $Vchzzgk3uvsq->getLine();
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vmrcb4dwpeux = $this->parser->getExpressionParser()->parseAssignmentExpression();
        $Vxzcqmu3jtlz->expect(Twig_Token::OPERATOR_TYPE, 'in');
        $Vngl2xdldp0y = $this->parser->getExpressionParser()->parseExpression();

        $Vsp4nllgbxbn = null;
        if ($Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE, 'if')) {
            $Vsp4nllgbxbn = $this->parser->getExpressionParser()->parseExpression();
        }

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
        $Vc5owkzetmkg = $this->parser->subparse(array($this, 'decideForFork'));
        if ($Vxzcqmu3jtlz->next()->getValue() == 'else') {
            $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
            $Vjut20h40opi = $this->parser->subparse(array($this, 'decideForEnd'), true);
        } else {
            $Vjut20h40opi = null;
        }
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);

        if (count($Vmrcb4dwpeux) > 1) {
            $Vknwqh0mapks = $Vmrcb4dwpeux->getNode(0);
            $Vknwqh0mapks = new Twig_Node_Expression_AssignName($Vknwqh0mapks->getAttribute('name'), $Vknwqh0mapks->getLine());
            $Vr3fkhakslod = $Vmrcb4dwpeux->getNode(1);
            $Vr3fkhakslod = new Twig_Node_Expression_AssignName($Vr3fkhakslod->getAttribute('name'), $Vr3fkhakslod->getLine());
        } else {
            $Vknwqh0mapks = new Twig_Node_Expression_AssignName('_key', $Vy5krvyy5dgq);
            $Vr3fkhakslod = $Vmrcb4dwpeux->getNode(0);
            $Vr3fkhakslod = new Twig_Node_Expression_AssignName($Vr3fkhakslod->getAttribute('name'), $Vr3fkhakslod->getLine());
        }

        if ($Vsp4nllgbxbn) {
            $this->checkLoopUsageCondition($Vxzcqmu3jtlz, $Vsp4nllgbxbn);
            $this->checkLoopUsageBody($Vxzcqmu3jtlz, $Vc5owkzetmkg);
        }

        return new Twig_Node_For($Vknwqh0mapks, $Vr3fkhakslod, $Vngl2xdldp0y, $Vsp4nllgbxbn, $Vc5owkzetmkg, $Vjut20h40opi, $Vy5krvyy5dgq, $this->getTag());
    }

    public function decideForFork(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test(array('else', 'endfor'));
    }

    public function decideForEnd(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test('endfor');
    }

    
    protected function checkLoopUsageCondition(Twig_TokenStream $Vxzcqmu3jtlz, Twig_NodeInterface $Vz3fbiqci0vl)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr && $Vz3fbiqci0vl->getNode('node') instanceof Twig_Node_Expression_Name && 'loop' == $Vz3fbiqci0vl->getNode('node')->getAttribute('name')) {
            throw new Twig_Error_Syntax('The "loop" variable cannot be used in a looping condition', $Vz3fbiqci0vl->getLine(), $Vxzcqmu3jtlz->getFilename());
        }

        foreach ($Vz3fbiqci0vl as $Vfuw514z1wy1) {
            if (!$Vfuw514z1wy1) {
                continue;
            }

            $this->checkLoopUsageCondition($Vxzcqmu3jtlz, $Vfuw514z1wy1);
        }
    }

    
    
    protected function checkLoopUsageBody(Twig_TokenStream $Vxzcqmu3jtlz, Twig_NodeInterface $Vz3fbiqci0vl)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr && $Vz3fbiqci0vl->getNode('node') instanceof Twig_Node_Expression_Name && 'loop' == $Vz3fbiqci0vl->getNode('node')->getAttribute('name')) {
            $Vmjdwhnseos2 = $Vz3fbiqci0vl->getNode('attribute');
            if ($Vmjdwhnseos2 instanceof Twig_Node_Expression_Constant && in_array($Vmjdwhnseos2->getAttribute('value'), array('length', 'revindex0', 'revindex', 'last'))) {
                throw new Twig_Error_Syntax(sprintf('The "loop.%s" variable is not defined when looping with a condition', $Vmjdwhnseos2->getAttribute('value')), $Vz3fbiqci0vl->getLine(), $Vxzcqmu3jtlz->getFilename());
            }
        }

        
        if ($Vz3fbiqci0vl instanceof Twig_Node_For) {
            return;
        }

        foreach ($Vz3fbiqci0vl as $Vfuw514z1wy1) {
            if (!$Vfuw514z1wy1) {
                continue;
            }

            $this->checkLoopUsageBody($Vxzcqmu3jtlz, $Vfuw514z1wy1);
        }
    }

    
    public function getTag()
    {
        return 'for';
    }
}
