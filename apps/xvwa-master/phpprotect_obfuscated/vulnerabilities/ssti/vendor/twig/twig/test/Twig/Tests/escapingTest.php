<?php


class Twig_Test_EscapingTest extends PHPUnit_Framework_TestCase
{
    
    protected $Vtqdajnrnzav = array(
        '\'' => '&#039;',
        '"' => '&quot;',
        '<' => '&lt;',
        '>' => '&gt;',
        '&' => '&amp;',
    );

    protected $Vphkctblvrqt = array(
        '\'' => '&#x27;',
        
        'Ā' => '&#x0100;',
        
        ',' => ',',
        '.' => '.',
        '-' => '-',
        '_' => '_',
        
        'a' => 'a',
        'A' => 'A',
        'z' => 'z',
        'Z' => 'Z',
        '0' => '0',
        '9' => '9',
        
        "\r" => '&#x0D;',
        "\n" => '&#x0A;',
        "\t" => '&#x09;',
        "\0" => '&#xFFFD;', 
        
        '<' => '&lt;',
        '>' => '&gt;',
        '&' => '&amp;',
        '"' => '&quot;',
        
        ' ' => '&#x20;',
    );

    protected $Vgbgotzjnuid = array(
        
        '<' => '\\x3C',
        '>' => '\\x3E',
        '\'' => '\\x27',
        '"' => '\\x22',
        '&' => '\\x26',
        
        'Ā' => '\\u0100',
        
        ',' => ',',
        '.' => '.',
        '_' => '_',
        
        'a' => 'a',
        'A' => 'A',
        'z' => 'z',
        'Z' => 'Z',
        '0' => '0',
        '9' => '9',
        
        "\r" => '\\x0D',
        "\n" => '\\x0A',
        "\t" => '\\x09',
        "\0" => '\\x00',
        
        ' ' => '\\x20',
    );

    protected $V000ioj4asaz = array(
        
        '<' => '%3C',
        '>' => '%3E',
        '\'' => '%27',
        '"' => '%22',
        '&' => '%26',
        
        'Ā' => '%C4%80',
        
        ',' => '%2C',
        '.' => '.',
        '_' => '_',
        '-' => '-',
        ':' => '%3A',
        ';' => '%3B',
        '!' => '%21',
        
        'a' => 'a',
        'A' => 'A',
        'z' => 'z',
        'Z' => 'Z',
        '0' => '0',
        '9' => '9',
        
        "\r" => '%0D',
        "\n" => '%0A',
        "\t" => '%09',
        "\0" => '%00',
        
        ' ' => '%20',
        '~' => '~',
        '+' => '%2B',
    );

    protected $Vxvyyp2nzgfv = array(
        
        '<' => '\\3C ',
        '>' => '\\3E ',
        '\'' => '\\27 ',
        '"' => '\\22 ',
        '&' => '\\26 ',
        
        'Ā' => '\\100 ',
        
        ',' => '\\2C ',
        '.' => '\\2E ',
        '_' => '\\5F ',
        
        'a' => 'a',
        'A' => 'A',
        'z' => 'z',
        'Z' => 'Z',
        '0' => '0',
        '9' => '9',
        
        "\r" => '\\D ',
        "\n" => '\\A ',
        "\t" => '\\9 ',
        "\0" => '\\0 ',
        
        ' ' => '\\20 ',
    );

    protected $Vx44ywczaw14;

    public function setUp()
    {
        $this->env = new Twig_Environment();
    }

    public function testHtmlEscapingConvertsSpecialChars()
    {
        foreach ($this->htmlSpecialChars as $Vks5xpccznyi => $V2dijfr3ez0f) {
            $this->assertEquals($V2dijfr3ez0f, twig_escape_filter($this->env, $Vks5xpccznyi, 'html'), 'Failed to escape: '.$Vks5xpccznyi);
        }
    }

