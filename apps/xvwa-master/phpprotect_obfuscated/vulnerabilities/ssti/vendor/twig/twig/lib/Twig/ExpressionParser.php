<?php




class Twig_ExpressionParser
{
    const OPERATOR_LEFT = 1;
    const OPERATOR_RIGHT = 2;

    protected $Vqfx20r3yfax;
    protected $Vampoynxcxwi;
    protected $Vntpr0nsvaxx;

    public function __construct(Twig_Parser $Vqfx20r3yfax, array $Vampoynxcxwi, array $Vntpr0nsvaxx)
    {
        $this->parser = $Vqfx20r3yfax;
        $this->unaryOperators = $Vampoynxcxwi;
        $this->binaryOperators = $Vntpr0nsvaxx;
    }

    public function parseExpression($Vvoji0hnddrh = 0)
    {
        $Vj4whpw1etp0 = $this->getPrimary();
        $Vchzzgk3uvsq = $this->parser->getCurrentToken();
        while ($this->isBinary($Vchzzgk3uvsq) && $this->binaryOperators[$Vchzzgk3uvsq->getValue()]['precedence'] >= $Vvoji0hnddrh) {
            $Vr1m33dghzei = $this->binaryOperators[$Vchzzgk3uvsq->getValue()];
            $this->parser->getStream()->next();

            if (isset($Vr1m33dghzei['callable'])) {
                $Vj4whpw1etp0 = call_user_func($Vr1m33dghzei['callable'], $this->parser, $Vj4whpw1etp0);
            } else {
                $Vj4whpw1etp01 = $this->parseExpression(self::OPERATOR_LEFT === $Vr1m33dghzei['associativity'] ? $Vr1m33dghzei['precedence'] + 1 : $Vr1m33dghzei['precedence']);
                $Vnwpwvxwn3wh = $Vr1m33dghzei['class'];
                $Vj4whpw1etp0 = new $Vnwpwvxwn3wh($Vj4whpw1etp0, $Vj4whpw1etp01, $Vchzzgk3uvsq->getLine());
            }

            $Vchzzgk3uvsq = $this->parser->getCurrentToken();
        }

        if (0 === $Vvoji0hnddrh) {
            return $this->parseConditionalExpression($Vj4whpw1etp0);
        }

        return $Vj4whpw1etp0;
    }

    protected function getPrimary()
    {
        $Vchzzgk3uvsq = $this->parser->getCurrentToken();

        if ($this->isUnary($Vchzzgk3uvsq)) {
            $Vr1m33dghzeierator = $this->unaryOperators[$Vchzzgk3uvsq->getValue()];
            $this->parser->getStream()->next();
            $Vj4whpw1etp0 = $this->parseExpression($Vr1m33dghzeierator['precedence']);
            $Vnwpwvxwn3wh = $Vr1m33dghzeierator['class'];

            return $this->parsePostfixExpression(new $Vnwpwvxwn3wh($Vj4whpw1etp0, $Vchzzgk3uvsq->getLine()));
        } elseif ($Vchzzgk3uvsq->test(Twig_Token::PUNCTUATION_TYPE, '(')) {
            $this->parser->getStream()->next();
            $Vj4whpw1etp0 = $this->parseExpression();
            $this->parser->getStream()->expect(Twig_Token::PUNCTUATION_TYPE, ')', 'An opened parenthesis is not properly closed');

            return $this->parsePostfixExpression($Vj4whpw1etp0);
        }

        return $this->parsePrimaryExpression();
    }

    protected function parseConditionalExpression($Vj4whpw1etp0)
    {
        while ($this->parser->getStream()->nextIf(Twig_Token::PUNCTUATION_TYPE, '?')) {
            if (!$this->parser->getStream()->nextIf(Twig_Token::PUNCTUATION_TYPE, ':')) {
                $Vj4whpw1etp02 = $this->parseExpression();
                if ($this->parser->getStream()->nextIf(Twig_Token::PUNCTUATION_TYPE, ':')) {
                    $Vj4whpw1etp03 = $this->parseExpression();
                } else {
                    $Vj4whpw1etp03 = new Twig_Node_Expression_Constant('', $this->parser->getCurrentToken()->getLine());
                }
            } else {
                $Vj4whpw1etp02 = $Vj4whpw1etp0;
                $Vj4whpw1etp03 = $this->parseExpression();
            }

            $Vj4whpw1etp0 = new Twig_Node_Expression_Conditional($Vj4whpw1etp0, $Vj4whpw1etp02, $Vj4whpw1etp03, $this->parser->getCurrentToken()->getLine());
        }

        return $Vj4whpw1etp0;
    }

