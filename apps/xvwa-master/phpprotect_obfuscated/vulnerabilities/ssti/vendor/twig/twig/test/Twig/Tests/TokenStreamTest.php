<?php



class Twig_Tests_TokenStreamTest extends PHPUnit_Framework_TestCase
{
    protected static $Vnzh5r33esb0;

    public function setUp()
    {
        self::$Vnzh5r33esb0 = array(
            new Twig_Token(Twig_Token::TEXT_TYPE, 1, 1),
            new Twig_Token(Twig_Token::TEXT_TYPE, 2, 1),
            new Twig_Token(Twig_Token::TEXT_TYPE, 3, 1),
            new Twig_Token(Twig_Token::TEXT_TYPE, 4, 1),
            new Twig_Token(Twig_Token::TEXT_TYPE, 5, 1),
            new Twig_Token(Twig_Token::TEXT_TYPE, 6, 1),
            new Twig_Token(Twig_Token::TEXT_TYPE, 7, 1),
            new Twig_Token(Twig_Token::EOF_TYPE, 0, 1),
        );
    }

    public function testNext()
    {
        $Vxzcqmu3jtlz = new Twig_TokenStream(self::$Vnzh5r33esb0);
        $V4kzgsq5cmsu = array();
        while (!$Vxzcqmu3jtlz->isEOF()) {
            $Vchzzgk3uvsq = $Vxzcqmu3jtlz->next();

            $V4kzgsq5cmsu[] = $Vchzzgk3uvsq->getValue();
        }
        $this->assertEquals('1, 2, 3, 4, 5, 6, 7', implode(', ', $V4kzgsq5cmsu), '->next() advances the pointer and returns the current token');
    }

    
    public function testEndOfTemplateNext()
    {
        $Vxzcqmu3jtlz = new Twig_TokenStream(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, 1, 1),
        ));
        while (!$Vxzcqmu3jtlz->isEOF()) {
            $Vxzcqmu3jtlz->next();
        }
    }

    
    public function testEndOfTemplateLook()
    {
        $Vxzcqmu3jtlz = new Twig_TokenStream(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, 1, 1),
        ));
        while (!$Vxzcqmu3jtlz->isEOF()) {
            $Vxzcqmu3jtlz->look();
            $Vxzcqmu3jtlz->next();
        }
    }
}
