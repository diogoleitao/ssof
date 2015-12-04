<?php




class Twig_Token
{
    protected $V2dijfr3ez0f;
    protected $Vtathfumoxhu;
    protected $Vy5krvyy5dgq;

    const EOF_TYPE = -1;
    const TEXT_TYPE = 0;
    const BLOCK_START_TYPE = 1;
    const VAR_START_TYPE = 2;
    const BLOCK_END_TYPE = 3;
    const VAR_END_TYPE = 4;
    const NAME_TYPE = 5;
    const NUMBER_TYPE = 6;
    const STRING_TYPE = 7;
    const OPERATOR_TYPE = 8;
    const PUNCTUATION_TYPE = 9;
    const INTERPOLATION_START_TYPE = 10;
    const INTERPOLATION_END_TYPE = 11;

    
    public function __construct($Vtathfumoxhu, $V2dijfr3ez0f, $Vy5krvyy5dgq)
    {
        $this->type = $Vtathfumoxhu;
        $this->value = $V2dijfr3ez0f;
        $this->lineno = $Vy5krvyy5dgq;
    }

    
    public function __toString()
    {
        return sprintf('%s(%s)', self::typeToString($this->type, true), $this->value);
    }

    
    public function test($Vtathfumoxhu, $V2dijfr3ez0fs = null)
    {
        if (null === $V2dijfr3ez0fs && !is_int($Vtathfumoxhu)) {
            $V2dijfr3ez0fs = $Vtathfumoxhu;
            $Vtathfumoxhu = self::NAME_TYPE;
        }

        return ($this->type === $Vtathfumoxhu) && (
            null === $V2dijfr3ez0fs ||
            (is_array($V2dijfr3ez0fs) && in_array($this->value, $V2dijfr3ez0fs)) ||
            $this->value == $V2dijfr3ez0fs
        );
    }

    
    public function getLine()
    {
        return $this->lineno;
    }

    
    public function getType()
    {
        return $this->type;
    }

    
    public function getValue()
    {
        return $this->value;
    }

    
    public static function typeToString($Vtathfumoxhu, $Vjhyscibhbgw = false)
    {
        switch ($Vtathfumoxhu) {
            case self::EOF_TYPE:
                $Vkkm4e2vaxrv = 'EOF_TYPE';
                break;
            case self::TEXT_TYPE:
                $Vkkm4e2vaxrv = 'TEXT_TYPE';
                break;
            case self::BLOCK_START_TYPE:
                $Vkkm4e2vaxrv = 'BLOCK_START_TYPE';
                break;
            case self::VAR_START_TYPE:
                $Vkkm4e2vaxrv = 'VAR_START_TYPE';
                break;
            case self::BLOCK_END_TYPE:
                $Vkkm4e2vaxrv = 'BLOCK_END_TYPE';
                break;
            case self::VAR_END_TYPE:
                $Vkkm4e2vaxrv = 'VAR_END_TYPE';
                break;
            case self::NAME_TYPE:
                $Vkkm4e2vaxrv = 'NAME_TYPE';
                break;
            case self::NUMBER_TYPE:
                $Vkkm4e2vaxrv = 'NUMBER_TYPE';
                break;
            case self::STRING_TYPE:
                $Vkkm4e2vaxrv = 'STRING_TYPE';
                break;
            case self::OPERATOR_TYPE:
                $Vkkm4e2vaxrv = 'OPERATOR_TYPE';
                break;
            case self::PUNCTUATION_TYPE:
                $Vkkm4e2vaxrv = 'PUNCTUATION_TYPE';
                break;
            case self::INTERPOLATION_START_TYPE:
                $Vkkm4e2vaxrv = 'INTERPOLATION_START_TYPE';
                break;
            case self::INTERPOLATION_END_TYPE:
                $Vkkm4e2vaxrv = 'INTERPOLATION_END_TYPE';
                break;
            default:
                throw new LogicException(sprintf('Token of type "%s" does not exist.', $Vtathfumoxhu));
        }

        return $Vjhyscibhbgw ? $Vkkm4e2vaxrv : 'Twig_Token::'.$Vkkm4e2vaxrv;
    }

    
    public static function typeToEnglish($Vtathfumoxhu)
    {
        switch ($Vtathfumoxhu) {
            case self::EOF_TYPE:
                return 'end of template';
            case self::TEXT_TYPE:
                return 'text';
            case self::BLOCK_START_TYPE:
                return 'begin of statement block';
            case self::VAR_START_TYPE:
                return 'begin of print statement';
            case self::BLOCK_END_TYPE:
                return 'end of statement block';
            case self::VAR_END_TYPE:
                return 'end of print statement';
            case self::NAME_TYPE:
                return 'name';
            case self::NUMBER_TYPE:
                return 'number';
            case self::STRING_TYPE:
                return 'string';
            case self::OPERATOR_TYPE:
                return 'operator';
            case self::PUNCTUATION_TYPE:
                return 'punctuation';
            case self::INTERPOLATION_START_TYPE:
                return 'begin of string interpolation';
            case self::INTERPOLATION_END_TYPE:
                return 'end of string interpolation';
            default:
                throw new LogicException(sprintf('Token of type "%s" does not exist.', $Vtathfumoxhu));
        }
    }
}