    public function testHtmlAttributeEscapingConvertsSpecialChars()
    {
        foreach ($this->htmlAttrSpecialChars as $Vks5xpccznyi => $V2dijfr3ez0f) {
            $this->assertEquals($V2dijfr3ez0f, twig_escape_filter($this->env, $Vks5xpccznyi, 'html_attr'), 'Failed to escape: '.$Vks5xpccznyi);
        }
    }

    public function testJavascriptEscapingConvertsSpecialChars()
    {
        foreach ($this->jsSpecialChars as $Vks5xpccznyi => $V2dijfr3ez0f) {
            $this->assertEquals($V2dijfr3ez0f, twig_escape_filter($this->env, $Vks5xpccznyi, 'js'), 'Failed to escape: '.$Vks5xpccznyi);
        }
    }

    public function testJavascriptEscapingReturnsStringIfZeroLength()
    {
        $this->assertEquals('', twig_escape_filter($this->env, '', 'js'));
    }

    public function testJavascriptEscapingReturnsStringIfContainsOnlyDigits()
    {
        $this->assertEquals('123', twig_escape_filter($this->env, '123', 'js'));
    }

    public function testCssEscapingConvertsSpecialChars()
    {
        foreach ($this->cssSpecialChars as $Vks5xpccznyi => $V2dijfr3ez0f) {
            $this->assertEquals($V2dijfr3ez0f, twig_escape_filter($this->env, $Vks5xpccznyi, 'css'), 'Failed to escape: '.$Vks5xpccznyi);
        }
    }

    public function testCssEscapingReturnsStringIfZeroLength()
    {
        $this->assertEquals('', twig_escape_filter($this->env, '', 'css'));
    }

    public function testCssEscapingReturnsStringIfContainsOnlyDigits()
    {
        $this->assertEquals('123', twig_escape_filter($this->env, '123', 'css'));
    }

    public function testUrlEscapingConvertsSpecialChars()
    {
        foreach ($this->urlSpecialChars as $Vks5xpccznyi => $V2dijfr3ez0f) {
            $this->assertEquals($V2dijfr3ez0f, twig_escape_filter($this->env, $Vks5xpccznyi, 'url'), 'Failed to escape: '.$Vks5xpccznyi);
        }
    }

    

    
    public function testUnicodeCodepointConversionToUtf8()
    {
        $Vg5u1pvb2vvz = ' ~ޙ';
        $Vctalgq2ohu4 = array(0x20, 0x7e, 0x799);
        $Vqwwjuu2nhq0 = '';
        foreach ($Vctalgq2ohu4 as $V2dijfr3ez0f) {
            $Vqwwjuu2nhq0 .= $this->codepointToUtf8($V2dijfr3ez0f);
        }
        $this->assertEquals($Vg5u1pvb2vvz, $Vqwwjuu2nhq0);
    }

    
    protected function codepointToUtf8($Vjy40x2cedat)
    {
        if ($Vjy40x2cedat < 0x80) {
            return chr($Vjy40x2cedat);
        }
        if ($Vjy40x2cedat < 0x800) {
            return chr($Vjy40x2cedat >> 6 & 0x3f | 0xc0)
                .chr($Vjy40x2cedat & 0x3f | 0x80);
        }
        if ($Vjy40x2cedat < 0x10000) {
            return chr($Vjy40x2cedat >> 12 & 0x0f | 0xe0)
                .chr($Vjy40x2cedat >> 6 & 0x3f | 0x80)
                .chr($Vjy40x2cedat & 0x3f | 0x80);
        }
        if ($Vjy40x2cedat < 0x110000) {
            return chr($Vjy40x2cedat >> 18 & 0x07 | 0xf0)
                .chr($Vjy40x2cedat >> 12 & 0x3f | 0x80)
                .chr($Vjy40x2cedat >> 6 & 0x3f | 0x80)
                .chr($Vjy40x2cedat & 0x3f | 0x80);
        }
        throw new Exception('Codepoint requested outside of Unicode range');
    }

