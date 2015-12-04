<?php





function html()
{
    return 'foo';
}

class Twig_Tests_IntegrationTest extends Twig_Test_IntegrationTestCase
{
    public function getExtensions()
    {
        $V0w0sgsyygz2 = new Twig_Sandbox_SecurityPolicy(array(), array(), array(), array(), array());

        return array(
            new Twig_Extension_Debug(),
            new Twig_Extension_Sandbox($V0w0sgsyygz2, false),
            new Twig_Extension_StringLoader(),
            new TwigTestExtension(),
        );
    }

    public function getFixturesDir()
    {
        return dirname(__FILE__).'/Fixtures/';
    }
}

function test_foo($V2dijfr3ez0f = 'foo')
{
    return $V2dijfr3ez0f;
}

class TwigTestFoo implements Iterator
{
    const BAR_NAME = 'bar';

    public $Vprk44ft0spf = 0;
    public $V1qa5pz21ghc = array(1, 2);

    public function bar($Vc53qookrlqm = null, $Vy0bkyv023lo = null)
    {
        return 'bar'.($Vc53qookrlqm ? '_'.$Vc53qookrlqm : '').($Vy0bkyv023lo ? '-'.$Vy0bkyv023lo : '');
    }

    public function getFoo()
    {
        return 'foo';
    }

    public function getSelf()
    {
        return $this;
    }

    public function is()
    {
        return 'is';
    }

    public function in()
    {
        return 'in';
    }

    public function not()
    {
        return 'not';
    }

    public function strToLower($V2dijfr3ez0f)
    {
        return strtolower($V2dijfr3ez0f);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return 'a';
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }
}

class TwigTestTokenParser_§ extends Twig_TokenParser
{
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node_Print(new Twig_Node_Expression_Constant('§', -1), -1);
    }

    public function getTag()
    {
        return '§';
    }
}

class TwigTestExtension extends Twig_Extension
{
    public function getTokenParsers()
    {
        return array(
            new TwigTestTokenParser_§(),
        );
    }

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('§', array($this, '§Filter')),
            new Twig_SimpleFilter('escape_and_nl2br', array($this, 'escape_and_nl2br'), array('needs_environment' => true, 'is_safe' => array('html'))),
            new Twig_SimpleFilter('nl2br', array($this, 'nl2br'), array('pre_escape' => 'html', 'is_safe' => array('html'))),
            new Twig_SimpleFilter('escape_something', array($this, 'escape_something'), array('is_safe' => array('something'))),
            new Twig_SimpleFilter('preserves_safety', array($this, 'preserves_safety'), array('preserves_safety' => array('html'))),
            new Twig_SimpleFilter('*_path', array($this, 'dynamic_path')),
            new Twig_SimpleFilter('*_foo_*_bar', array($this, 'dynamic_foo')),
        );
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('§', array($this, '§Function')),
            new Twig_SimpleFunction('safe_br', array($this, 'br'), array('is_safe' => array('html'))),
            new Twig_SimpleFunction('unsafe_br', array($this, 'br')),
            new Twig_SimpleFunction('*_path', array($this, 'dynamic_path')),
            new Twig_SimpleFunction('*_foo_*_bar', array($this, 'dynamic_foo')),
        );
    }

    public function getTests()
    {
        return array(
            new Twig_SimpleTest('multi word', array($this, 'is_multi_word')),
        );
    }

    public function §Filter($V2dijfr3ez0f)
    {
        return "§{$V2dijfr3ez0f}§";
    }

    public function §Function($V2dijfr3ez0f)
    {
        return "§{$V2dijfr3ez0f}§";
    }

    
    public function escape_and_nl2br($Vx44ywczaw14, $V2dijfr3ez0f, $Vd0awqbqlaed = '<br />')
    {
        return $this->nl2br(twig_escape_filter($Vx44ywczaw14, $V2dijfr3ez0f, 'html'), $Vd0awqbqlaed);
    }

    
    public function nl2br($V2dijfr3ez0f, $Vd0awqbqlaed = '<br />')
    {
        
        
        return str_replace("\n", "$Vd0awqbqlaed\n", $V2dijfr3ez0f);
    }

    public function dynamic_path($Vg1ryhlr2zui, $Vcsi2wocrpxd)
    {
        return $Vg1ryhlr2zui.'/'.$Vcsi2wocrpxd;
    }

    public function dynamic_foo($Vp0wjf3opjpt, $Vpp3zeqdjqd2, $Vcsi2wocrpxd)
    {
        return $Vp0wjf3opjpt.'/'.$Vpp3zeqdjqd2.'/'.$Vcsi2wocrpxd;
    }

    public function escape_something($V2dijfr3ez0f)
    {
        return strtoupper($V2dijfr3ez0f);
    }

    public function preserves_safety($V2dijfr3ez0f)
    {
        return strtoupper($V2dijfr3ez0f);
    }

    public function br()
    {
        return '<br />';
    }

    public function is_multi_word($V2dijfr3ez0f)
    {
        return false !== strpos($V2dijfr3ez0f, ' ');
    }

    public function getName()
    {
        return 'integration_test';
    }
}
