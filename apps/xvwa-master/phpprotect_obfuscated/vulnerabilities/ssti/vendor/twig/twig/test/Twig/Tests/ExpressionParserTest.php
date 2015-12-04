<?php



class Twig_Tests_ExpressionParserTest extends PHPUnit_Framework_TestCase
{
    
    public function testCanOnlyAssignToNames($V4lif0h4bhru)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index'));
    }

    public function getFailingTestsForAssignment()
    {
        return array(
            array('{% set false = "foo" %}'),
            array('{% set true = "foo" %}'),
            array('{% set none = "foo" %}'),
            array('{% set 3 = "foo" %}'),
            array('{% set 1 + 2 = "foo" %}'),
            array('{% set "bar" = "foo" %}'),
            array('{% set %}{% endset %}'),
        );
    }

    
    public function testArrayExpression($V4lif0h4bhru, $Vg5u1pvb2vvz)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vxzcqmu3jtlz = $Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index');
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $this->assertEquals($Vg5u1pvb2vvz, $Vqfx20r3yfax->parse($Vxzcqmu3jtlz)->getNode('body')->getNode(0)->getNode('expr'));
    }

    
    public function testArraySyntaxError($V4lif0h4bhru)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index'));
    }

    public function getFailingTestsForArray()
    {
        return array(
            array('{{ [1, "a": "b"] }}'),
            array('{{ {"a": "b", 2} }}'),
        );
    }

    public function getTestsForArray()
    {
        return array(
            
            array('{{ [1, 2] }}', new Twig_Node_Expression_Array(array(
                  new Twig_Node_Expression_Constant(0, 1),
                  new Twig_Node_Expression_Constant(1, 1),

                  new Twig_Node_Expression_Constant(1, 1),
                  new Twig_Node_Expression_Constant(2, 1),
                ), 1),
            ),

            
            array('{{ [1, 2, ] }}', new Twig_Node_Expression_Array(array(
                  new Twig_Node_Expression_Constant(0, 1),
                  new Twig_Node_Expression_Constant(1, 1),

                  new Twig_Node_Expression_Constant(1, 1),
                  new Twig_Node_Expression_Constant(2, 1),
                ), 1),
            ),

            
            array('{{ {"a": "b", "b": "c"} }}', new Twig_Node_Expression_Array(array(
                  new Twig_Node_Expression_Constant('a', 1),
                  new Twig_Node_Expression_Constant('b', 1),

                  new Twig_Node_Expression_Constant('b', 1),
                  new Twig_Node_Expression_Constant('c', 1),
                ), 1),
            ),

            
            array('{{ {"a": "b", "b": "c", } }}', new Twig_Node_Expression_Array(array(
                  new Twig_Node_Expression_Constant('a', 1),
                  new Twig_Node_Expression_Constant('b', 1),

                  new Twig_Node_Expression_Constant('b', 1),
                  new Twig_Node_Expression_Constant('c', 1),
                ), 1),
            ),

            
            array('{{ [1, {"a": "b", "b": "c"}] }}', new Twig_Node_Expression_Array(array(
                  new Twig_Node_Expression_Constant(0, 1),
                  new Twig_Node_Expression_Constant(1, 1),

                  new Twig_Node_Expression_Constant(1, 1),
                  new Twig_Node_Expression_Array(array(
                        new Twig_Node_Expression_Constant('a', 1),
                        new Twig_Node_Expression_Constant('b', 1),

                        new Twig_Node_Expression_Constant('b', 1),
                        new Twig_Node_Expression_Constant('c', 1),
                      ), 1),
                ), 1),
            ),

            
            array('{{ {"a": [1, 2], "b": "c"} }}', new Twig_Node_Expression_Array(array(
                  new Twig_Node_Expression_Constant('a', 1),
                  new Twig_Node_Expression_Array(array(
                        new Twig_Node_Expression_Constant(0, 1),
                        new Twig_Node_Expression_Constant(1, 1),

                        new Twig_Node_Expression_Constant(1, 1),
                        new Twig_Node_Expression_Constant(2, 1),
                      ), 1),
                  new Twig_Node_Expression_Constant('b', 1),
                  new Twig_Node_Expression_Constant('c', 1),
                ), 1),
            ),
        );
    }

    
    public function testStringExpressionDoesNotConcatenateTwoConsecutiveStrings()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false, 'optimizations' => 0));
        $Vxzcqmu3jtlz = $Vx44ywczaw14->tokenize('{{ "a" "b" }}', 'index');
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vxzcqmu3jtlz);
    }

    
    public function testStringExpression($V4lif0h4bhru, $Vg5u1pvb2vvz)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false, 'optimizations' => 0));
        $Vxzcqmu3jtlz = $Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index');
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $this->assertEquals($Vg5u1pvb2vvz, $Vqfx20r3yfax->parse($Vxzcqmu3jtlz)->getNode('body')->getNode(0)->getNode('expr'));
    }

    public function getTestsForString()
    {
        return array(
            array(
                '{{ "foo" }}', new Twig_Node_Expression_Constant('foo', 1),
            ),
            array(
                '{{ "foo #{bar}" }}', new Twig_Node_Expression_Binary_Concat(
                    new Twig_Node_Expression_Constant('foo ', 1),
                    new Twig_Node_Expression_Name('bar', 1),
                    1
                ),
            ),
            array(
                '{{ "foo #{bar} baz" }}', new Twig_Node_Expression_Binary_Concat(
                    new Twig_Node_Expression_Binary_Concat(
                        new Twig_Node_Expression_Constant('foo ', 1),
                        new Twig_Node_Expression_Name('bar', 1),
                        1
                    ),
                    new Twig_Node_Expression_Constant(' baz', 1),
                    1
                ),
            ),

            array(
                '{{ "foo #{"foo #{bar} baz"} baz" }}', new Twig_Node_Expression_Binary_Concat(
                    new Twig_Node_Expression_Binary_Concat(
                        new Twig_Node_Expression_Constant('foo ', 1),
                        new Twig_Node_Expression_Binary_Concat(
                            new Twig_Node_Expression_Binary_Concat(
                                new Twig_Node_Expression_Constant('foo ', 1),
                                new Twig_Node_Expression_Name('bar', 1),
                                1
                            ),
                            new Twig_Node_Expression_Constant(' baz', 1),
                            1
                        ),
                        1
                    ),
                    new Twig_Node_Expression_Constant(' baz', 1),
                    1
                ),
            ),
        );
    }

    
    public function testAttributeCallDoesNotSupportNamedArguments()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize('{{ foo.bar(name="Foo") }}', 'index'));
    }

    
    public function testMacroCallDoesNotSupportNamedArguments()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize('{% from _self import foo %}{% macro foo() %}{% endmacro %}{{ foo(name="Foo") }}', 'index'));
    }

    
    public function testMacroDefinitionDoesNotSupportNonNameVariableName()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize('{% macro foo("a") %}{% endmacro %}', 'index'));
    }

    
    public function testMacroDefinitionDoesNotSupportNonConstantDefaultValues($V4lif0h4bhru)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index'));
    }

    public function getMacroDefinitionDoesNotSupportNonConstantDefaultValues()
    {
        return array(
            array('{% macro foo(name = "a #{foo} a") %}{% endmacro %}'),
            array('{% macro foo(name = [["b", "a #{foo} a"]]) %}{% endmacro %}'),
        );
    }

    
    public function testMacroDefinitionSupportsConstantDefaultValues($V4lif0h4bhru)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index'));
    }

    public function getMacroDefinitionSupportsConstantDefaultValues()
    {
        return array(
            array('{% macro foo(name = "aa") %}{% endmacro %}'),
            array('{% macro foo(name = 12) %}{% endmacro %}'),
            array('{% macro foo(name = true) %}{% endmacro %}'),
            array('{% macro foo(name = ["a"]) %}{% endmacro %}'),
            array('{% macro foo(name = [["a"]]) %}{% endmacro %}'),
            array('{% macro foo(name = {a: "a"}) %}{% endmacro %}'),
            array('{% macro foo(name = {a: {b: "a"}}) %}{% endmacro %}'),
        );
    }

    
    public function testUnknownFunction()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize('{{ cycl() }}', 'index'));
    }

    
    public function testUnknownFilter()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize('{{ 1|lowe }}', 'index'));
    }

    
    public function testUnknownTest()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vqfx20r3yfax = new Twig_Parser($Vx44ywczaw14);

        $Vqfx20r3yfax->parse($Vx44ywczaw14->tokenize('{{ 1 is nul }}', 'index'));
    }
}