    public function testJavascriptEscapingEscapesOwaspRecommendedRanges()
    {
        $Vxjcndpocpws = array(',', '.', '_'); 
        for ($Vzilpavzpxb3 = 0; $Vzilpavzpxb3 < 0xFF; ++$Vzilpavzpxb3) {
            if ($Vzilpavzpxb3 >= 0x30 && $Vzilpavzpxb3 <= 0x39
            || $Vzilpavzpxb3 >= 0x41 && $Vzilpavzpxb3 <= 0x5A
            || $Vzilpavzpxb3 >= 0x61 && $Vzilpavzpxb3 <= 0x7A) {
                $Vjfttcrfqizo = $this->codepointToUtf8($Vzilpavzpxb3);
                $this->assertEquals($Vjfttcrfqizo, twig_escape_filter($this->env, $Vjfttcrfqizo, 'js'));
            } else {
                $Vjfttcrfqizo = $this->codepointToUtf8($Vzilpavzpxb3);
                if (in_array($Vjfttcrfqizo, $Vxjcndpocpws)) {
                    $this->assertEquals($Vjfttcrfqizo, twig_escape_filter($this->env, $Vjfttcrfqizo, 'js'));
                } else {
                    $this->assertNotEquals(
                        $Vjfttcrfqizo,
                        twig_escape_filter($this->env, $Vjfttcrfqizo, 'js'),
                        "$Vjfttcrfqizo should be escaped!");
                }
            }
        }
    }

    public function testHtmlAttributeEscapingEscapesOwaspRecommendedRanges()
    {
        $Vxjcndpocpws = array(',', '.', '-', '_'); 
        for ($Vzilpavzpxb3 = 0; $Vzilpavzpxb3 < 0xFF; ++$Vzilpavzpxb3) {
            if ($Vzilpavzpxb3 >= 0x30 && $Vzilpavzpxb3 <= 0x39
            || $Vzilpavzpxb3 >= 0x41 && $Vzilpavzpxb3 <= 0x5A
            || $Vzilpavzpxb3 >= 0x61 && $Vzilpavzpxb3 <= 0x7A) {
                $Vjfttcrfqizo = $this->codepointToUtf8($Vzilpavzpxb3);
                $this->assertEquals($Vjfttcrfqizo, twig_escape_filter($this->env, $Vjfttcrfqizo, 'html_attr'));
            } else {
                $Vjfttcrfqizo = $this->codepointToUtf8($Vzilpavzpxb3);
                if (in_array($Vjfttcrfqizo, $Vxjcndpocpws)) {
                    $this->assertEquals($Vjfttcrfqizo, twig_escape_filter($this->env, $Vjfttcrfqizo, 'html_attr'));
                } else {
                    $this->assertNotEquals(
                        $Vjfttcrfqizo,
                        twig_escape_filter($this->env, $Vjfttcrfqizo, 'html_attr'),
                        "$Vjfttcrfqizo should be escaped!");
                }
            }
        }
    }

    public function testCssEscapingEscapesOwaspRecommendedRanges()
    {
        
        for ($Vzilpavzpxb3 = 0; $Vzilpavzpxb3 < 0xFF; ++$Vzilpavzpxb3) {
            if ($Vzilpavzpxb3 >= 0x30 && $Vzilpavzpxb3 <= 0x39
            || $Vzilpavzpxb3 >= 0x41 && $Vzilpavzpxb3 <= 0x5A
            || $Vzilpavzpxb3 >= 0x61 && $Vzilpavzpxb3 <= 0x7A) {
                $Vjfttcrfqizo = $this->codepointToUtf8($Vzilpavzpxb3);
                $this->assertEquals($Vjfttcrfqizo, twig_escape_filter($this->env, $Vjfttcrfqizo, 'css'));
            } else {
                $Vjfttcrfqizo = $this->codepointToUtf8($Vzilpavzpxb3);
                $this->assertNotEquals(
                    $Vjfttcrfqizo,
                    twig_escape_filter($this->env, $Vjfttcrfqizo, 'css'),
                    "$Vjfttcrfqizo should be escaped!");
            }
        }
    }
}
