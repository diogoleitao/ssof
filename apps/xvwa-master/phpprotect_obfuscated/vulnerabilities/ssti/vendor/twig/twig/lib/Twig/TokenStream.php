<?php




class Twig_TokenStream
{
    protected $Vnzh5r33esb0;
    protected $Vdo02rb24r2q;
    protected $V2npxty0bmys;

    
    public function __construct(array $Vnzh5r33esb0, $V2npxty0bmys = null)
    {
        $this->tokens = $Vnzh5r33esb0;
        $this->current = 0;
        $this->filename = $V2npxty0bmys;
    }

    
    public function __toString()
    {
        return implode("\n", $this->tokens);
    }

    public function injectTokens(array $Vnzh5r33esb0)
    {
        $this->tokens = array_merge(array_slice($this->tokens, 0, $this->current), $Vnzh5r33esb0, array_slice($this->tokens, $this->current));
    }

    
    public function next()
    {
        if (!isset($this->tokens[++$this->current])) {
            throw new Twig_Error_Syntax('Unexpected end of template', $this->tokens[$this->current - 1]->getLine(), $this->filename);
        }

        return $this->tokens[$this->current - 1];
    }

    
    public function nextIf($Vkgqc20oj5ic, $Vljhos1hcuqp = null)
    {
        if ($this->tokens[$this->current]->test($Vkgqc20oj5ic, $Vljhos1hcuqp)) {
            return $this->next();
        }
    }

    
    public function expect($Vtathfumoxhu, $V2dijfr3ez0f = null, $Vnpz33gb3cxs = null)
    {
        $Vchzzgk3uvsq = $this->tokens[$this->current];
        if (!$Vchzzgk3uvsq->test($Vtathfumoxhu, $V2dijfr3ez0f)) {
            $V0devhuwbm4i = $Vchzzgk3uvsq->getLine();
            throw new Twig_Error_Syntax(sprintf('%sUnexpected token "%s" of value "%s" ("%s" expected%s)',
                $Vnpz33gb3cxs ? $Vnpz33gb3cxs.'. ' : '',
                Twig_Token::typeToEnglish($Vchzzgk3uvsq->getType()), $Vchzzgk3uvsq->getValue(),
                Twig_Token::typeToEnglish($Vtathfumoxhu), $V2dijfr3ez0f ? sprintf(' with value "%s"', $V2dijfr3ez0f) : ''),
                $V0devhuwbm4i,
                $this->filename
            );
        }
        $this->next();

        return $Vchzzgk3uvsq;
    }

    
    public function look($Vprlrzugvhom = 1)
    {
        if (!isset($this->tokens[$this->current + $Vprlrzugvhom])) {
            throw new Twig_Error_Syntax('Unexpected end of template', $this->tokens[$this->current + $Vprlrzugvhom - 1]->getLine(), $this->filename);
        }

        return $this->tokens[$this->current + $Vprlrzugvhom];
    }

    
    public function test($Vkgqc20oj5ic, $Vljhos1hcuqp = null)
    {
        return $this->tokens[$this->current]->test($Vkgqc20oj5ic, $Vljhos1hcuqp);
    }

    
    public function isEOF()
    {
        return $this->tokens[$this->current]->getType() === Twig_Token::EOF_TYPE;
    }

    
    public function getCurrent()
    {
        return $this->tokens[$this->current];
    }

    
    public function getFilename()
    {
        return $this->filename;
    }
}
