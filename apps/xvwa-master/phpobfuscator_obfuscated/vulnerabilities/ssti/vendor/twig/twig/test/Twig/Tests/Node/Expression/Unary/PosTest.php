<?php
class Twig_Tests_Node_Expression_Unary_PosTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp005e3e = new Twig_Node_Expression_Constant(1, 1); $spcefb62 = new Twig_Node_Expression_Unary_Pos($sp005e3e, 1); $this->assertEquals($sp005e3e, $spcefb62->getNode('node')); } public function getTests() { $spcefb62 = new Twig_Node_Expression_Constant(1, 1); $spcefb62 = new Twig_Node_Expression_Unary_Pos($spcefb62, 1); return array(array($spcefb62, '+1')); } }