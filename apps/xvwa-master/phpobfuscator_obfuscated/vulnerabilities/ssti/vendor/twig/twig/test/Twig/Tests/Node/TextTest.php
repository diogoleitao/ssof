<?php
class Twig_Tests_Node_TextTest extends Twig_Test_NodeTestCase { public function testConstructor() { $spcefb62 = new Twig_Node_Text('foo', 1); $this->assertEquals('foo', $spcefb62->getAttribute('data')); } public function getTests() { $sp754928 = array(); $sp754928[] = array(new Twig_Node_Text('foo', 1), '// line 1
echo "foo";'); return $sp754928; } }