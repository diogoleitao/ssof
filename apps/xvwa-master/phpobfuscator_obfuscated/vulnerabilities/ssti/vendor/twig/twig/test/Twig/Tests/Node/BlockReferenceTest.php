<?php
class Twig_Tests_Node_BlockReferenceTest extends Twig_Test_NodeTestCase { public function testConstructor() { $spcefb62 = new Twig_Node_BlockReference('foo', 1); $this->assertEquals('foo', $spcefb62->getAttribute('name')); } public function getTests() { return array(array(new Twig_Node_BlockReference('foo', 1), '// line 1
$this->displayBlock(\'foo\', $context, $blocks);')); } }