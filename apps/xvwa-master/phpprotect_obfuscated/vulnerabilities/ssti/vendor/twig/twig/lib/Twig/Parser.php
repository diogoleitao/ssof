<?php




class Twig_Parser implements Twig_ParserInterface
{
    protected $V425vvjtkpvr = array();
    protected $Vxzcqmu3jtlz;
    protected $Vvlgul2pgukx;
    protected $V4piuwz55asd;
    protected $Vwhrpr43obxe;
    protected $Vnlxzcsmjjs0;
    protected $V1vzehiuu4u4;
    protected $Vdlqdmm4eaxd;
    protected $Vsitxihtbnfd;
    protected $Vx44ywczaw14;
    protected $V3rztnj0xzwp;
    protected $Vp2uf3jybvt4;
    protected $Vm3zysopwo4g;
    protected $Vjj2s2zrtoyd = array();

    
    public function __construct(Twig_Environment $Vx44ywczaw14)
    {
        $this->env = $Vx44ywczaw14;
    }

    public function getEnvironment()
    {
        return $this->env;
    }

    public function getVarName()
    {
        return sprintf('__internal_%s', hash('sha256', uniqid(mt_rand(), true), false));
    }

    public function getFilename()
    {
        return $this->stream->getFilename();
    }

    
    public function parse(Twig_TokenStream $Vxzcqmu3jtlz, $Vaks55ym420e = null, $Vpgszr5cdanr = false)
    {
        
        $Vbjmvcb1ypn3 = get_object_vars($this);
        unset($Vbjmvcb1ypn3['stack'], $Vbjmvcb1ypn3['env'], $Vbjmvcb1ypn3['handlers'], $Vbjmvcb1ypn3['visitors'], $Vbjmvcb1ypn3['expressionParser']);
        $this->stack[] = $Vbjmvcb1ypn3;

        
        if (null === $this->handlers) {
            $this->handlers = $this->env->getTokenParsers();
            $this->handlers->setParser($this);
        }

        
        if (null === $this->visitors) {
            $this->visitors = $this->env->getNodeVisitors();
        }

        if (null === $this->expressionParser) {
            $this->expressionParser = new Twig_ExpressionParser($this, $this->env->getUnaryOperators(), $this->env->getBinaryOperators());
        }

        $this->stream = $Vxzcqmu3jtlz;
        $this->parent = null;
        $this->blocks = array();
        $this->macros = array();
        $this->traits = array();
        $this->blockStack = array();
        $this->importedSymbols = array(array());
        $this->embeddedTemplates = array();

        try {
            $Vc5owkzetmkg = $this->subparse($Vaks55ym420e, $Vpgszr5cdanr);

            if (null !== $this->parent) {
                if (null === $Vc5owkzetmkg = $this->filterBodyNodes($Vc5owkzetmkg)) {
                    $Vc5owkzetmkg = new Twig_Node();
                }
            }
        } catch (Twig_Error_Syntax $Vawjopoun3xn) {
            if (!$Vawjopoun3xn->getTemplateFile()) {
                $Vawjopoun3xn->setTemplateFile($this->getFilename());
            }

            if (!$Vawjopoun3xn->getTemplateLine()) {
                $Vawjopoun3xn->setTemplateLine($this->stream->getCurrent()->getLine());
            }

            throw $Vawjopoun3xn;
        }

        $Vz3fbiqci0vl = new Twig_Node_Module(new Twig_Node_Body(array($Vc5owkzetmkg)), $this->parent, new Twig_Node($this->blocks), new Twig_Node($this->macros), new Twig_Node($this->traits), $this->embeddedTemplates, $this->getFilename());

        $Vnwzq3pmlwlm = new Twig_NodeTraverser($this->env, $this->visitors);

        $Vz3fbiqci0vl = $Vnwzq3pmlwlm->traverse($Vz3fbiqci0vl);

        
        foreach (array_pop($this->stack) as $Vks5xpccznyi => $Vrztr1e5nak4) {
            $this->$Vks5xpccznyi = $Vrztr1e5nak4;
        }

        return $Vz3fbiqci0vl;
    }

