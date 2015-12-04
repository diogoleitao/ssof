<?php


class Twig_Tests_ParserTest extends PHPUnit_Framework_TestCase
{
    
    public function testSetMacroThrowsExceptionOnReservedMethods()
    {
        $Vqfx20r3yfax = $this->getParser();
        $Vqfx20r3yfax->setMacro('display', $this->getMock('Twig_Node_Macro', array(), array(), '', null));
    }

    
    public function testUnknownTag()
    {
        $Vxzcqmu3jtlz = new Twig_TokenStream(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, '', 1),
            new Twig_Token(Twig_Token::NAME_TYPE, 'foo', 1),
            new Twig_Token(Twig_Token::BLOCK_END_TYPE, '', 1),
            new Twig_Token(Twig_Token::EOF_TYPE, '', 1),
        ));
        $Vqfx20r3yfax = new Twig_Parser(new Twig_Environment());
        $Vqfx20r3yfax->parse($Vxzcqmu3jtlz);
    }

    
    public function testFilterBodyNodes($Vnwi4l0dqwxp, $Vg5u1pvb2vvz)
    {
        $Vqfx20r3yfax = $this->getParser();

        $this->assertEquals($Vg5u1pvb2vvz, $Vqfx20r3yfax->filterBodyNodes($Vnwi4l0dqwxp));
    }

    public function getFilterBodyNodesData()
    {
        return array(
            array(
                new Twig_Node(array(new Twig_Node_Text('   ', 1))),
                new Twig_Node(array()),
            ),
            array(
                $Vnwi4l0dqwxp = new Twig_Node(array(new Twig_Node_Set(false, new Twig_Node(), new Twig_Node(), 1))),
                $Vnwi4l0dqwxp,
            ),
            array(
                $Vnwi4l0dqwxp = new Twig_Node(array(new Twig_Node_Set(true, new Twig_Node(), new Twig_Node(array(new Twig_Node(array(new Twig_Node_Text('foo', 1))))), 1))),
                $Vnwi4l0dqwxp,
            ),
        );
    }

    
    public function testFilterBodyNodesThrowsException($Vnwi4l0dqwxp)
    {
        $Vqfx20r3yfax = $this->getParser();

        $Vqfx20r3yfax->filterBodyNodes($Vnwi4l0dqwxp);
    }

    public function getFilterBodyNodesDataThrowsException()
    {
        return array(
            array(new Twig_Node_Text('foo', 1)),
            array(new Twig_Node(array(new Twig_Node(array(new Twig_Node_Text('foo', 1)))))),
        );
    }

    
    public function testFilterBodyNodesWithBOM()
    {
        $Vqfx20r3yfax = $this->getParser();
        $Vqfx20r3yfax->filterBodyNodes(new Twig_Node_Text(chr(0xEF).chr(0xBB).chr(0xBF), 1));
    }

    public function testParseIsReentrant()
    {
        $V2cppyqdygng = new Twig_Environment(null, array(
            'autoescape' => false,
            'optimizations' => 0,
        ));
        $V2cppyqdygng->addTokenParser(new TestTokenParser());

        $Vqfx20r3yfax = new Twig_Parser($V2cppyqdygng);

        $Vqfx20r3yfax->parse(new Twig_TokenStream(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, '', 1),
            new Twig_Token(Twig_Token::NAME_TYPE, 'test', 1),
            new Twig_Token(Twig_Token::BLOCK_END_TYPE, '', 1),
            new Twig_Token(Twig_Token::VAR_START_TYPE, '', 1),
            new Twig_Token(Twig_Token::NAME_TYPE, 'foo', 1),
            new Twig_Token(Twig_Token::VAR_END_TYPE, '', 1),
            new Twig_Token(Twig_Token::EOF_TYPE, '', 1),
        )));

        $this->assertNull($Vqfx20r3yfax->getParent());
    }

    
    
    
    public function testGetVarName()
    {
        $V2cppyqdygng = new Twig_Environment(null, array(
            'autoescape' => false,
            'optimizations' => 0,
        ));

        $V2cppyqdygng->parse($V2cppyqdygng->tokenize(<<<EOF
{% from _self import foo %}

{% macro foo() %}
    {{ foo }}
{% endmacro %}
EOF
        ));
    }

    protected function getParser()
    {
        $Vqfx20r3yfax = new TestParser(new Twig_Environment());
        $Vqfx20r3yfax->setParent(new Twig_Node());
        $Vqfx20r3yfax->stream = $this->getMockBuilder('Twig_TokenStream')->disableOriginalConstructor()->getMock();

        return $Vqfx20r3yfax;
    }
}

class TestParser extends Twig_Parser
{
    public $Vxzcqmu3jtlz;

    public function filterBodyNodes(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        return parent::filterBodyNodes($Vz3fbiqci0vl);
    }
}

class TestTokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $Vchzzgk3uvsq)
    {
        
        $this->parser->parse(new Twig_TokenStream(array(
            new Twig_Token(Twig_Token::BLOCK_START_TYPE, '', 1),
            new Twig_Token(Twig_Token::NAME_TYPE, 'extends', 1),
            new Twig_Token(Twig_Token::STRING_TYPE, 'base', 1),
            new Twig_Token(Twig_Token::BLOCK_END_TYPE, '', 1),
            new Twig_Token(Twig_Token::EOF_TYPE, '', 1),
        )));

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new Twig_Node(array());
    }

    public function getTag()
    {
        return 'test';
    }
}