    protected function isUnary(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test(Twig_Token::OPERATOR_TYPE) && isset($this->unaryOperators[$Vchzzgk3uvsq->getValue()]);
    }

    protected function isBinary(Twig_Token $Vchzzgk3uvsq)
    {
        return $Vchzzgk3uvsq->test(Twig_Token::OPERATOR_TYPE) && isset($this->binaryOperators[$Vchzzgk3uvsq->getValue()]);
    }

    public function parsePrimaryExpression()
    {
        $Vchzzgk3uvsq = $this->parser->getCurrentToken();
        switch ($Vchzzgk3uvsq->getType()) {
            case Twig_Token::NAME_TYPE:
                $this->parser->getStream()->next();
                switch ($Vchzzgk3uvsq->getValue()) {
                    case 'true':
                    case 'TRUE':
                        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant(true, $Vchzzgk3uvsq->getLine());
                        break;

                    case 'false':
                    case 'FALSE':
                        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant(false, $Vchzzgk3uvsq->getLine());
                        break;

                    case 'none':
                    case 'NONE':
                    case 'null':
                    case 'NULL':
                        $Vz3fbiqci0vl = new Twig_Node_Expression_Constant(null, $Vchzzgk3uvsq->getLine());
                        break;

                    default:
                        if ('(' === $this->parser->getCurrentToken()->getValue()) {
                            $Vz3fbiqci0vl = $this->getFunctionNode($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
                        } else {
                            $Vz3fbiqci0vl = new Twig_Node_Expression_Name($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
                        }
                }
                break;

            case Twig_Token::NUMBER_TYPE:
                $this->parser->getStream()->next();
                $Vz3fbiqci0vl = new Twig_Node_Expression_Constant($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
                break;

            case Twig_Token::STRING_TYPE:
            case Twig_Token::INTERPOLATION_START_TYPE:
                $Vz3fbiqci0vl = $this->parseStringExpression();
                break;

            case Twig_Token::OPERATOR_TYPE:
                if (preg_match(Twig_Lexer::REGEX_NAME, $Vchzzgk3uvsq->getValue(), $Vqzeq4pbgqkr) && $Vqzeq4pbgqkr[0] == $Vchzzgk3uvsq->getValue()) {
                    
                    $this->parser->getStream()->next();
                    $Vz3fbiqci0vl = new Twig_Node_Expression_Name($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
                    break;
                } elseif (isset($this->unaryOperators[$Vchzzgk3uvsq->getValue()])) {
                    $Vnwpwvxwn3wh = $this->unaryOperators[$Vchzzgk3uvsq->getValue()]['class'];

                    $V0p5smomzt5x = new ReflectionClass($Vnwpwvxwn3wh);
                    $V2pvpodwekha = 'Twig_Node_Expression_Unary_Neg';
                    $V2ulh14krlac = 'Twig_Node_Expression_Unary_Pos';
                    if (!(in_array($V0p5smomzt5x->getName(), array($V2pvpodwekha, $V2ulh14krlac)) || $V0p5smomzt5x->isSubclassOf($V2pvpodwekha) || $V0p5smomzt5x->isSubclassOf($V2ulh14krlac))) {
                        throw new Twig_Error_Syntax(sprintf('Unexpected unary operator "%s"', $Vchzzgk3uvsq->getValue()), $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
                    }

                    $this->parser->getStream()->next();
                    $Vj4whpw1etp0 = $this->parsePrimaryExpression();

                    $Vz3fbiqci0vl = new $Vnwpwvxwn3wh($Vj4whpw1etp0, $Vchzzgk3uvsq->getLine());
                    break;
                }

            default:
                if ($Vchzzgk3uvsq->test(Twig_Token::PUNCTUATION_TYPE, '[')) {
                    $Vz3fbiqci0vl = $this->parseArrayExpression();
                } elseif ($Vchzzgk3uvsq->test(Twig_Token::PUNCTUATION_TYPE, '{')) {
                    $Vz3fbiqci0vl = $this->parseHashExpression();
                } else {
                    throw new Twig_Error_Syntax(sprintf('Unexpected token "%s" of value "%s"', Twig_Token::typeToEnglish($Vchzzgk3uvsq->getType()), $Vchzzgk3uvsq->getValue()), $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
                }
        }

        return $this->parsePostfixExpression($Vz3fbiqci0vl);
    }

    public function parseStringExpression()
    {
        $Vxzcqmu3jtlz = $this->parser->getStream();

        $Vz3fbiqci0vls = array();
        
        $Vs4x5fdblcr3 = true;
        while (true) {
            if ($Vs4x5fdblcr3 && $Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::STRING_TYPE)) {
                $Vz3fbiqci0vls[] = new Twig_Node_Expression_Constant($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
                $Vs4x5fdblcr3 = false;
            } elseif ($Vxzcqmu3jtlz->nextIf(Twig_Token::INTERPOLATION_START_TYPE)) {
                $Vz3fbiqci0vls[] = $this->parseExpression();
                $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_END_TYPE);
                $Vs4x5fdblcr3 = true;
            } else {
                break;
            }
        }

        $Vj4whpw1etp0 = array_shift($Vz3fbiqci0vls);
        foreach ($Vz3fbiqci0vls as $Vz3fbiqci0vl) {
            $Vj4whpw1etp0 = new Twig_Node_Expression_Binary_Concat($Vj4whpw1etp0, $Vz3fbiqci0vl, $Vz3fbiqci0vl->getLine());
        }

        return $Vj4whpw1etp0;
    }

    public function parseArrayExpression()
    {
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, '[', 'An array element was expected');

        $Vz3fbiqci0vl = new Twig_Node_Expression_Array(array(), $Vxzcqmu3jtlz->getCurrent()->getLine());
        $Vspubgfk23ku = true;
        while (!$Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, ']')) {
            if (!$Vspubgfk23ku) {
                $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ',', 'An array element must be followed by a comma');

                
                if ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, ']')) {
                    break;
                }
            }
            $Vspubgfk23ku = false;

            $Vz3fbiqci0vl->addElement($this->parseExpression());
        }
        $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ']', 'An opened array is not properly closed');

