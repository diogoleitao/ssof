<?php
class Twig_Tests_Node_Expression_TestTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp005e3e = new Twig_Node_Expression_Constant('foo', 1); $sp3eec35 = new Twig_Node_Expression_Constant('null', 1); $spbd325e = new Twig_Node(); $spcefb62 = new Twig_Node_Expression_Test($sp005e3e, $sp3eec35, $spbd325e, 1); $this->assertEquals($sp005e3e, $spcefb62->getNode('node')); $this->assertEquals($spbd325e, $spcefb62->getNode('arguments')); $this->assertEquals($sp3eec35, $spcefb62->getAttribute('name')); } public function getTests() { $sp45f015 = new Twig_Environment(); $sp45f015->addTest(new Twig_SimpleTest('barbar', 'twig_tests_test_barbar', array('is_variadic' => true, 'need_context' => true))); $sp754928 = array(); $sp005e3e = new Twig_Node_Expression_Constant('foo', 1); $spcefb62 = new Twig_Node_Expression_Test_Null($sp005e3e, 'null', new Twig_Node(array()), 1); $sp754928[] = array($spcefb62, '(null === "foo")'); if (PHP_VERSION_ID >= 50300) { $spcefb62 = $this->createTest(new Twig_Node_Expression_Constant('foo', 1), 'anonymous', array(new Twig_Node_Expression_Constant('foo', 1))); $sp754928[] = array($spcefb62, 'call_user_func_array($this->env->getTest(\'anonymous\')->getCallable(), array("foo", "foo"))'); } $spa62ef5 = new Twig_Node_Expression_Constant('abc', 1); $spcefb62 = $this->createTest($spa62ef5, 'barbar'); $sp754928[] = array($spcefb62, 'twig_tests_test_barbar("abc")', $sp45f015); $spcefb62 = $this->createTest($spa62ef5, 'barbar', array('foo' => new Twig_Node_Expression_Constant('bar', 1))); $sp754928[] = array($spcefb62, 'twig_tests_test_barbar("abc", null, null, array("foo" => "bar"))', $sp45f015); $spcefb62 = $this->createTest($spa62ef5, 'barbar', array('arg2' => new Twig_Node_Expression_Constant('bar', 1))); $sp754928[] = array($spcefb62, 'twig_tests_test_barbar("abc", null, "bar")', $sp45f015); $spcefb62 = $this->createTest($spa62ef5, 'barbar', array(new Twig_Node_Expression_Constant('1', 1), new Twig_Node_Expression_Constant('2', 1), new Twig_Node_Expression_Constant('3', 1), 'foo' => new Twig_Node_Expression_Constant('bar', 1))); $sp754928[] = array($spcefb62, 'twig_tests_test_barbar("abc", "1", "2", array(0 => "3", "foo" => "bar"))', $sp45f015); return $sp754928; } protected function createTest($spcefb62, $sp3eec35, array $spc5cc06 = array()) { return new Twig_Node_Expression_Test($spcefb62, $sp3eec35, new Twig_Node($spc5cc06), 1); } protected function getEnvironment() { if (PHP_VERSION_ID >= 50300) { return include 'PHP53/TestInclude.php'; } return parent::getEnvironment(); } } function twig_tests_test_barbar($spa62ef5, $spf21892 = null, $sp12c685 = null, array $spbd325e = array()) { }