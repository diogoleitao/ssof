<?php




class Twig_Lexer implements Twig_LexerInterface
{
    protected $Vnzh5r33esb0;
    protected $Vyh1owkfi1pm;
    protected $Vnnangamrvnm;
    protected $Vy5krvyy5dgq;
    protected $Vl1bb13d5p2x;
    protected $Vu43x3anr0dt;
    protected $Vu43x3anr0dts;
    protected $Vezliq44t5kd;
    protected $Vx44ywczaw14;
    protected $V2npxty0bmys;
    protected $Vbo43qqknf4i;
    protected $Voww1nky3epa;
    protected $Vprk44ft0spf;
    protected $Vprk44ft0spfs;
    protected $V0cwgsaddyxe;

    const STATE_DATA = 0;
    const STATE_BLOCK = 1;
    const STATE_VAR = 2;
    const STATE_STRING = 3;
    const STATE_INTERPOLATION = 4;

    const REGEX_NAME = '/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/A';
    const REGEX_NUMBER = '/[0-9]+(?:\.[0-9]+)?/A';
    const REGEX_STRING = '/"([^#"\\\\]*(?:\\\\.[^#"\\\\]*)*)"|\'([^\'\\\\]*(?:\\\\.[^\'\\\\]*)*)\'/As';
    const REGEX_DQ_STRING_DELIM = '/"/A';
    const REGEX_DQ_STRING_PART = '/[^#"\\\\]*(?:(?:\\\\.|#(?!\{))[^#"\\\\]*)*/As';
    const PUNCTUATION = '()[]{}?:.,|';

    public function __construct(Twig_Environment $Vx44ywczaw14, array $Vbo43qqknf4i = array())
    {
        $this->env = $Vx44ywczaw14;

        $this->options = array_merge(array(
            'tag_comment' => array('{#', '#}'),
            'tag_block' => array('{%', '%}'),
            'tag_variable' => array('{{', '}}'),
            'whitespace_trim' => '-',
            'interpolation' => array('#{', '}'),
        ), $Vbo43qqknf4i);

        $this->regexes = array(
            'lex_var' => '/\s*'.preg_quote($this->options['whitespace_trim'].$this->options['tag_variable'][1], '/').'\s*|\s*'.preg_quote($this->options['tag_variable'][1], '/').'/A',
            'lex_block' => '/\s*(?:'.preg_quote($this->options['whitespace_trim'].$this->options['tag_block'][1], '/').'\s*|\s*'.preg_quote($this->options['tag_block'][1], '/').')\n?/A',
            'lex_raw_data' => '/('.preg_quote($this->options['tag_block'][0].$this->options['whitespace_trim'], '/').'|'.preg_quote($this->options['tag_block'][0], '/').')\s*(?:end%s)\s*(?:'.preg_quote($this->options['whitespace_trim'].$this->options['tag_block'][1], '/').'\s*|\s*'.preg_quote($this->options['tag_block'][1], '/').')/s',
            'operator' => $this->getOperatorRegex(),
            'lex_comment' => '/(?:'.preg_quote($this->options['whitespace_trim'], '/').preg_quote($this->options['tag_comment'][1], '/').'\s*|'.preg_quote($this->options['tag_comment'][1], '/').')\n?/s',
            'lex_block_raw' => '/\s*(raw|verbatim)\s*(?:'.preg_quote($this->options['whitespace_trim'].$this->options['tag_block'][1], '/').'\s*|\s*'.preg_quote($this->options['tag_block'][1], '/').')/As',
            'lex_block_line' => '/\s*line\s+(\d+)\s*'.preg_quote($this->options['tag_block'][1], '/').'/As',
            'lex_tokens_start' => '/('.preg_quote($this->options['tag_variable'][0], '/').'|'.preg_quote($this->options['tag_block'][0], '/').'|'.preg_quote($this->options['tag_comment'][0], '/').')('.preg_quote($this->options['whitespace_trim'], '/').')?/s',
            'interpolation_start' => '/'.preg_quote($this->options['interpolation'][0], '/').'\s*/A',
            'interpolation_end' => '/\s*'.preg_quote($this->options['interpolation'][1], '/').'/A',
        );
    }

    
    public function tokenize($Vyh1owkfi1pm, $V2npxty0bmys = null)
    {
        if (function_exists('mb_internal_encoding') && ((int) ini_get('mbstring.func_overload')) & 2) {
            $Vl3zmzcuuvic = mb_internal_encoding();
            mb_internal_encoding('ASCII');
        } else {
            $Vl3zmzcuuvic = null;
        }

        $this->code = str_replace(array("\r\n", "\r"), "\n", $Vyh1owkfi1pm);
        $this->filename = $V2npxty0bmys;
        $this->cursor = 0;
        $this->lineno = 1;
        $this->end = strlen($this->code);
        $this->tokens = array();
        $this->state = self::STATE_DATA;
        $this->states = array();
        $this->brackets = array();
        $this->position = -1;

        
        preg_match_all($this->regexes['lex_tokens_start'], $this->code, $Vqzeq4pbgqkr, PREG_OFFSET_CAPTURE);
        $this->positions = $Vqzeq4pbgqkr;

        while ($this->cursor < $this->end) {
            
            
            switch ($this->state) {
                case self::STATE_DATA:
                    $this->lexData();
                    break;

                case self::STATE_BLOCK:
                    $this->lexBlock();
                    break;

                case self::STATE_VAR:
                    $this->lexVar();
                    break;

                case self::STATE_STRING:
                    $this->lexString();
                    break;

                case self::STATE_INTERPOLATION:
                    $this->lexInterpolation();
                    break;
            }
        }

        $this->pushToken(Twig_Token::EOF_TYPE);

        if (!empty($this->brackets)) {
            list($Vnujfbtgjp5a, $Vy5krvyy5dgq) = array_pop($this->brackets);
            throw new Twig_Error_Syntax(sprintf('Unclosed "%s"', $Vnujfbtgjp5a), $Vy5krvyy5dgq, $this->filename);
        }

        if ($Vl3zmzcuuvic) {
            mb_internal_encoding($Vl3zmzcuuvic);
        }

        return new Twig_TokenStream($this->tokens, $this->filename);
    }

