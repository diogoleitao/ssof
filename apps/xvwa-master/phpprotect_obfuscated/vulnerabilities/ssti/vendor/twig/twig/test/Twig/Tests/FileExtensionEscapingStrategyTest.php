<?php



class Twig_Tests_FileExtensionEscapingStrategyTest extends PHPUnit_Framework_TestCase
{
    
    public function testGuess($Vjaap0zbgwrd, $V2npxty0bmys)
    {
        $this->assertEquals($Vjaap0zbgwrd, Twig_FileExtensionEscapingStrategy::guess($V2npxty0bmys));
    }

    public function getGuessData()
    {
        return array(
            
            array('html', 'foo.html'),
            array('html', 'foo.html.twig'),
            array('html', 'foo'),
            array('html', 'foo.bar.twig'),
            array('html', 'foo.txt/foo'),
            array('html', 'foo.txt/foo.js/'),

            
            array('css', 'foo.css'),
            array('css', 'foo.css.twig'),
            array('css', 'foo.twig.css'),

            
            array('js', 'foo.js'),
            array('js', 'foo.js.twig'),
            array('js', 'foo.txt/foo.js'),
            array('js', 'foo.txt.twig/foo.js'),

            
            array(false, 'foo.txt'),
            array(false, 'foo.txt.twig'),
        );
    }
}