    public function subparse($Vaks55ym420e, $Vpgszr5cdanr = false)
    {
        $Vy5krvyy5dgq = $this->getCurrentToken()->getLine();
        $Vcpiz4akqaht = array();
        while (!$this->stream->isEOF()) {
            switch ($this->getCurrentToken()->getType()) {
                case Twig_Token::TEXT_TYPE:
                    $Vchzzgk3uvsq = $this->stream->next();
                    $Vcpiz4akqaht[] = new Twig_Node_Text($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
                    break;

                case Twig_Token::VAR_START_TYPE:
                    $Vchzzgk3uvsq = $this->stream->next();
                    $Vawjopoun3xnxpr = $this->expressionParser->parseExpression();
                    $this->stream->expect(Twig_Token::VAR_END_TYPE);
                    $Vcpiz4akqaht[] = new Twig_Node_Print($Vawjopoun3xnxpr, $Vchzzgk3uvsq->getLine());
                    break;

                case Twig_Token::BLOCK_START_TYPE:
                    $this->stream->next();
                    $Vchzzgk3uvsq = $this->getCurrentToken();

                    if ($Vchzzgk3uvsq->getType() !== Twig_Token::NAME_TYPE) {
                        throw new Twig_Error_Syntax('A block must start with a tag name', $Vchzzgk3uvsq->getLine(), $this->getFilename());
                    }

                    if (null !== $Vaks55ym420e && call_user_func($Vaks55ym420e, $Vchzzgk3uvsq)) {
                        if ($Vpgszr5cdanr) {
                            $this->stream->next();
                        }

                        if (1 === count($Vcpiz4akqaht)) {
                            return $Vcpiz4akqaht[0];
                        }

                        return new Twig_Node($Vcpiz4akqaht, array(), $Vy5krvyy5dgq);
                    }

                    $V50rixl3rfg1 = $this->handlers->getTokenParser($Vchzzgk3uvsq->getValue());
                    if (null === $V50rixl3rfg1) {
                        if (null !== $Vaks55ym420e) {
                            $Vawjopoun3xnrror = sprintf('Unexpected tag name "%s"', $Vchzzgk3uvsq->getValue());
                            if (is_array($Vaks55ym420e) && isset($Vaks55ym420e[0]) && $Vaks55ym420e[0] instanceof Twig_TokenParserInterface) {
                                $Vawjopoun3xnrror .= sprintf(' (expecting closing tag for the "%s" tag defined near line %s)', $Vaks55ym420e[0]->getTag(), $Vy5krvyy5dgq);
                            }

                            throw new Twig_Error_Syntax($Vawjopoun3xnrror, $Vchzzgk3uvsq->getLine(), $this->getFilename());
                        }

                        $Vnpz33gb3cxs = sprintf('Unknown tag name "%s"', $Vchzzgk3uvsq->getValue());
                        if ($Veawdoi2oak4 = $this->env->computeAlternatives($Vchzzgk3uvsq->getValue(), array_keys($this->env->getTags()))) {
                            $Vnpz33gb3cxs = sprintf('%s. Did you mean "%s"', $Vnpz33gb3cxs, implode('", "', $Veawdoi2oak4));
                        }

                        throw new Twig_Error_Syntax($Vnpz33gb3cxs, $Vchzzgk3uvsq->getLine(), $this->getFilename());
                    }

                    $this->stream->next();

                    $Vz3fbiqci0vl = $V50rixl3rfg1->parse($Vchzzgk3uvsq);
                    if (null !== $Vz3fbiqci0vl) {
                        $Vcpiz4akqaht[] = $Vz3fbiqci0vl;
                    }
                    break;

                default:
                    throw new Twig_Error_Syntax('Lexer or parser ended up in unsupported state.', 0, $this->getFilename());
            }
        }

        if (1 === count($Vcpiz4akqaht)) {
            return $Vcpiz4akqaht[0];
        }

        return new Twig_Node($Vcpiz4akqaht, array(), $Vy5krvyy5dgq);
    }

    public function addHandler($Vkkm4e2vaxrv, $Vnwpwvxwn3wh)
    {
        $this->handlers[$Vkkm4e2vaxrv] = $Vnwpwvxwn3wh;
    }

    public function addNodeVisitor(Twig_NodeVisitorInterface $Vy4jojjdmqtp)
    {
        $this->visitors[] = $Vy4jojjdmqtp;
    }

    public function getBlockStack()
    {
        return $this->blockStack;
    }

    public function peekBlockStack()
    {
        return $this->blockStack[count($this->blockStack) - 1];
    }

    public function popBlockStack()
    {
        array_pop($this->blockStack);
    }

    public function pushBlockStack($Vkkm4e2vaxrv)
    {
        $this->blockStack[] = $Vkkm4e2vaxrv;
    }

    public function hasBlock($Vkkm4e2vaxrv)
    {
        return isset($this->blocks[$Vkkm4e2vaxrv]);
    }

    public function getBlock($Vkkm4e2vaxrv)
    {
        return $this->blocks[$Vkkm4e2vaxrv];
    }

    public function setBlock($Vkkm4e2vaxrv, Twig_Node_Block $Vrztr1e5nak4ue)
    {
        $this->blocks[$Vkkm4e2vaxrv] = new Twig_Node_Body(array($Vrztr1e5nak4ue), array(), $Vrztr1e5nak4ue->getLine());
    }

    public function hasMacro($Vkkm4e2vaxrv)
    {
        return isset($this->macros[$Vkkm4e2vaxrv]);
    }

    public function setMacro($Vkkm4e2vaxrv, Twig_Node_Macro $Vz3fbiqci0vl)
    {
        if (null === $this->reservedMacroNames) {
            $this->reservedMacroNames = array();
            $Vto203c3rzkl = new ReflectionClass($this->env->getBaseTemplateClass());
            foreach ($Vto203c3rzkl->getMethods() as $Vng2lb3h3obx) {
                $this->reservedMacroNames[] = $Vng2lb3h3obx->getName();
            }
        }

        if (in_array($Vkkm4e2vaxrv, $this->reservedMacroNames)) {
            throw new Twig_Error_Syntax(sprintf('"%s" cannot be used as a macro name as it is a reserved keyword', $Vkkm4e2vaxrv), $Vz3fbiqci0vl->getLine(), $this->getFilename());
        }

        $this->macros[$Vkkm4e2vaxrv] = $Vz3fbiqci0vl;
    }

    public function addTrait($Vrr05hjays3s)
    {
        $this->traits[] = $Vrr05hjays3s;
    }

    public function hasTraits()
    {
        return count($this->traits) > 0;
    }

    public function embedTemplate(Twig_Node_Module $V4lif0h4bhru)
    {
        $V4lif0h4bhru->setIndex(mt_rand());

        $this->embeddedTemplates[] = $V4lif0h4bhru;
    }

    public function addImportedSymbol($Vtathfumoxhu, $Vjzquc3lxvlv, $Vkkm4e2vaxrv = null, Twig_Node_Expression $Vz3fbiqci0vl = null)
    {
        $this->importedSymbols[0][$Vtathfumoxhu][$Vjzquc3lxvlv] = array('name' => $Vkkm4e2vaxrv, 'node' => $Vz3fbiqci0vl);
    }

    public function getImportedSymbol($Vtathfumoxhu, $Vjzquc3lxvlv)
    {
        foreach ($this->importedSymbols as $Vakwpkr2roqa) {
            if (isset($Vakwpkr2roqa[$Vtathfumoxhu][$Vjzquc3lxvlv])) {
                return $Vakwpkr2roqa[$Vtathfumoxhu][$Vjzquc3lxvlv];
            }
        }
    }

    public function isMainScope()
    {
        return 1 === count($this->importedSymbols);
    }

    public function pushLocalScope()
    {
        array_unshift($this->importedSymbols, array());
    }

    public function popLocalScope()
    {
        array_shift($this->importedSymbols);
    }

    
    public function getExpressionParser()
    {
        return $this->expressionParser;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($Vvlgul2pgukx)
    {
        $this->parent = $Vvlgul2pgukx;
    }

    
    public function getStream()
    {
        return $this->stream;
    }

    
    public function getCurrentToken()
    {
        return $this->stream->getCurrent();
    }

    protected function filterBodyNodes(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        
        if (
            ($Vz3fbiqci0vl instanceof Twig_Node_Text && !ctype_space($Vz3fbiqci0vl->getAttribute('data')))
            ||
            (!$Vz3fbiqci0vl instanceof Twig_Node_Text && !$Vz3fbiqci0vl instanceof Twig_Node_BlockReference && $Vz3fbiqci0vl instanceof Twig_NodeOutputInterface)
        ) {
            if (false !== strpos((string) $Vz3fbiqci0vl, chr(0xEF).chr(0xBB).chr(0xBF))) {
                throw new Twig_Error_Syntax('A template that extends another one cannot have a body but a byte order mark (BOM) has been detected; it must be removed.', $Vz3fbiqci0vl->getLine(), $this->getFilename());
            }

            throw new Twig_Error_Syntax('A template that extends another one cannot have a body.', $Vz3fbiqci0vl->getLine(), $this->getFilename());
        }

        
        if ($Vz3fbiqci0vl instanceof Twig_Node_Set) {
            return $Vz3fbiqci0vl;
        }

        if ($Vz3fbiqci0vl instanceof Twig_NodeOutputInterface) {
            return;
        }

        foreach ($Vz3fbiqci0vl as $Vxciknv0z5xi => $Vfuw514z1wy1) {
            if (null !== $Vfuw514z1wy1 && null === $this->filterBodyNodes($Vfuw514z1wy1)) {
                $Vz3fbiqci0vl->removeNode($Vxciknv0z5xi);
            }
        }

        return $Vz3fbiqci0vl;
    }
}
