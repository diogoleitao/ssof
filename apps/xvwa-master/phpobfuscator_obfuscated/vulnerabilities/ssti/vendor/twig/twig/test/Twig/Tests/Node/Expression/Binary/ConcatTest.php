<?php
class Twig_Tests_Node_Expression_Binary_ConcatTest extends Twig_Test_NodeTestCase { public function testConstructor() { $spf7d4a5 = new Twig_Node_Expression_Constant(1, 1); $spd6e19c = new Twig_Node_Expression_Constant(2, 1); $spcefb62 = new Twig_Node_Expression_Binary_Concat($spf7d4a5, $spd6e19c, 1); $this->assertEquals($spf7d4a5, $spcefb62->getNode('left')); $this->assertEquals($spd6e19c, $spcefb62->getNode('right')); } public function getTests() { $spf7d4a5 = new Twig_Node_Expression_Constant(1, 1); $spd6e19c = new Twig_Node_Expression_Constant(2, 1); $spcefb62 = new Twig_Node_Expression_Binary_Concat($spf7d4a5, $spd6e19c, 1); return array(array($spcefb62, '(1 . 2)')); } }