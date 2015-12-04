<?php



class Twig_Tests_Extension_CoreTest extends PHPUnit_Framework_TestCase
{
    
    public function testRandomFunction($V2dijfr3ez0f, $Vll3cgs101bc)
    {
        $Vx44ywczaw14 = new Twig_Environment();

        for ($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf < 100; ++$Vh3cz3bzejsf) {
            $this->assertTrue(in_array(twig_random($Vx44ywczaw14, $V2dijfr3ez0f), $Vll3cgs101bc, true)); 
        }
    }

    public function getRandomFunctionTestData()
    {
        return array(
            array(
                array('apple', 'orange', 'citrus'),
                array('apple', 'orange', 'citrus'),
            ),
            array(
                new ArrayObject(array('apple', 'orange', 'citrus')),
                array('apple', 'orange', 'citrus'),
            ),
            array(
                'Ä€é',
                array('Ä', '€', 'é'),
            ),
            array(
                '123',
                array('1', '2', '3'),
            ),
            array(
                5,
                range(0, 5, 1),
            ),
            array(
                5.9,
                range(0, 5, 1),
            ),
            array(
                -2,
                array(0, -1, -2),
            ),
        );
    }

    public function testRandomFunctionWithoutParameter()
    {
        $Vrqhbimwy421 = mt_getrandmax();

        for ($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf < 100; ++$Vh3cz3bzejsf) {
            $Vrztr1e5nak4 = twig_random(new Twig_Environment());
            $this->assertTrue(is_int($Vrztr1e5nak4) && $Vrztr1e5nak4 >= 0 && $Vrztr1e5nak4 <= $Vrqhbimwy421);
        }
    }

    public function testRandomFunctionReturnsAsIs()
    {
        $this->assertSame('', twig_random(new Twig_Environment(), ''));
        $this->assertSame('', twig_random(new Twig_Environment(null, array('charset' => null)), ''));

        $Vh3cz3bzejsfnstance = new stdClass();
        $this->assertSame($Vh3cz3bzejsfnstance, twig_random(new Twig_Environment(), $Vh3cz3bzejsfnstance));
    }

    
    public function testRandomFunctionOfEmptyArrayThrowsException()
    {
        twig_random(new Twig_Environment(), array());
    }

    public function testRandomFunctionOnNonUTF8String()
    {
        if (!function_exists('iconv') && !function_exists('mb_convert_encoding')) {
            $this->markTestSkipped('needs iconv or mbstring');
        }

        $V2cppyqdygng = new Twig_Environment();
        $V2cppyqdygng->setCharset('ISO-8859-1');

        $Vw0qo11byuzr = twig_convert_encoding('Äé', 'ISO-8859-1', 'UTF-8');
        for ($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf < 30; ++$Vh3cz3bzejsf) {
            $Vvrgat52qwow = twig_random($V2cppyqdygng, $Vw0qo11byuzr);
            $this->assertTrue(in_array(twig_convert_encoding($Vvrgat52qwow, 'UTF-8', 'ISO-8859-1'), array('Ä', 'é'), true));
        }
    }

    public function testReverseFilterOnNonUTF8String()
    {
        if (!function_exists('iconv') && !function_exists('mb_convert_encoding')) {
            $this->markTestSkipped('needs iconv or mbstring');
        }

        $V2cppyqdygng = new Twig_Environment();
        $V2cppyqdygng->setCharset('ISO-8859-1');

        $Vh3cz3bzejsfnput = twig_convert_encoding('Äé', 'ISO-8859-1', 'UTF-8');
        $Vubzayalqgq4 = twig_convert_encoding(twig_reverse_filter($V2cppyqdygng, $Vh3cz3bzejsfnput), 'UTF-8', 'ISO-8859-1');

        $this->assertEquals($Vubzayalqgq4, 'éÄ');
    }

    public function testCustomEscaper()
    {
        $V2cppyqdygng = new Twig_Environment();
        $V2cppyqdygng->getExtension('core')->setEscaper('foo', 'foo_escaper_for_test');

        $this->assertEquals('fooUTF-8', twig_escape_filter($V2cppyqdygng, 'foo', 'foo'));
    }

    
    public function testUnknownCustomEscaper()
    {
        twig_escape_filter(new Twig_Environment(), 'foo', 'bar');
    }

    public function testTwigFirst()
    {
        $V2cppyqdygng = new Twig_Environment();
        $this->assertEquals('a', twig_first($V2cppyqdygng, 'abc'));
        $this->assertEquals(1, twig_first($V2cppyqdygng, array(1, 2, 3)));
        $this->assertSame('', twig_first($V2cppyqdygng, null));
        $this->assertSame('', twig_first($V2cppyqdygng, ''));
    }

    public function testTwigLast()
    {
        $V2cppyqdygng = new Twig_Environment();
        $this->assertEquals('c', twig_last($V2cppyqdygng, 'abc'));
        $this->assertEquals(3, twig_last($V2cppyqdygng, array(1, 2, 3)));
        $this->assertSame('', twig_last($V2cppyqdygng, null));
        $this->assertSame('', twig_last($V2cppyqdygng, ''));
    }
}

function foo_escaper_for_test(Twig_Environment $Vx44ywczaw14, $Viabwp03n3sk, $Vne0bkzg1krv)
{
    return $Viabwp03n3sk.$Vne0bkzg1krv;
}