        return $Vz3fbiqci0vl;
    }

    public function parseHashExpression()
    {
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, '{', 'A hash element was expected');

        $Vz3fbiqci0vl = new Twig_Node_Expression_Array(array(), $Vxzcqmu3jtlz->getCurrent()->getLine());
        $Vspubgfk23ku = true;
        while (!$Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, '}')) {
            if (!$Vspubgfk23ku) {
                $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ',', 'A hash value must be followed by a comma');

                
                if ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, '}')) {
                    break;
                }
            }
            $Vspubgfk23ku = false;

            
            
            
            
            
            
            if (($Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::STRING_TYPE)) || ($Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::NAME_TYPE)) || $Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::NUMBER_TYPE)) {
                $Vks5xpccznyi = new Twig_Node_Expression_Constant($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
            } elseif ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, '(')) {
                $Vks5xpccznyi = $this->parseExpression();
            } else {
                $Vdo02rb24r2q = $Vxzcqmu3jtlz->getCurrent();

                throw new Twig_Error_Syntax(sprintf('A hash key must be a quoted string, a number, a name, or an expression enclosed in parentheses (unexpected token "%s" of value "%s"', Twig_Token::typeToEnglish($Vdo02rb24r2q->getType()), $Vdo02rb24r2q->getValue()), $Vdo02rb24r2q->getLine(), $this->parser->getFilename());
            }

            $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ':', 'A hash key must be followed by a colon (:)');
            $V2dijfr3ez0f = $this->parseExpression();

            $Vz3fbiqci0vl->addElement($V2dijfr3ez0f, $Vks5xpccznyi);
        }
        $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, '}', 'An opened hash is not properly closed');

        return $Vz3fbiqci0vl;
    }

    public function parsePostfixExpression($Vz3fbiqci0vl)
    {
        while (true) {
            $Vchzzgk3uvsq = $this->parser->getCurrentToken();
            if ($Vchzzgk3uvsq->getType() == Twig_Token::PUNCTUATION_TYPE) {
                if ('.' == $Vchzzgk3uvsq->getValue() || '[' == $Vchzzgk3uvsq->getValue()) {
                    $Vz3fbiqci0vl = $this->parseSubscriptExpression($Vz3fbiqci0vl);
                } elseif ('|' == $Vchzzgk3uvsq->getValue()) {
                    $Vz3fbiqci0vl = $this->parseFilterExpression($Vz3fbiqci0vl);
                } else {
                    break;
                }
            } else {
                break;
            }
        }

        return $Vz3fbiqci0vl;
    }

    public function getFunctionNode($Vkkm4e2vaxrv, $V0devhuwbm4i)
    {
        switch ($Vkkm4e2vaxrv) {
            case 'parent':
                $this->parseArguments();
                if (!count($this->parser->getBlockStack())) {
                    throw new Twig_Error_Syntax('Calling "parent" outside a block is forbidden', $V0devhuwbm4i, $this->parser->getFilename());
                }

                if (!$this->parser->getParent() && !$this->parser->hasTraits()) {
                    throw new Twig_Error_Syntax('Calling "parent" on a template that does not extend nor "use" another template is forbidden', $V0devhuwbm4i, $this->parser->getFilename());
                }

                return new Twig_Node_Expression_Parent($this->parser->peekBlockStack(), $V0devhuwbm4i);
            case 'block':
                return new Twig_Node_Expression_BlockReference($this->parseArguments()->getNode(0), false, $V0devhuwbm4i);
            case 'attribute':
                $V4xqqawawaeh = $this->parseArguments();
                if (count($V4xqqawawaeh) < 2) {
                    throw new Twig_Error_Syntax('The "attribute" function takes at least two arguments (the variable and the attributes)', $V0devhuwbm4i, $this->parser->getFilename());
                }

                return new Twig_Node_Expression_GetAttr($V4xqqawawaeh->getNode(0), $V4xqqawawaeh->getNode(1), count($V4xqqawawaeh) > 2 ? $V4xqqawawaeh->getNode(2) : null, Twig_Template::ANY_CALL, $V0devhuwbm4i);
            default:
                if (null !== $Vjzquc3lxvlv = $this->parser->getImportedSymbol('function', $Vkkm4e2vaxrv)) {
                    $V02jggtj2kdh = new Twig_Node_Expression_Array(array(), $V0devhuwbm4i);
                    foreach ($this->parseArguments() as $Vfuw514z1wy1) {
                        $V02jggtj2kdh->addElement($Vfuw514z1wy1);
                    }

                    $Vz3fbiqci0vl = new Twig_Node_Expression_MethodCall($Vjzquc3lxvlv['node'], $Vjzquc3lxvlv['name'], $V02jggtj2kdh, $V0devhuwbm4i);
                    $Vz3fbiqci0vl->setAttribute('safe', true);

                    return $Vz3fbiqci0vl;
                }

                $V4xqqawawaeh = $this->parseArguments(true);
                $Vnwpwvxwn3wh = $this->getFunctionNodeClass($Vkkm4e2vaxrv, $V0devhuwbm4i);

                return new $Vnwpwvxwn3wh($Vkkm4e2vaxrv, $V4xqqawawaeh, $V0devhuwbm4i);
        }
    }

    public function parseSubscriptExpression($Vz3fbiqci0vl)
    {
        $Vxzcqmu3jtlz = $this->parser->getStream();
        $Vchzzgk3uvsq = $Vxzcqmu3jtlz->next();
        $V0devhuwbm4ino = $Vchzzgk3uvsq->getLine();
        $V02jggtj2kdh = new Twig_Node_Expression_Array(array(), $V0devhuwbm4ino);
        $Vtathfumoxhu = Twig_Template::ANY_CALL;
        if ($Vchzzgk3uvsq->getValue() == '.') {
            $Vchzzgk3uvsq = $Vxzcqmu3jtlz->next();
            if (
                $Vchzzgk3uvsq->getType() == Twig_Token::NAME_TYPE
                ||
                $Vchzzgk3uvsq->getType() == Twig_Token::NUMBER_TYPE
                ||
                ($Vchzzgk3uvsq->getType() == Twig_Token::OPERATOR_TYPE && preg_match(Twig_Lexer::REGEX_NAME, $Vchzzgk3uvsq->getValue()))
            ) {
                $Vwc2eazpip14 = new Twig_Node_Expression_Constant($Vchzzgk3uvsq->getValue(), $V0devhuwbm4ino);

                if ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, '(')) {
                    $Vtathfumoxhu = Twig_TemplateInterface::METHOD_CALL;
                    foreach ($this->parseArguments() as $Vfuw514z1wy1) {
                        $V02jggtj2kdh->addElement($Vfuw514z1wy1);
                    }
                }
            } else {
                throw new Twig_Error_Syntax('Expected name or number', $V0devhuwbm4ino, $this->parser->getFilename());
            }

            if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Name && null !== $this->parser->getImportedSymbol('template', $Vz3fbiqci0vl->getAttribute('name'))) {
                if (!$Vwc2eazpip14 instanceof Twig_Node_Expression_Constant) {
                    throw new Twig_Error_Syntax(sprintf('Dynamic macro names are not supported (called on "%s")', $Vz3fbiqci0vl->getAttribute('name')), $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
                }

                $Vz3fbiqci0vl = new Twig_Node_Expression_MethodCall($Vz3fbiqci0vl, 'get'.$Vwc2eazpip14->getAttribute('value'), $V02jggtj2kdh, $V0devhuwbm4ino);
                $Vz3fbiqci0vl->setAttribute('safe', true);

                return $Vz3fbiqci0vl;
            }
        } else {
            $Vtathfumoxhu = Twig_Template::ARRAY_CALL;

            
            $Vbrqetodbn4p = false;
            if ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, ':')) {
                $Vbrqetodbn4p = true;
                $Vwc2eazpip14 = new Twig_Node_Expression_Constant(0, $Vchzzgk3uvsq->getLine());
            } else {
                $Vwc2eazpip14 = $this->parseExpression();
            }

            if ($Vxzcqmu3jtlz->nextIf(Twig_Token::PUNCTUATION_TYPE, ':')) {
                $Vbrqetodbn4p = true;
            }

            if ($Vbrqetodbn4p) {
                if ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, ']')) {
                    $Vac2bf3qhtlh = new Twig_Node_Expression_Constant(null, $Vchzzgk3uvsq->getLine());
                } else {
                    $Vac2bf3qhtlh = $this->parseExpression();
                }

                $Vnwpwvxwn3wh = $this->getFilterNodeClass('slice', $Vchzzgk3uvsq->getLine());
                $V02jggtj2kdh = new Twig_Node(array($Vwc2eazpip14, $Vac2bf3qhtlh));
                $Vntaxllqc33j = new $Vnwpwvxwn3wh($Vz3fbiqci0vl, new Twig_Node_Expression_Constant('slice', $Vchzzgk3uvsq->getLine()), $V02jggtj2kdh, $Vchzzgk3uvsq->getLine());

                $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ']');

                return $Vntaxllqc33j;
            }

            $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ']');
        }

        return new Twig_Node_Expression_GetAttr($Vz3fbiqci0vl, $Vwc2eazpip14, $V02jggtj2kdh, $Vtathfumoxhu, $V0devhuwbm4ino);
    }

    public function parseFilterExpression($Vz3fbiqci0vl)
    {
        $this->parser->getStream()->next();

        return $this->parseFilterExpressionRaw($Vz3fbiqci0vl);
    }

    public function parseFilterExpressionRaw($Vz3fbiqci0vl, $Vyzs3kd551qh = null)
    {
        while (true) {
            $Vchzzgk3uvsq = $this->parser->getStream()->expect(Twig_Token::NAME_TYPE);

            $Vkkm4e2vaxrv = new Twig_Node_Expression_Constant($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());
            if (!$this->parser->getStream()->test(Twig_Token::PUNCTUATION_TYPE, '(')) {
                $V02jggtj2kdh = new Twig_Node();
            } else {
                $V02jggtj2kdh = $this->parseArguments(true);
            }

            $Vnwpwvxwn3wh = $this->getFilterNodeClass($Vkkm4e2vaxrv->getAttribute('value'), $Vchzzgk3uvsq->getLine());

            $Vz3fbiqci0vl = new $Vnwpwvxwn3wh($Vz3fbiqci0vl, $Vkkm4e2vaxrv, $V02jggtj2kdh, $Vchzzgk3uvsq->getLine(), $Vyzs3kd551qh);

            if (!$this->parser->getStream()->test(Twig_Token::PUNCTUATION_TYPE, '|')) {
                break;
            }

            $this->parser->getStream()->next();
        }

        return $Vz3fbiqci0vl;
    }

    
    public function parseArguments($Vkkm4e2vaxrvdArguments = false, $Vp2vvq12metn = false)
    {
        $V4xqqawawaeh = array();
        $Vxzcqmu3jtlz = $this->parser->getStream();

        $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, '(', 'A list of arguments must begin with an opening parenthesis');
        while (!$Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, ')')) {
            if (!empty($V4xqqawawaeh)) {
                $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ',', 'Arguments must be separated by a comma');
            }

            if ($Vp2vvq12metn) {
                $Vchzzgk3uvsq = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE, null, 'An argument must be a name');
                $V2dijfr3ez0f = new Twig_Node_Expression_Name($Vchzzgk3uvsq->getValue(), $this->parser->getCurrentToken()->getLine());
            } else {
                $V2dijfr3ez0f = $this->parseExpression();
            }

            $Vkkm4e2vaxrv = null;
            if ($Vkkm4e2vaxrvdArguments && $Vchzzgk3uvsq = $Vxzcqmu3jtlz->nextIf(Twig_Token::OPERATOR_TYPE, '=')) {
                if (!$V2dijfr3ez0f instanceof Twig_Node_Expression_Name) {
                    throw new Twig_Error_Syntax(sprintf('A parameter name must be a string, "%s" given', get_class($V2dijfr3ez0f)), $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
                }
                $Vkkm4e2vaxrv = $V2dijfr3ez0f->getAttribute('name');

                if ($Vp2vvq12metn) {
                    $V2dijfr3ez0f = $this->parsePrimaryExpression();

                    if (!$this->checkConstantExpression($V2dijfr3ez0f)) {
                        throw new Twig_Error_Syntax(sprintf('A default value for an argument must be a constant (a boolean, a string, a number, or an array).'), $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
                    }
                } else {
                    $V2dijfr3ez0f = $this->parseExpression();
                }
            }

            if ($Vp2vvq12metn) {
                if (null === $Vkkm4e2vaxrv) {
                    $Vkkm4e2vaxrv = $V2dijfr3ez0f->getAttribute('name');
                    $V2dijfr3ez0f = new Twig_Node_Expression_Constant(null, $this->parser->getCurrentToken()->getLine());
                }
                $V4xqqawawaeh[$Vkkm4e2vaxrv] = $V2dijfr3ez0f;
            } else {
                if (null === $Vkkm4e2vaxrv) {
                    $V4xqqawawaeh[] = $V2dijfr3ez0f;
                } else {
                    $V4xqqawawaeh[$Vkkm4e2vaxrv] = $V2dijfr3ez0f;
                }
            }
        }
        $Vxzcqmu3jtlz->expect(Twig_Token::PUNCTUATION_TYPE, ')', 'A list of arguments must be closed by a parenthesis');

        return new Twig_Node($V4xqqawawaeh);
    }

    public function parseAssignmentExpression()
    {
        $Vmrcb4dwpeux = array();
        while (true) {
            $Vchzzgk3uvsq = $this->parser->getStream()->expect(Twig_Token::NAME_TYPE, null, 'Only variables can be assigned to');
            if (in_array($Vchzzgk3uvsq->getValue(), array('true', 'false', 'none'))) {
                throw new Twig_Error_Syntax(sprintf('You cannot assign a value to "%s"', $Vchzzgk3uvsq->getValue()), $Vchzzgk3uvsq->getLine(), $this->parser->getFilename());
            }
            $Vmrcb4dwpeux[] = new Twig_Node_Expression_AssignName($Vchzzgk3uvsq->getValue(), $Vchzzgk3uvsq->getLine());

            if (!$this->parser->getStream()->nextIf(Twig_Token::PUNCTUATION_TYPE, ',')) {
                break;
            }
        }

        return new Twig_Node($Vmrcb4dwpeux);
    }

    public function parseMultitargetExpression()
    {
        $Vmrcb4dwpeux = array();
        while (true) {
            $Vmrcb4dwpeux[] = $this->parseExpression();
            if (!$this->parser->getStream()->nextIf(Twig_Token::PUNCTUATION_TYPE, ',')) {
                break;
            }
        }

        return new Twig_Node($Vmrcb4dwpeux);
    }

    protected function getFunctionNodeClass($Vkkm4e2vaxrv, $V0devhuwbm4i)
    {
        $Vx44ywczaw14 = $this->parser->getEnvironment();

        if (false === $Vpdqyyybdwv1 = $Vx44ywczaw14->getFunction($Vkkm4e2vaxrv)) {
            $Vnpz33gb3cxs = sprintf('The function "%s" does not exist', $Vkkm4e2vaxrv);
            if ($Veawdoi2oak4 = $Vx44ywczaw14->computeAlternatives($Vkkm4e2vaxrv, array_keys($Vx44ywczaw14->getFunctions()))) {
                $Vnpz33gb3cxs = sprintf('%s. Did you mean "%s"', $Vnpz33gb3cxs, implode('", "', $Veawdoi2oak4));
            }

            throw new Twig_Error_Syntax($Vnpz33gb3cxs, $V0devhuwbm4i, $this->parser->getFilename());
        }

        if ($Vpdqyyybdwv1 instanceof Twig_SimpleFunction) {
            return $Vpdqyyybdwv1->getNodeClass();
        }

        return $Vpdqyyybdwv1 instanceof Twig_Function_Node ? $Vpdqyyybdwv1->getClass() : 'Twig_Node_Expression_Function';
    }

    protected function getFilterNodeClass($Vkkm4e2vaxrv, $V0devhuwbm4i)
    {
        $Vx44ywczaw14 = $this->parser->getEnvironment();

        if (false === $Vntaxllqc33j = $Vx44ywczaw14->getFilter($Vkkm4e2vaxrv)) {
            $Vnpz33gb3cxs = sprintf('The filter "%s" does not exist', $Vkkm4e2vaxrv);
            if ($Veawdoi2oak4 = $Vx44ywczaw14->computeAlternatives($Vkkm4e2vaxrv, array_keys($Vx44ywczaw14->getFilters()))) {
                $Vnpz33gb3cxs = sprintf('%s. Did you mean "%s"', $Vnpz33gb3cxs, implode('", "', $Veawdoi2oak4));
            }

            throw new Twig_Error_Syntax($Vnpz33gb3cxs, $V0devhuwbm4i, $this->parser->getFilename());
        }

        if ($Vntaxllqc33j instanceof Twig_SimpleFilter) {
            return $Vntaxllqc33j->getNodeClass();
        }

        return $Vntaxllqc33j instanceof Twig_Filter_Node ? $Vntaxllqc33j->getClass() : 'Twig_Node_Expression_Filter';
    }

    
    protected function checkConstantExpression(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        if (!($Vz3fbiqci0vl instanceof Twig_Node_Expression_Constant || $Vz3fbiqci0vl instanceof Twig_Node_Expression_Array
            || $Vz3fbiqci0vl instanceof Twig_Node_Expression_Unary_Neg || $Vz3fbiqci0vl instanceof Twig_Node_Expression_Unary_Pos
        )) {
            return false;
        }

        foreach ($Vz3fbiqci0vl as $Vfuw514z1wy1) {
            if (!$this->checkConstantExpression($Vfuw514z1wy1)) {
                return false;
            }
        }

        return true;
    }
}
