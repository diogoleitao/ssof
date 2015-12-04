<?php



class Twig_Tests_CompilerTest extends PHPUnit_Framework_TestCase
{
    public function testReprNumericValueWithLocale()
    {
        $V3hf0s3ktsxh = new Twig_Compiler(new Twig_Environment());

        $Vhzts1pnkyc2 = setlocale(LC_NUMERIC, 0);
        if (false === $Vhzts1pnkyc2) {
            $this->markTestSkipped('Your platform does not support locales.');
        }

        $Vbcjxjxwhwyt = array('fr_FR.UTF-8', 'fr_FR.UTF8', 'fr_FR.utf-8', 'fr_FR.utf8', 'French_France.1252');
        if (false === setlocale(LC_NUMERIC, $Vbcjxjxwhwyt)) {
            $this->markTestSkipped('Could not set any of required locales: '.implode(', ', $Vbcjxjxwhwyt));
        }

        $this->assertEquals('1.2', $V3hf0s3ktsxh->repr(1.2)->getSource());
        $this->assertContains('fr', strtolower(setlocale(LC_NUMERIC, 0)));

        setlocale(LC_NUMERIC, $Vhzts1pnkyc2);
    }
}