    protected function lexData()
    {
        
        if ($this->position == count($this->positions[0]) - 1) {
            $this->pushToken(Twig_Token::TEXT_TYPE, substr($this->code, $this->cursor));
            $this->cursor = $this->end;

            return;
        }

        
        $Vprk44ft0spf = $this->positions[0][++$this->position];
        while ($Vprk44ft0spf[1] < $this->cursor) {
            if ($this->position == count($this->positions[0]) - 1) {
                return;
            }
            $Vprk44ft0spf = $this->positions[0][++$this->position];
        }

        
        $Vw0qo11byuzr = $Vw0qo11byuzrContent = substr($this->code, $this->cursor, $Vprk44ft0spf[1] - $this->cursor);
        if (isset($this->positions[2][$this->position][0])) {
            $Vw0qo11byuzr = rtrim($Vw0qo11byuzr);
        }
        $this->pushToken(Twig_Token::TEXT_TYPE, $Vw0qo11byuzr);
        $this->moveCursor($Vw0qo11byuzrContent.$Vprk44ft0spf[0]);

        switch ($this->positions[1][$this->position][0]) {
            case $this->options['tag_comment'][0]:
                $this->lexComment();
                break;

            case $this->options['tag_block'][0]:
                
                if (preg_match($this->regexes['lex_block_raw'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
                    $this->moveCursor($V2pnuu5quolb[0]);
                    $this->lexRawData($V2pnuu5quolb[1]);
                
                } elseif (preg_match($this->regexes['lex_block_line'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
                    $this->moveCursor($V2pnuu5quolb[0]);
                    $this->lineno = (int) $V2pnuu5quolb[1];
                } else {
                    $this->pushToken(Twig_Token::BLOCK_START_TYPE);
                    $this->pushState(self::STATE_BLOCK);
                    $this->currentVarBlockLine = $this->lineno;
                }
                break;

            case $this->options['tag_variable'][0]:
                $this->pushToken(Twig_Token::VAR_START_TYPE);
                $this->pushState(self::STATE_VAR);
                $this->currentVarBlockLine = $this->lineno;
                break;
        }
    }

    protected function lexBlock()
    {
        if (empty($this->brackets) && preg_match($this->regexes['lex_block'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->pushToken(Twig_Token::BLOCK_END_TYPE);
            $this->moveCursor($V2pnuu5quolb[0]);
            $this->popState();
        } else {
            $this->lexExpression();
        }
    }

    protected function lexVar()
    {
        if (empty($this->brackets) && preg_match($this->regexes['lex_var'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->pushToken(Twig_Token::VAR_END_TYPE);
            $this->moveCursor($V2pnuu5quolb[0]);
            $this->popState();
        } else {
            $this->lexExpression();
        }
    }

    protected function lexExpression()
    {
        
        if (preg_match('/\s+/A', $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->moveCursor($V2pnuu5quolb[0]);

            if ($this->cursor >= $this->end) {
                throw new Twig_Error_Syntax(sprintf('Unclosed "%s"', $this->state === self::STATE_BLOCK ? 'block' : 'variable'), $this->currentVarBlockLine, $this->filename);
            }
        }

        
        if (preg_match($this->regexes['operator'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->pushToken(Twig_Token::OPERATOR_TYPE, preg_replace('/\s+/', ' ', $V2pnuu5quolb[0]));
            $this->moveCursor($V2pnuu5quolb[0]);
        }
        
        elseif (preg_match(self::REGEX_NAME, $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->pushToken(Twig_Token::NAME_TYPE, $V2pnuu5quolb[0]);
            $this->moveCursor($V2pnuu5quolb[0]);
        }
        
        elseif (preg_match(self::REGEX_NUMBER, $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $Vprlrzugvhom = (float) $V2pnuu5quolb[0];  
            if (ctype_digit($V2pnuu5quolb[0]) && $Vprlrzugvhom <= PHP_INT_MAX) {
                $Vprlrzugvhom = (int) $V2pnuu5quolb[0]; 
            }
            $this->pushToken(Twig_Token::NUMBER_TYPE, $Vprlrzugvhom);
            $this->moveCursor($V2pnuu5quolb[0]);
        }
        
        elseif (false !== strpos(self::PUNCTUATION, $this->code[$this->cursor])) {
            
            if (false !== strpos('([{', $this->code[$this->cursor])) {
                $this->brackets[] = array($this->code[$this->cursor], $this->lineno);
            }
            
            elseif (false !== strpos(')]}', $this->code[$this->cursor])) {
                if (empty($this->brackets)) {
                    throw new Twig_Error_Syntax(sprintf('Unexpected "%s"', $this->code[$this->cursor]), $this->lineno, $this->filename);
                }

                list($Vnujfbtgjp5a, $Vy5krvyy5dgq) = array_pop($this->brackets);
                if ($this->code[$this->cursor] != strtr($Vnujfbtgjp5a, '([{', ')]}')) {
                    throw new Twig_Error_Syntax(sprintf('Unclosed "%s"', $Vnujfbtgjp5a), $Vy5krvyy5dgq, $this->filename);
                }
            }

            $this->pushToken(Twig_Token::PUNCTUATION_TYPE, $this->code[$this->cursor]);
            ++$this->cursor;
        }
        
        elseif (preg_match(self::REGEX_STRING, $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->pushToken(Twig_Token::STRING_TYPE, stripcslashes(substr($V2pnuu5quolb[0], 1, -1)));
            $this->moveCursor($V2pnuu5quolb[0]);
        }
        
        elseif (preg_match(self::REGEX_DQ_STRING_DELIM, $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->brackets[] = array('"', $this->lineno);
            $this->pushState(self::STATE_STRING);
            $this->moveCursor($V2pnuu5quolb[0]);
        }
        
        else {
            throw new Twig_Error_Syntax(sprintf('Unexpected character "%s"', $this->code[$this->cursor]), $this->lineno, $this->filename);
        }
    }

    protected function lexRawData($Vyzs3kd551qh)
    {
        if (!preg_match(str_replace('%s', $Vyzs3kd551qh, $this->regexes['lex_raw_data']), $this->code, $V2pnuu5quolb, PREG_OFFSET_CAPTURE, $this->cursor)) {
            throw new Twig_Error_Syntax(sprintf('Unexpected end of file: Unclosed "%s" block', $Vyzs3kd551qh), $this->lineno, $this->filename);
        }

        $Vw0qo11byuzr = substr($this->code, $this->cursor, $V2pnuu5quolb[0][1] - $this->cursor);
        $this->moveCursor($Vw0qo11byuzr.$V2pnuu5quolb[0][0]);

        if (false !== strpos($V2pnuu5quolb[1][0], $this->options['whitespace_trim'])) {
            $Vw0qo11byuzr = rtrim($Vw0qo11byuzr);
        }

        $this->pushToken(Twig_Token::TEXT_TYPE, $Vw0qo11byuzr);
    }

    protected function lexComment()
    {
        if (!preg_match($this->regexes['lex_comment'], $this->code, $V2pnuu5quolb, PREG_OFFSET_CAPTURE, $this->cursor)) {
            throw new Twig_Error_Syntax('Unclosed comment', $this->lineno, $this->filename);
        }

        $this->moveCursor(substr($this->code, $this->cursor, $V2pnuu5quolb[0][1] - $this->cursor).$V2pnuu5quolb[0][0]);
    }

    protected function lexString()
    {
        if (preg_match($this->regexes['interpolation_start'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            $this->brackets[] = array($this->options['interpolation'][0], $this->lineno);
            $this->pushToken(Twig_Token::INTERPOLATION_START_TYPE);
            $this->moveCursor($V2pnuu5quolb[0]);
            $this->pushState(self::STATE_INTERPOLATION);
        } elseif (preg_match(self::REGEX_DQ_STRING_PART, $this->code, $V2pnuu5quolb, null, $this->cursor) && strlen($V2pnuu5quolb[0]) > 0) {
            $this->pushToken(Twig_Token::STRING_TYPE, stripcslashes($V2pnuu5quolb[0]));
            $this->moveCursor($V2pnuu5quolb[0]);
        } elseif (preg_match(self::REGEX_DQ_STRING_DELIM, $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            list($Vnujfbtgjp5a, $Vy5krvyy5dgq) = array_pop($this->brackets);
            if ($this->code[$this->cursor] != '"') {
                throw new Twig_Error_Syntax(sprintf('Unclosed "%s"', $Vnujfbtgjp5a), $Vy5krvyy5dgq, $this->filename);
            }

            $this->popState();
            ++$this->cursor;
        }
    }

    protected function lexInterpolation()
    {
        $Vaqg4ieminqo = end($this->brackets);
        if ($this->options['interpolation'][0] === $Vaqg4ieminqo[0] && preg_match($this->regexes['interpolation_end'], $this->code, $V2pnuu5quolb, null, $this->cursor)) {
            array_pop($this->brackets);
            $this->pushToken(Twig_Token::INTERPOLATION_END_TYPE);
            $this->moveCursor($V2pnuu5quolb[0]);
            $this->popState();
        } else {
            $this->lexExpression();
        }
    }

    protected function pushToken($Vtathfumoxhu, $V2dijfr3ez0f = '')
    {
        
        if (Twig_Token::TEXT_TYPE === $Vtathfumoxhu && '' === $V2dijfr3ez0f) {
            return;
        }

        $this->tokens[] = new Twig_Token($Vtathfumoxhu, $V2dijfr3ez0f, $this->lineno);
    }

    protected function moveCursor($Vw0qo11byuzr)
    {
        $this->cursor += strlen($Vw0qo11byuzr);
        $this->lineno += substr_count($Vw0qo11byuzr, "\n");
    }

    protected function getOperatorRegex()
    {
        $Vqx3pej4qzjv = array_merge(
            array('='),
            array_keys($this->env->getUnaryOperators()),
            array_keys($this->env->getBinaryOperators())
        );

        $Vqx3pej4qzjv = array_combine($Vqx3pej4qzjv, array_map('strlen', $Vqx3pej4qzjv));
        arsort($Vqx3pej4qzjv);

        $Vvenhdzomwgy = array();
        foreach ($Vqx3pej4qzjv as $V0joj0mh5mr5 => $Vac2bf3qhtlh) {
            
            
            if (ctype_alpha($V0joj0mh5mr5[$Vac2bf3qhtlh - 1])) {
                $Vto203c3rzkl = preg_quote($V0joj0mh5mr5, '/').'(?=[\s()])';
            } else {
                $Vto203c3rzkl = preg_quote($V0joj0mh5mr5, '/');
            }

            
            $Vto203c3rzkl = preg_replace('/\s+/', '\s+', $Vto203c3rzkl);

            $Vvenhdzomwgy[] = $Vto203c3rzkl;
        }

        return '/'.implode('|', $Vvenhdzomwgy).'/A';
    }

    protected function pushState($Vu43x3anr0dt)
    {
        $this->states[] = $this->state;
        $this->state = $Vu43x3anr0dt;
    }

    protected function popState()
    {
        if (0 === count($this->states)) {
            throw new Exception('Cannot pop state without a previous state');
        }

        $this->state = array_pop($this->states);
    }
}
