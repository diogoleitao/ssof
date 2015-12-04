<?php

if (!defined('ENT_SUBSTITUTE')) {
    
    define('ENT_SUBSTITUTE', 0);
}


class Twig_Extension_Core extends Twig_Extension
{
    protected $V4chuzoqazmr = array('F j, Y H:i', '%d days');
    protected $Vqgtyy2xf2qr = array(0, '.', ',');
    protected $Vxf54avf31go = null;
    protected $Vrf2rnclhm15 = array();

    
    public function setEscaper($Vjaap0zbgwrd, $Vicg521opc2w)
    {
        $this->escapers[$Vjaap0zbgwrd] = $Vicg521opc2w;
    }

    
    public function getEscapers()
    {
        return $this->escapers;
    }

    
    public function setDateFormat($Vrpn0gwipo5a = null, $Vtbwji4b2hnp = null)
    {
        if (null !== $Vrpn0gwipo5a) {
            $this->dateFormats[0] = $Vrpn0gwipo5a;
        }

        if (null !== $Vtbwji4b2hnp) {
            $this->dateFormats[1] = $Vtbwji4b2hnp;
        }
    }

    
    public function getDateFormat()
    {
        return $this->dateFormats;
    }

    
    public function setTimezone($Vxf54avf31go)
    {
        $this->timezone = $Vxf54avf31go instanceof DateTimeZone ? $Vxf54avf31go : new DateTimeZone($Vxf54avf31go);
    }

    
    public function getTimezone()
    {
        if (null === $this->timezone) {
            $this->timezone = new DateTimeZone(date_default_timezone_get());
        }

        return $this->timezone;
    }

    
    public function setNumberFormat($Vwk1otohglht, $Vwk1otohglhtPoint, $Vhiusqteofy0)
    {
        $this->numberFormat = array($Vwk1otohglht, $Vwk1otohglhtPoint, $Vhiusqteofy0);
    }

    
    public function getNumberFormat()
    {
        return $this->numberFormat;
    }

    
    public function getTokenParsers()
    {
        return array(
            new Twig_TokenParser_For(),
            new Twig_TokenParser_If(),
            new Twig_TokenParser_Extends(),
            new Twig_TokenParser_Include(),
            new Twig_TokenParser_Block(),
            new Twig_TokenParser_Use(),
            new Twig_TokenParser_Filter(),
            new Twig_TokenParser_Macro(),
            new Twig_TokenParser_Import(),
            new Twig_TokenParser_From(),
            new Twig_TokenParser_Set(),
            new Twig_TokenParser_Spaceless(),
            new Twig_TokenParser_Flush(),
            new Twig_TokenParser_Do(),
            new Twig_TokenParser_Embed(),
        );
    }

    
    public function getFilters()
    {
        $Vh4matx43sow = array(
            
            new Twig_SimpleFilter('date', 'twig_date_format_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('date_modify', 'twig_date_modify_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('format', 'sprintf'),
            new Twig_SimpleFilter('replace', 'strtr'),
            new Twig_SimpleFilter('number_format', 'twig_number_format_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('abs', 'abs'),
            new Twig_SimpleFilter('round', 'twig_round'),

            
            new Twig_SimpleFilter('url_encode', 'twig_urlencode_filter'),
            new Twig_SimpleFilter('json_encode', 'twig_jsonencode_filter'),
            new Twig_SimpleFilter('convert_encoding', 'twig_convert_encoding'),

            
            new Twig_SimpleFilter('title', 'twig_title_string_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('capitalize', 'twig_capitalize_string_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('upper', 'strtoupper'),
            new Twig_SimpleFilter('lower', 'strtolower'),
            new Twig_SimpleFilter('striptags', 'strip_tags'),
            new Twig_SimpleFilter('trim', 'trim'),
            new Twig_SimpleFilter('nl2br', 'nl2br', array('pre_escape' => 'html', 'is_safe' => array('html'))),

            
            new Twig_SimpleFilter('join', 'twig_join_filter'),
            new Twig_SimpleFilter('split', 'twig_split_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('sort', 'twig_sort_filter'),
            new Twig_SimpleFilter('merge', 'twig_array_merge'),
            new Twig_SimpleFilter('batch', 'twig_array_batch'),

            
            new Twig_SimpleFilter('reverse', 'twig_reverse_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('length', 'twig_length_filter', array('needs_environment' => true)),
            new Twig_SimpleFilter('slice', 'twig_slice', array('needs_environment' => true)),
            new Twig_SimpleFilter('first', 'twig_first', array('needs_environment' => true)),
            new Twig_SimpleFilter('last', 'twig_last', array('needs_environment' => true)),

            
            new Twig_SimpleFilter('default', '_twig_default_filter', array('node_class' => 'Twig_Node_Expression_Filter_Default')),
            new Twig_SimpleFilter('keys', 'twig_get_array_keys_filter'),

            
            new Twig_SimpleFilter('escape', 'twig_escape_filter', array('needs_environment' => true, 'is_safe_callback' => 'twig_escape_filter_is_safe')),
            new Twig_SimpleFilter('e', 'twig_escape_filter', array('needs_environment' => true, 'is_safe_callback' => 'twig_escape_filter_is_safe')),
        );

        if (function_exists('mb_get_info')) {
            $Vh4matx43sow[] = new Twig_SimpleFilter('upper', 'twig_upper_filter', array('needs_environment' => true));
            $Vh4matx43sow[] = new Twig_SimpleFilter('lower', 'twig_lower_filter', array('needs_environment' => true));
        }

        return $Vh4matx43sow;
    }

    
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('max', 'max'),
            new Twig_SimpleFunction('min', 'min'),
            new Twig_SimpleFunction('range', 'range'),
            new Twig_SimpleFunction('constant', 'twig_constant'),
            new Twig_SimpleFunction('cycle', 'twig_cycle'),
            new Twig_SimpleFunction('random', 'twig_random', array('needs_environment' => true)),
            new Twig_SimpleFunction('date', 'twig_date_converter', array('needs_environment' => true)),
            new Twig_SimpleFunction('include', 'twig_include', array('needs_environment' => true, 'needs_context' => true, 'is_safe' => array('all'))),
            new Twig_SimpleFunction('source', 'twig_source', array('needs_environment' => true, 'is_safe' => array('all'))),
        );
    }

    
    public function getTests()
    {
        return array(
            new Twig_SimpleTest('even', null, array('node_class' => 'Twig_Node_Expression_Test_Even')),
            new Twig_SimpleTest('odd', null, array('node_class' => 'Twig_Node_Expression_Test_Odd')),
            new Twig_SimpleTest('defined', null, array('node_class' => 'Twig_Node_Expression_Test_Defined')),
            new Twig_SimpleTest('sameas', null, array('node_class' => 'Twig_Node_Expression_Test_Sameas')),
            new Twig_SimpleTest('same as', null, array('node_class' => 'Twig_Node_Expression_Test_Sameas')),
            new Twig_SimpleTest('none', null, array('node_class' => 'Twig_Node_Expression_Test_Null')),
            new Twig_SimpleTest('null', null, array('node_class' => 'Twig_Node_Expression_Test_Null')),
            new Twig_SimpleTest('divisibleby', null, array('node_class' => 'Twig_Node_Expression_Test_Divisibleby')),
            new Twig_SimpleTest('divisible by', null, array('node_class' => 'Twig_Node_Expression_Test_Divisibleby')),
            new Twig_SimpleTest('constant', null, array('node_class' => 'Twig_Node_Expression_Test_Constant')),
            new Twig_SimpleTest('empty', 'twig_test_empty'),
            new Twig_SimpleTest('iterable', 'twig_test_iterable'),
        );
    }

    
    public function getOperators()
    {
        return array(
            array(
                'not' => array('precedence' => 50, 'class' => 'Twig_Node_Expression_Unary_Not'),
                '-' => array('precedence' => 500, 'class' => 'Twig_Node_Expression_Unary_Neg'),
                '+' => array('precedence' => 500, 'class' => 'Twig_Node_Expression_Unary_Pos'),
            ),
            array(
                'or' => array('precedence' => 10, 'class' => 'Twig_Node_Expression_Binary_Or', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'and' => array('precedence' => 15, 'class' => 'Twig_Node_Expression_Binary_And', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'b-or' => array('precedence' => 16, 'class' => 'Twig_Node_Expression_Binary_BitwiseOr', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'b-xor' => array('precedence' => 17, 'class' => 'Twig_Node_Expression_Binary_BitwiseXor', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'b-and' => array('precedence' => 18, 'class' => 'Twig_Node_Expression_Binary_BitwiseAnd', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '==' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_Equal', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '!=' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_NotEqual', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '<' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_Less', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '>' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_Greater', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '>=' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_GreaterEqual', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '<=' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_LessEqual', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'not in' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_NotIn', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'in' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_In', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'matches' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_Matches', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'starts with' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_StartsWith', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'ends with' => array('precedence' => 20, 'class' => 'Twig_Node_Expression_Binary_EndsWith', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '..' => array('precedence' => 25, 'class' => 'Twig_Node_Expression_Binary_Range', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '+' => array('precedence' => 30, 'class' => 'Twig_Node_Expression_Binary_Add', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '-' => array('precedence' => 30, 'class' => 'Twig_Node_Expression_Binary_Sub', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '~' => array('precedence' => 40, 'class' => 'Twig_Node_Expression_Binary_Concat', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '*' => array('precedence' => 60, 'class' => 'Twig_Node_Expression_Binary_Mul', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '/' => array('precedence' => 60, 'class' => 'Twig_Node_Expression_Binary_Div', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '//' => array('precedence' => 60, 'class' => 'Twig_Node_Expression_Binary_FloorDiv', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '%' => array('precedence' => 60, 'class' => 'Twig_Node_Expression_Binary_Mod', 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'is' => array('precedence' => 100, 'callable' => array($this, 'parseTestExpression'), 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                'is not' => array('precedence' => 100, 'callable' => array($this, 'parseNotTestExpression'), 'associativity' => Twig_ExpressionParser::OPERATOR_LEFT),
                '**' => array('precedence' => 200, 'class' => 'Twig_Node_Expression_Binary_Power', 'associativity' => Twig_ExpressionParser::OPERATOR_RIGHT),
            ),
        );
    }

    public function parseNotTestExpression(Twig_Parser $Vqfx20r3yfax, Twig_NodeInterface $Vz3fbiqci0vl)
    {
        return new Twig_Node_Expression_Unary_Not($this->parseTestExpression($Vqfx20r3yfax, $Vz3fbiqci0vl), $Vqfx20r3yfax->getCurrentToken()->getLine());
    }

    public function parseTestExpression(Twig_Parser $Vqfx20r3yfax, Twig_NodeInterface $Vz3fbiqci0vl)
    {
        $Vxzcqmu3jtlz = $Vqfx20r3yfax->getStream();
        $Vkkm4e2vaxrv = $this->getTestName($Vqfx20r3yfax, $Vz3fbiqci0vl->getLine());
        $Vnwpwvxwn3wh = $this->getTestNodeClass($Vqfx20r3yfax, $Vkkm4e2vaxrv);
        $V02jggtj2kdh = null;
        if ($Vxzcqmu3jtlz->test(Twig_Token::PUNCTUATION_TYPE, '(')) {
            $V02jggtj2kdh = $Vqfx20r3yfax->getExpressionParser()->parseArguments(true);
        }

        return new $Vnwpwvxwn3wh($Vz3fbiqci0vl, $Vkkm4e2vaxrv, $V02jggtj2kdh, $Vqfx20r3yfax->getCurrentToken()->getLine());
    }

    protected function getTestName(Twig_Parser $Vqfx20r3yfax, $V0devhuwbm4i)
    {
        $Vxzcqmu3jtlz = $Vqfx20r3yfax->getStream();
        $Vkkm4e2vaxrv = $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue();
        $Vx44ywczaw14 = $Vqfx20r3yfax->getEnvironment();
        $Vmgba0johkqb = $Vx44ywczaw14->getTests();

        if (isset($Vmgba0johkqb[$Vkkm4e2vaxrv])) {
            return $Vkkm4e2vaxrv;
        }

        if ($Vxzcqmu3jtlz->test(Twig_Token::NAME_TYPE)) {
            
            $Vkkm4e2vaxrv = $Vkkm4e2vaxrv.' '.$Vqfx20r3yfax->getCurrentToken()->getValue();

            if (isset($Vmgba0johkqb[$Vkkm4e2vaxrv])) {
                $Vqfx20r3yfax->getStream()->next();

                return $Vkkm4e2vaxrv;
            }
        }

        $Vnpz33gb3cxs = sprintf('The test "%s" does not exist', $Vkkm4e2vaxrv);
        if ($Veawdoi2oak4 = $Vx44ywczaw14->computeAlternatives($Vkkm4e2vaxrv, array_keys($Vmgba0johkqb))) {
            $Vnpz33gb3cxs = sprintf('%s. Did you mean "%s"', $Vnpz33gb3cxs, implode('", "', $Veawdoi2oak4));
        }

        throw new Twig_Error_Syntax($Vnpz33gb3cxs, $V0devhuwbm4i, $Vqfx20r3yfax->getFilename());
    }

    protected function getTestNodeClass(Twig_Parser $Vqfx20r3yfax, $Vkkm4e2vaxrv)
    {
        $Vx44ywczaw14 = $Vqfx20r3yfax->getEnvironment();
        $Vmgba0johkqb = $Vx44ywczaw14->getTests();

        if ($Vmgba0johkqb[$Vkkm4e2vaxrv] instanceof Twig_SimpleTest) {
            return $Vmgba0johkqb[$Vkkm4e2vaxrv]->getNodeClass();
        }

        return $Vmgba0johkqb[$Vkkm4e2vaxrv] instanceof Twig_Test_Node ? $Vmgba0johkqb[$Vkkm4e2vaxrv]->getClass() : 'Twig_Node_Expression_Test';
    }

    
    public function getName()
    {
        return 'core';
    }
}


function twig_cycle($Vpek50boolgn, $Vprk44ft0spf)
{
    if (!is_array($Vpek50boolgn) && !$Vpek50boolgn instanceof ArrayAccess) {
        return $Vpek50boolgn;
    }

    return $Vpek50boolgn[$Vprk44ft0spf % count($Vpek50boolgn)];
}


function twig_random(Twig_Environment $Vx44ywczaw14, $Vpek50boolgn = null)
{
    if (null === $Vpek50boolgn) {
        return mt_rand();
    }

    if (is_int($Vpek50boolgn) || is_float($Vpek50boolgn)) {
        return $Vpek50boolgn < 0 ? mt_rand($Vpek50boolgn, 0) : mt_rand(0, $Vpek50boolgn);
    }

    if ($Vpek50boolgn instanceof Traversable) {
        $Vpek50boolgn = iterator_to_array($Vpek50boolgn);
    } elseif (is_string($Vpek50boolgn)) {
        if ('' === $Vpek50boolgn) {
            return '';
        }
        if (null !== $Vne0bkzg1krv = $Vx44ywczaw14->getCharset()) {
            if ('UTF-8' != $Vne0bkzg1krv) {
                $Vpek50boolgn = twig_convert_encoding($Vpek50boolgn, 'UTF-8', $Vne0bkzg1krv);
            }

            
            
            $Vpek50boolgn = preg_split('/(?<!^)(?!$)/u', $Vpek50boolgn);

            if ('UTF-8' != $Vne0bkzg1krv) {
                foreach ($Vpek50boolgn as $Vh3cz3bzejsf => $V2dijfr3ez0f) {
                    $Vpek50boolgn[$Vh3cz3bzejsf] = twig_convert_encoding($V2dijfr3ez0f, $Vne0bkzg1krv, 'UTF-8');
                }
            }
        } else {
            return $Vpek50boolgn[mt_rand(0, strlen($Vpek50boolgn) - 1)];
        }
    }

    if (!is_array($Vpek50boolgn)) {
        return $Vpek50boolgn;
    }

    if (0 === count($Vpek50boolgn)) {
        throw new Twig_Error_Runtime('The random function cannot pick from an empty array.');
    }

    return $Vpek50boolgn[array_rand($Vpek50boolgn, 1)];
}


function twig_date_format_filter(Twig_Environment $Vx44ywczaw14, $Vr1gl0j03kjs, $Vrpn0gwipo5a = null, $Vxf54avf31go = null)
{
    if (null === $Vrpn0gwipo5a) {
        $Vrpn0gwipo5as = $Vx44ywczaw14->getExtension('core')->getDateFormat();
        $Vrpn0gwipo5a = $Vr1gl0j03kjs instanceof DateInterval ? $Vrpn0gwipo5as[1] : $Vrpn0gwipo5as[0];
    }

    if ($Vr1gl0j03kjs instanceof DateInterval) {
        return $Vr1gl0j03kjs->format($Vrpn0gwipo5a);
    }

    return twig_date_converter($Vx44ywczaw14, $Vr1gl0j03kjs, $Vxf54avf31go)->format($Vrpn0gwipo5a);
}


function twig_date_modify_filter(Twig_Environment $Vx44ywczaw14, $Vr1gl0j03kjs, $Vdwpr3hnqnne)
{
    $Vr1gl0j03kjs = twig_date_converter($Vx44ywczaw14, $Vr1gl0j03kjs, false);
    $Vgcudrriowod = $Vr1gl0j03kjs->modify($Vdwpr3hnqnne);

    
    
    
    return null === $Vgcudrriowod ? $Vr1gl0j03kjs : $Vgcudrriowod;
}


function twig_date_converter(Twig_Environment $Vx44ywczaw14, $Vr1gl0j03kjs = null, $Vxf54avf31go = null)
{
    
    if (false !== $Vxf54avf31go) {
        if (null === $Vxf54avf31go) {
            $Vxf54avf31go = $Vx44ywczaw14->getExtension('core')->getTimezone();
        } elseif (!$Vxf54avf31go instanceof DateTimeZone) {
            $Vxf54avf31go = new DateTimeZone($Vxf54avf31go);
        }
    }

    
    if ($Vr1gl0j03kjs instanceof DateTimeImmutable) {
        return false !== $Vxf54avf31go ? $Vr1gl0j03kjs->setTimezone($Vxf54avf31go) : $Vr1gl0j03kjs;
    }

    if ($Vr1gl0j03kjs instanceof DateTime || $Vr1gl0j03kjs instanceof DateTimeInterface) {
        $Vr1gl0j03kjs = clone $Vr1gl0j03kjs;
        if (false !== $Vxf54avf31go) {
            $Vr1gl0j03kjs->setTimezone($Vxf54avf31go);
        }

        return $Vr1gl0j03kjs;
    }

    $Vuk3htefbesl = (string) $Vr1gl0j03kjs;
    if (ctype_digit($Vuk3htefbesl) || (!empty($Vuk3htefbesl) && '-' === $Vuk3htefbesl[0] && ctype_digit(substr($Vuk3htefbesl, 1)))) {
        $Vr1gl0j03kjs = '@'.$Vr1gl0j03kjs;
    }

    $Vr1gl0j03kjs = new DateTime($Vr1gl0j03kjs, $Vx44ywczaw14->getExtension('core')->getTimezone());
    if (false !== $Vxf54avf31go) {
        $Vr1gl0j03kjs->setTimezone($Vxf54avf31go);
    }

    return $Vr1gl0j03kjs;
}


function twig_round($V2dijfr3ez0f, $V3yym2ponljx = 0, $Vng2lb3h3obx = 'common')
{
    if ('common' == $Vng2lb3h3obx) {
        return round($V2dijfr3ez0f, $V3yym2ponljx);
    }

    if ('ceil' != $Vng2lb3h3obx && 'floor' != $Vng2lb3h3obx) {
        throw new Twig_Error_Runtime('The round filter only supports the "common", "ceil", and "floor" methods.');
    }

    return $Vng2lb3h3obx($V2dijfr3ez0f * pow(10, $V3yym2ponljx)) / pow(10, $V3yym2ponljx);
}


function twig_number_format_filter(Twig_Environment $Vx44ywczaw14, $Vprlrzugvhom, $Vwk1otohglht = null, $Vwk1otohglhtPoint = null, $Vhiusqteofy0 = null)
{
    $Vugskzjaix0u = $Vx44ywczaw14->getExtension('core')->getNumberFormat();
    if (null === $Vwk1otohglht) {
        $Vwk1otohglht = $Vugskzjaix0u[0];
    }

    if (null === $Vwk1otohglhtPoint) {
        $Vwk1otohglhtPoint = $Vugskzjaix0u[1];
    }

    if (null === $Vhiusqteofy0) {
        $Vhiusqteofy0 = $Vugskzjaix0u[2];
    }

    return number_format((float) $Vprlrzugvhom, $Vwk1otohglht, $Vwk1otohglhtPoint, $Vhiusqteofy0);
}


function twig_urlencode_filter($Vdyw2rtirndg)
{
    if (is_array($Vdyw2rtirndg)) {
        if (defined('PHP_QUERY_RFC3986')) {
            return http_build_query($Vdyw2rtirndg, '', '&', PHP_QUERY_RFC3986);
        }

        return http_build_query($Vdyw2rtirndg, '', '&');
    }

    return rawurlencode($Vdyw2rtirndg);
}

if (PHP_VERSION_ID < 50300) {
    
    function twig_jsonencode_filter($V2dijfr3ez0f, $Vbo43qqknf4i = 0)
    {
        if ($V2dijfr3ez0f instanceof Twig_Markup) {
            $V2dijfr3ez0f = (string) $V2dijfr3ez0f;
        } elseif (is_array($V2dijfr3ez0f)) {
            array_walk_recursive($V2dijfr3ez0f, '_twig_markup2string');
        }

        return json_encode($V2dijfr3ez0f);
    }
} else {
    
    function twig_jsonencode_filter($V2dijfr3ez0f, $Vbo43qqknf4i = 0)
    {
        if ($V2dijfr3ez0f instanceof Twig_Markup) {
            $V2dijfr3ez0f = (string) $V2dijfr3ez0f;
        } elseif (is_array($V2dijfr3ez0f)) {
            array_walk_recursive($V2dijfr3ez0f, '_twig_markup2string');
        }

        return json_encode($V2dijfr3ez0f, $Vbo43qqknf4i);
    }
}

function _twig_markup2string(&$V2dijfr3ez0f)
{
    if ($V2dijfr3ez0f instanceof Twig_Markup) {
        $V2dijfr3ez0f = (string) $V2dijfr3ez0f;
    }
}


function twig_array_merge($Vntjpi4n1whx, $Vc2tgs13spgo)
{
    if (!is_array($Vntjpi4n1whx) || !is_array($Vc2tgs13spgo)) {
        throw new Twig_Error_Runtime(sprintf('The merge filter only works with arrays or hashes; %s and %s given.', gettype($Vntjpi4n1whx), gettype($Vc2tgs13spgo)));
    }

    return array_merge($Vntjpi4n1whx, $Vc2tgs13spgo);
}


function twig_slice(Twig_Environment $Vx44ywczaw14, $Vh3cz3bzejsftem, $V0kirhf1h1sd, $Vac2bf3qhtlh = null, $Vkduo5gv2zrk = false)
{
    if ($Vh3cz3bzejsftem instanceof Traversable) {
        if ($Vh3cz3bzejsftem instanceof IteratorAggregate) {
            $Vh3cz3bzejsftem = $Vh3cz3bzejsftem->getIterator();
        }

        if ($V0kirhf1h1sd >= 0 && $Vac2bf3qhtlh >= 0 && $Vh3cz3bzejsftem instanceof Iterator) {
            try {
                return iterator_to_array(new LimitIterator($Vh3cz3bzejsftem, $V0kirhf1h1sd, $Vac2bf3qhtlh === null ? -1 : $Vac2bf3qhtlh), $Vkduo5gv2zrk);
            } catch (OutOfBoundsException $Vvpibbwbvf5d) {
                return array();
            }
        }

        $Vh3cz3bzejsftem = iterator_to_array($Vh3cz3bzejsftem, $Vkduo5gv2zrk);
    }

    if (is_array($Vh3cz3bzejsftem)) {
        return array_slice($Vh3cz3bzejsftem, $V0kirhf1h1sd, $Vac2bf3qhtlh, $Vkduo5gv2zrk);
    }

    $Vh3cz3bzejsftem = (string) $Vh3cz3bzejsftem;

    if (function_exists('mb_get_info') && null !== $Vne0bkzg1krv = $Vx44ywczaw14->getCharset()) {
        return (string) mb_substr($Vh3cz3bzejsftem, $V0kirhf1h1sd, null === $Vac2bf3qhtlh ? mb_strlen($Vh3cz3bzejsftem, $Vne0bkzg1krv) - $V0kirhf1h1sd : $Vac2bf3qhtlh, $Vne0bkzg1krv);
    }

    return (string) (null === $Vac2bf3qhtlh ? substr($Vh3cz3bzejsftem, $V0kirhf1h1sd) : substr($Vh3cz3bzejsftem, $V0kirhf1h1sd, $Vac2bf3qhtlh));
}


function twig_first(Twig_Environment $Vx44ywczaw14, $Vh3cz3bzejsftem)
{
    $Vf1izqo4gxss = twig_slice($Vx44ywczaw14, $Vh3cz3bzejsftem, 0, 1, false);

    return is_string($Vf1izqo4gxss) ? $Vf1izqo4gxss : current($Vf1izqo4gxss);
}


function twig_last(Twig_Environment $Vx44ywczaw14, $Vh3cz3bzejsftem)
{
    $Vf1izqo4gxss = twig_slice($Vx44ywczaw14, $Vh3cz3bzejsftem, -1, 1, false);

    return is_string($Vf1izqo4gxss) ? $Vf1izqo4gxss : current($Vf1izqo4gxss);
}


function twig_join_filter($V2dijfr3ez0f, $Vvo3mdeglmil = '')
{
    if ($V2dijfr3ez0f instanceof Traversable) {
        $V2dijfr3ez0f = iterator_to_array($V2dijfr3ez0f, false);
    }

    return implode($Vvo3mdeglmil, (array) $V2dijfr3ez0f);
}


function twig_split_filter(Twig_Environment $Vx44ywczaw14, $V2dijfr3ez0f, $V2tab4en12pj, $Vgt5444dz22x = null)
{
    if (!empty($V2tab4en12pj)) {
        return null === $Vgt5444dz22x ? explode($V2tab4en12pj, $V2dijfr3ez0f) : explode($V2tab4en12pj, $V2dijfr3ez0f, $Vgt5444dz22x);
    }

    if (!function_exists('mb_get_info') || null === $Vne0bkzg1krv = $Vx44ywczaw14->getCharset()) {
        return str_split($V2dijfr3ez0f, null === $Vgt5444dz22x ? 1 : $Vgt5444dz22x);
    }

    if ($Vgt5444dz22x <= 1) {
        return preg_split('/(?<!^)(?!$)/u', $V2dijfr3ez0f);
    }

    $Vac2bf3qhtlh = mb_strlen($V2dijfr3ez0f, $Vne0bkzg1krv);
    if ($Vac2bf3qhtlh < $Vgt5444dz22x) {
        return array($V2dijfr3ez0f);
    }

    $Vto203c3rzkl = array();
    for ($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf < $Vac2bf3qhtlh; $Vh3cz3bzejsf += $Vgt5444dz22x) {
        $Vto203c3rzkl[] = mb_substr($V2dijfr3ez0f, $Vh3cz3bzejsf, $Vgt5444dz22x, $Vne0bkzg1krv);
    }

    return $Vto203c3rzkl;
}




function _twig_default_filter($V2dijfr3ez0f, $V0x2y4bdxg4l = '')
{
    if (twig_test_empty($V2dijfr3ez0f)) {
        return $V0x2y4bdxg4l;
    }

    return $V2dijfr3ez0f;
}


function twig_get_array_keys_filter($V1qa5pz21ghc)
{
    if (is_object($V1qa5pz21ghc) && $V1qa5pz21ghc instanceof Traversable) {
        return array_keys(iterator_to_array($V1qa5pz21ghc));
    }

    if (!is_array($V1qa5pz21ghc)) {
        return array();
    }

    return array_keys($V1qa5pz21ghc);
}


function twig_reverse_filter(Twig_Environment $Vx44ywczaw14, $Vh3cz3bzejsftem, $Vkduo5gv2zrk = false)
{
    if (is_object($Vh3cz3bzejsftem) && $Vh3cz3bzejsftem instanceof Traversable) {
        return array_reverse(iterator_to_array($Vh3cz3bzejsftem), $Vkduo5gv2zrk);
    }

    if (is_array($Vh3cz3bzejsftem)) {
        return array_reverse($Vh3cz3bzejsftem, $Vkduo5gv2zrk);
    }

    if (null !== $Vne0bkzg1krv = $Vx44ywczaw14->getCharset()) {
        $Viabwp03n3sk = (string) $Vh3cz3bzejsftem;

        if ('UTF-8' != $Vne0bkzg1krv) {
            $Vh3cz3bzejsftem = twig_convert_encoding($Viabwp03n3sk, 'UTF-8', $Vne0bkzg1krv);
        }

        preg_match_all('/./us', $Vh3cz3bzejsftem, $Vqzeq4pbgqkr);

        $Viabwp03n3sk = implode('', array_reverse($Vqzeq4pbgqkr[0]));

        if ('UTF-8' != $Vne0bkzg1krv) {
            $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, $Vne0bkzg1krv, 'UTF-8');
        }

        return $Viabwp03n3sk;
    }

    return strrev((string) $Vh3cz3bzejsftem);
}


function twig_sort_filter($V1qa5pz21ghc)
{
    asort($V1qa5pz21ghc);

    return $V1qa5pz21ghc;
}


function twig_in_filter($V2dijfr3ez0f, $Vkfbs1hzotcq)
{
    if (is_array($Vkfbs1hzotcq)) {
        return in_array($V2dijfr3ez0f, $Vkfbs1hzotcq, is_object($V2dijfr3ez0f) || is_resource($V2dijfr3ez0f));
    } elseif (is_string($Vkfbs1hzotcq) && (is_string($V2dijfr3ez0f) || is_int($V2dijfr3ez0f) || is_float($V2dijfr3ez0f))) {
        return '' === $V2dijfr3ez0f || false !== strpos($Vkfbs1hzotcq, (string) $V2dijfr3ez0f);
    } elseif ($Vkfbs1hzotcq instanceof Traversable) {
        return in_array($V2dijfr3ez0f, iterator_to_array($Vkfbs1hzotcq, false), is_object($V2dijfr3ez0f) || is_resource($V2dijfr3ez0f));
    }

    return false;
}


function twig_escape_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk, $Vjaap0zbgwrd = 'html', $Vne0bkzg1krv = null, $Vyttn4tlp5bx = false)
{
    if ($Vyttn4tlp5bx && $Viabwp03n3sk instanceof Twig_Markup) {
        return $Viabwp03n3sk;
    }

    if (!is_string($Viabwp03n3sk)) {
        if (is_object($Viabwp03n3sk) && method_exists($Viabwp03n3sk, '__toString')) {
            $Viabwp03n3sk = (string) $Viabwp03n3sk;
        } else {
            return $Viabwp03n3sk;
        }
    }

    if (null === $Vne0bkzg1krv) {
        $Vne0bkzg1krv = $Vx44ywczaw14->getCharset();
    }

    switch ($Vjaap0zbgwrd) {
        case 'html':
            

            
            
            
            static $Vdfebxjqte2q;

            if (null === $Vdfebxjqte2q) {
                if (defined('HHVM_VERSION')) {
                    $Vdfebxjqte2q = array('utf-8' => true, 'UTF-8' => true);
                } else {
                    $Vdfebxjqte2q = array(
                        'ISO-8859-1' => true, 'ISO8859-1' => true,
                        'ISO-8859-15' => true, 'ISO8859-15' => true,
                        'utf-8' => true, 'UTF-8' => true,
                        'CP866' => true, 'IBM866' => true, '866' => true,
                        'CP1251' => true, 'WINDOWS-1251' => true, 'WIN-1251' => true,
                        '1251' => true,
                        'CP1252' => true, 'WINDOWS-1252' => true, '1252' => true,
                        'KOI8-R' => true, 'KOI8-RU' => true, 'KOI8R' => true,
                        'BIG5' => true, '950' => true,
                        'GB2312' => true, '936' => true,
                        'BIG5-HKSCS' => true,
                        'SHIFT_JIS' => true, 'SJIS' => true, '932' => true,
                        'EUC-JP' => true, 'EUCJP' => true,
                        'ISO8859-5' => true, 'ISO-8859-5' => true, 'MACROMAN' => true,
                    );
                }
            }

            if (isset($Vdfebxjqte2q[$Vne0bkzg1krv])) {
                return htmlspecialchars($Viabwp03n3sk, ENT_QUOTES | ENT_SUBSTITUTE, $Vne0bkzg1krv);
            }

            if (isset($Vdfebxjqte2q[strtoupper($Vne0bkzg1krv)])) {
                
                $Vdfebxjqte2q[$Vne0bkzg1krv] = true;

                return htmlspecialchars($Viabwp03n3sk, ENT_QUOTES | ENT_SUBSTITUTE, $Vne0bkzg1krv);
            }

            $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, 'UTF-8', $Vne0bkzg1krv);
            $Viabwp03n3sk = htmlspecialchars($Viabwp03n3sk, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

            return twig_convert_encoding($Viabwp03n3sk, $Vne0bkzg1krv, 'UTF-8');

        case 'js':
            
            
            if ('UTF-8' != $Vne0bkzg1krv) {
                $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, 'UTF-8', $Vne0bkzg1krv);
            }

            if (0 == strlen($Viabwp03n3sk) ? false : (1 == preg_match('/^./su', $Viabwp03n3sk) ? false : true)) {
                throw new Twig_Error_Runtime('The string to escape is not a valid UTF-8 string.');
            }

            $Viabwp03n3sk = preg_replace_callback('#[^a-zA-Z0-9,\._]#Su', '_twig_escape_js_callback', $Viabwp03n3sk);

            if ('UTF-8' != $Vne0bkzg1krv) {
                $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, $Vne0bkzg1krv, 'UTF-8');
            }

            return $Viabwp03n3sk;

        case 'css':
            if ('UTF-8' != $Vne0bkzg1krv) {
                $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, 'UTF-8', $Vne0bkzg1krv);
            }

            if (0 == strlen($Viabwp03n3sk) ? false : (1 == preg_match('/^./su', $Viabwp03n3sk) ? false : true)) {
                throw new Twig_Error_Runtime('The string to escape is not a valid UTF-8 string.');
            }

            $Viabwp03n3sk = preg_replace_callback('#[^a-zA-Z0-9]#Su', '_twig_escape_css_callback', $Viabwp03n3sk);

            if ('UTF-8' != $Vne0bkzg1krv) {
                $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, $Vne0bkzg1krv, 'UTF-8');
            }

            return $Viabwp03n3sk;

        case 'html_attr':
            if ('UTF-8' != $Vne0bkzg1krv) {
                $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, 'UTF-8', $Vne0bkzg1krv);
            }

            if (0 == strlen($Viabwp03n3sk) ? false : (1 == preg_match('/^./su', $Viabwp03n3sk) ? false : true)) {
                throw new Twig_Error_Runtime('The string to escape is not a valid UTF-8 string.');
            }

            $Viabwp03n3sk = preg_replace_callback('#[^a-zA-Z0-9,\.\-_]#Su', '_twig_escape_html_attr_callback', $Viabwp03n3sk);

            if ('UTF-8' != $Vne0bkzg1krv) {
                $Viabwp03n3sk = twig_convert_encoding($Viabwp03n3sk, $Vne0bkzg1krv, 'UTF-8');
            }

            return $Viabwp03n3sk;

        case 'url':
            if (PHP_VERSION_ID < 50300) {
                return str_replace('%7E', '~', rawurlencode($Viabwp03n3sk));
            }

            return rawurlencode($Viabwp03n3sk);

        default:
            static $Vrf2rnclhm15;

            if (null === $Vrf2rnclhm15) {
                $Vrf2rnclhm15 = $Vx44ywczaw14->getExtension('core')->getEscapers();
            }

            if (isset($Vrf2rnclhm15[$Vjaap0zbgwrd])) {
                return call_user_func($Vrf2rnclhm15[$Vjaap0zbgwrd], $Vx44ywczaw14, $Viabwp03n3sk, $Vne0bkzg1krv);
            }

            $V2lynzbosbt3 = implode(', ', array_merge(array('html', 'js', 'url', 'css', 'html_attr'), array_keys($Vrf2rnclhm15)));

            throw new Twig_Error_Runtime(sprintf('Invalid escaping strategy "%s" (valid ones: %s).', $Vjaap0zbgwrd, $V2lynzbosbt3));
    }
}


function twig_escape_filter_is_safe(Twig_Node $Vdf0fyqtfggi)
{
    foreach ($Vdf0fyqtfggi as $Vwc2eazpip14) {
        if ($Vwc2eazpip14 instanceof Twig_Node_Expression_Constant) {
            return array($Vwc2eazpip14->getAttribute('value'));
        }

        return array();
    }

    return array('html');
}

if (function_exists('mb_convert_encoding')) {
    function twig_convert_encoding($Viabwp03n3sk, $V3jqrekjbd20, $Vtg415ybitth)
    {
        return mb_convert_encoding($Viabwp03n3sk, $V3jqrekjbd20, $Vtg415ybitth);
    }
} elseif (function_exists('iconv')) {
    function twig_convert_encoding($Viabwp03n3sk, $V3jqrekjbd20, $Vtg415ybitth)
    {
        return iconv($Vtg415ybitth, $V3jqrekjbd20, $Viabwp03n3sk);
    }
} else {
    function twig_convert_encoding($Viabwp03n3sk, $V3jqrekjbd20, $Vtg415ybitth)
    {
        throw new Twig_Error_Runtime('No suitable convert encoding function (use UTF-8 as your encoding or install the iconv or mbstring extension).');
    }
}

function _twig_escape_js_callback($Vqzeq4pbgqkr)
{
    $V2x2qqo4ohta = $Vqzeq4pbgqkr[0];

    
    if (!isset($V2x2qqo4ohta[1])) {
        return '\\x'.strtoupper(substr('00'.bin2hex($V2x2qqo4ohta), -2));
    }

    
    $V2x2qqo4ohta = twig_convert_encoding($V2x2qqo4ohta, 'UTF-16BE', 'UTF-8');

    return '\\u'.strtoupper(substr('0000'.bin2hex($V2x2qqo4ohta), -4));
}

function _twig_escape_css_callback($Vqzeq4pbgqkr)
{
    $V2x2qqo4ohta = $Vqzeq4pbgqkr[0];

    
    if (!isset($V2x2qqo4ohta[1])) {
        $V5jzoxkkqb0b = ltrim(strtoupper(bin2hex($V2x2qqo4ohta)), '0');
        if (0 === strlen($V5jzoxkkqb0b)) {
            $V5jzoxkkqb0b = '0';
        }

        return '\\'.$V5jzoxkkqb0b.' ';
    }

    
    $V2x2qqo4ohta = twig_convert_encoding($V2x2qqo4ohta, 'UTF-16BE', 'UTF-8');

    return '\\'.ltrim(strtoupper(bin2hex($V2x2qqo4ohta)), '0').' ';
}


function _twig_escape_html_attr_callback($Vqzeq4pbgqkr)
{
    
    static $Vf22uxfyfwhk = array(
        34 => 'quot', 
        38 => 'amp',  
        60 => 'lt',   
        62 => 'gt',   
    );

    $Vzilpavzpxb3 = $Vqzeq4pbgqkr[0];
    $Vckznv5i5wp5 = ord($Vzilpavzpxb3);

    
    if (($Vckznv5i5wp5 <= 0x1f && $Vzilpavzpxb3 != "\t" && $Vzilpavzpxb3 != "\n" && $Vzilpavzpxb3 != "\r") || ($Vckznv5i5wp5 >= 0x7f && $Vckznv5i5wp5 <= 0x9f)) {
        return '&#xFFFD;';
    }

    
    if (strlen($Vzilpavzpxb3) == 1) {
        $V5jzoxkkqb0b = strtoupper(substr('00'.bin2hex($Vzilpavzpxb3), -2));
    } else {
        $Vzilpavzpxb3 = twig_convert_encoding($Vzilpavzpxb3, 'UTF-16BE', 'UTF-8');
        $V5jzoxkkqb0b = strtoupper(substr('0000'.bin2hex($Vzilpavzpxb3), -4));
    }

    $Vh3cz3bzejsfnt = hexdec($V5jzoxkkqb0b);
    if (array_key_exists($Vh3cz3bzejsfnt, $Vf22uxfyfwhk)) {
        return sprintf('&%s;', $Vf22uxfyfwhk[$Vh3cz3bzejsfnt]);
    }

    
    return sprintf('&#x%s;', $V5jzoxkkqb0b);
}


if (function_exists('mb_get_info')) {
    
    function twig_length_filter(Twig_Environment $Vx44ywczaw14, $Vpzhye13looq)
    {
        return is_scalar($Vpzhye13looq) ? mb_strlen($Vpzhye13looq, $Vx44ywczaw14->getCharset()) : count($Vpzhye13looq);
    }

    
    function twig_upper_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk)
    {
        if (null !== ($Vne0bkzg1krv = $Vx44ywczaw14->getCharset())) {
            return mb_strtoupper($Viabwp03n3sk, $Vne0bkzg1krv);
        }

        return strtoupper($Viabwp03n3sk);
    }

    
    function twig_lower_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk)
    {
        if (null !== ($Vne0bkzg1krv = $Vx44ywczaw14->getCharset())) {
            return mb_strtolower($Viabwp03n3sk, $Vne0bkzg1krv);
        }

        return strtolower($Viabwp03n3sk);
    }

    
    function twig_title_string_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk)
    {
        if (null !== ($Vne0bkzg1krv = $Vx44ywczaw14->getCharset())) {
            return mb_convert_case($Viabwp03n3sk, MB_CASE_TITLE, $Vne0bkzg1krv);
        }

        return ucwords(strtolower($Viabwp03n3sk));
    }

    
    function twig_capitalize_string_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk)
    {
        if (null !== ($Vne0bkzg1krv = $Vx44ywczaw14->getCharset())) {
            return mb_strtoupper(mb_substr($Viabwp03n3sk, 0, 1, $Vne0bkzg1krv), $Vne0bkzg1krv).
                         mb_strtolower(mb_substr($Viabwp03n3sk, 1, mb_strlen($Viabwp03n3sk, $Vne0bkzg1krv), $Vne0bkzg1krv), $Vne0bkzg1krv);
        }

        return ucfirst(strtolower($Viabwp03n3sk));
    }
}

else {
    
    function twig_length_filter(Twig_Environment $Vx44ywczaw14, $Vpzhye13looq)
    {
        return is_scalar($Vpzhye13looq) ? strlen($Vpzhye13looq) : count($Vpzhye13looq);
    }

    
    function twig_title_string_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk)
    {
        return ucwords(strtolower($Viabwp03n3sk));
    }

    
    function twig_capitalize_string_filter(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk)
    {
        return ucfirst(strtolower($Viabwp03n3sk));
    }
}


function twig_ensure_traversable($Vngl2xdldp0y)
{
    if ($Vngl2xdldp0y instanceof Traversable || is_array($Vngl2xdldp0y)) {
        return $Vngl2xdldp0y;
    }

    return array();
}


function twig_test_empty($V2dijfr3ez0f)
{
    if ($V2dijfr3ez0f instanceof Countable) {
        return 0 == count($V2dijfr3ez0f);
    }

    return '' === $V2dijfr3ez0f || false === $V2dijfr3ez0f || null === $V2dijfr3ez0f || array() === $V2dijfr3ez0f;
}


function twig_test_iterable($V2dijfr3ez0f)
{
    return $V2dijfr3ez0f instanceof Traversable || is_array($V2dijfr3ez0f);
}


function twig_include(Twig_Environment $Vx44ywczaw14, $Vhmvn2c55ghv, $V4lif0h4bhru, $Vr1c5jdzi5wv = array(), $V0qpalrvzbn4 = true, $Vh3cz3bzejsfgnoreMissing = false, $Vjb5du0jg3is = false)
{
    $Vc5vp501jlbe = false;
    $Vw1ccafnn4lr = null;
    if ($V0qpalrvzbn4) {
        $Vr1c5jdzi5wv = array_merge($Vhmvn2c55ghv, $Vr1c5jdzi5wv);
    }

    if ($Vh3cz3bzejsfsSandboxed = $Vjb5du0jg3is && $Vx44ywczaw14->hasExtension('sandbox')) {
        $Vw1ccafnn4lr = $Vx44ywczaw14->getExtension('sandbox');
        if (!$Vc5vp501jlbe = $Vw1ccafnn4lr->isSandboxed()) {
            $Vw1ccafnn4lr->enableSandbox();
        }
    }

    $Vto203c3rzklesult = null;
    try {
        $Vto203c3rzklesult = $Vx44ywczaw14->resolveTemplate($V4lif0h4bhru)->render($Vr1c5jdzi5wv);
    } catch (Twig_Error_Loader $Vawjopoun3xn) {
        if (!$Vh3cz3bzejsfgnoreMissing) {
            if ($Vh3cz3bzejsfsSandboxed && !$Vc5vp501jlbe) {
                $Vw1ccafnn4lr->disableSandbox();
            }

            throw $Vawjopoun3xn;
        }
    }

    if ($Vh3cz3bzejsfsSandboxed && !$Vc5vp501jlbe) {
        $Vw1ccafnn4lr->disableSandbox();
    }

    return $Vto203c3rzklesult;
}


function twig_source(Twig_Environment $Vx44ywczaw14, $Vkkm4e2vaxrv, $Vh3cz3bzejsfgnoreMissing = false)
{
    try {
        return $Vx44ywczaw14->getLoader()->getSource($Vkkm4e2vaxrv);
    } catch (Twig_Error_Loader $Vawjopoun3xn) {
        if (!$Vh3cz3bzejsfgnoreMissing) {
            throw $Vawjopoun3xn;
        }
    }
}


function twig_constant($Vdc5jxlskllo, $Vu23r1opf0tb = null)
{
    if (null !== $Vu23r1opf0tb) {
        $Vdc5jxlskllo = get_class($Vu23r1opf0tb).'::'.$Vdc5jxlskllo;
    }

    return constant($Vdc5jxlskllo);
}


function twig_array_batch($Vh3cz3bzejsftems, $Vtzrhjc5k0rt, $Vxarb0qhxsxe = null)
{
    if ($Vh3cz3bzejsftems instanceof Traversable) {
        $Vh3cz3bzejsftems = iterator_to_array($Vh3cz3bzejsftems, false);
    }

    $Vtzrhjc5k0rt = ceil($Vtzrhjc5k0rt);

    $Vto203c3rzklesult = array_chunk($Vh3cz3bzejsftems, $Vtzrhjc5k0rt, true);

    if (null !== $Vxarb0qhxsxe && !empty($Vto203c3rzklesult)) {
        $Vte2b0a31s3k = count($Vto203c3rzklesult) - 1;
        if ($Vxarb0qhxsxeCount = $Vtzrhjc5k0rt - count($Vto203c3rzklesult[$Vte2b0a31s3k])) {
            $Vto203c3rzklesult[$Vte2b0a31s3k] = array_merge(
                $Vto203c3rzklesult[$Vte2b0a31s3k],
                array_fill(0, $Vxarb0qhxsxeCount, $Vxarb0qhxsxe)
            );
        }
    }

    return $Vto203c3rzklesult;
}
