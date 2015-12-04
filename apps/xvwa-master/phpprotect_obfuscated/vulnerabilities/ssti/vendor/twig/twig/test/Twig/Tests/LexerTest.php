<?php


class Twig_Tests_LexerTest extends PHPUnit_Framework_TestCase
{
    public function testNameLabelForTag()
    {
        $V4lif0h4bhru = '{% § %}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_START_TYPE);
        $this->assertSame('§', $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue());
    }

    public function testNameLabelForFunction()
    {
        $V4lif0h4bhru = '{{ §() }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
        $this->assertSame('§', $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getValue());
    }

    public function testBracketsNesting()
    {
        $V4lif0h4bhru = '{{ {"a":{"b":"c"}} }}';

        $this->assertEquals(2, $this->countToken($V4lif0h4bhru, Twig_Token::PUNCTUATION_TYPE, '{'));
        $this->assertEquals(2, $this->countToken($V4lif0h4bhru, Twig_Token::PUNCTUATION_TYPE, '}'));
    }

    protected function countToken($V4lif0h4bhru, $Vtathfumoxhu, $V2dijfr3ez0f = null)
    {
        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        $Vc2wt4svqann = 0;
        while (!$Vxzcqmu3jtlz->isEOF()) {
            $Vchzzgk3uvsq = $Vxzcqmu3jtlz->next();
            if ($Vtathfumoxhu === $Vchzzgk3uvsq->getType()) {
                if (null === $V2dijfr3ez0f || $V2dijfr3ez0f === $Vchzzgk3uvsq->getValue()) {
                    ++$Vc2wt4svqann;
                }
            }
        }

        return $Vc2wt4svqann;
    }

    public function testLineDirective()
    {
        $V4lif0h4bhru = "foo\n"
            ."bar\n"
            ."{% line 10 %}\n"
            ."{{\n"
            ."baz\n"
            ."}}\n";

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        
        $this->assertSame(1, $Vxzcqmu3jtlz->expect(Twig_Token::TEXT_TYPE)->getLine());
        
        $this->assertSame(10, $Vxzcqmu3jtlz->expect(Twig_Token::TEXT_TYPE)->getLine());
        
        $this->assertSame(11, $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE)->getLine());
        
        $this->assertSame(12, $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getLine());
    }

    public function testLineDirectiveInline()
    {
        $V4lif0h4bhru = "foo\n"
            ."bar{% line 10 %}{{\n"
            ."baz\n"
            ."}}\n";

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        
        $this->assertSame(1, $Vxzcqmu3jtlz->expect(Twig_Token::TEXT_TYPE)->getLine());
        
        $this->assertSame(10, $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE)->getLine());
        
        $this->assertSame(11, $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE)->getLine());
    }

    public function testLongComments()
    {
        $V4lif0h4bhru = '{# '.str_repeat('*', 100000).' #}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        
    }

    public function testLongRaw()
    {
        $V4lif0h4bhru = '{% raw %}'.str_repeat('*', 100000).'{% endraw %}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        
    }

    public function testLongVar()
    {
        $V4lif0h4bhru = '{{ '.str_repeat('x', 100000).' }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        
    }

    public function testLongBlock()
    {
        $V4lif0h4bhru = '{% '.str_repeat('x', 100000).' %}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);

        
    }

    public function testBigNumbers()
    {
        $V4lif0h4bhru = '{{ 922337203685477580700 }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->next();
        $Vz3fbiqci0vl = $Vxzcqmu3jtlz->next();
        $this->assertEquals('922337203685477580700', $Vz3fbiqci0vl->getValue());
    }

    public function testStringWithEscapedDelimiter()
    {
        $V512ofmho3mi = array(
            "{{ 'foo \' bar' }}" => 'foo \' bar',
            '{{ "foo \" bar" }}' => 'foo " bar',
        );
        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        foreach ($V512ofmho3mi as $V4lif0h4bhru => $Vg5u1pvb2vvz) {
            $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
            $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
            $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, $Vg5u1pvb2vvz);
        }
    }

    public function testStringWithInterpolation()
    {
        $V4lif0h4bhru = 'foo {{ "bar #{ baz + 1 }" }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->expect(Twig_Token::TEXT_TYPE, 'foo ');
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'bar ');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE, 'baz');
        $Vxzcqmu3jtlz->expect(Twig_Token::OPERATOR_TYPE, '+');
        $Vxzcqmu3jtlz->expect(Twig_Token::NUMBER_TYPE, '1');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_END_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_END_TYPE);
    }

    public function testStringWithEscapedInterpolation()
    {
        $V4lif0h4bhru = '{{ "bar \#{baz+1}" }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'bar #{baz+1}');
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_END_TYPE);
    }

    public function testStringWithHash()
    {
        $V4lif0h4bhru = '{{ "bar # baz" }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'bar # baz');
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_END_TYPE);
    }

    
    public function testStringWithUnterminatedInterpolation()
    {
        $V4lif0h4bhru = '{{ "bar #{x" }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
    }

    public function testStringWithNestedInterpolations()
    {
        $V4lif0h4bhru = '{{ "bar #{ "foo#{bar}" }" }}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'bar ');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'foo');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE, 'bar');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_END_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_END_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_END_TYPE);
    }

    public function testStringWithNestedInterpolationsInBlock()
    {
        $V4lif0h4bhru = '{% foo "bar #{ "foo#{bar}" }" %}';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE, 'foo');
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'bar ');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::STRING_TYPE, 'foo');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::NAME_TYPE, 'bar');
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_END_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::INTERPOLATION_END_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::BLOCK_END_TYPE);
    }

    public function testOperatorEndingWithALetterAtTheEndOfALine()
    {
        $V4lif0h4bhru = "{{ 1 and\n0}}";

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vxzcqmu3jtlz = $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
        $Vxzcqmu3jtlz->expect(Twig_Token::VAR_START_TYPE);
        $Vxzcqmu3jtlz->expect(Twig_Token::NUMBER_TYPE, 1);
        $Vxzcqmu3jtlz->expect(Twig_Token::OPERATOR_TYPE, 'and');
    }

    
    public function testUnterminatedVariable()
    {
        $V4lif0h4bhru = '

{{

bar


';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
    }

    
    public function testUnterminatedBlock()
    {
        $V4lif0h4bhru = '

{%

bar


';

        $Vcqfx51khqs0 = new Twig_Lexer(new Twig_Environment());
        $Vcqfx51khqs0->tokenize($V4lif0h4bhru);
    }
}
