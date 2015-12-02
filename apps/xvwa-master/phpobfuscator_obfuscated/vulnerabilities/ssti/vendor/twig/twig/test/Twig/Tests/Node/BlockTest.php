<?php
class Twig_Tests_Node_BlockTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp1965de = new Twig_Node_Text('foo', 1); $spcefb62 = new Twig_Node_Block('foo', $sp1965de, 1); $this->assertEquals($sp1965de, $spcefb62->getNode('body')); $this->assertEquals('foo', $spcefb62->getAttribute('name')); } public function getTests() { $sp1965de = new Twig_Node_Text('foo', 1); $spcefb62 = new Twig_Node_Block('foo', $sp1965de, 1); return array(array($spcefb62, '// line 1
public function block_foo($context, array $blocks = array())
{
    echo "foo";
}')); } }