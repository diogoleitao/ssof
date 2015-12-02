<?php
class Twig_Tests_NodeVisitor_OptimizerTest extends PHPUnit_Framework_TestCase { public function testRenderBlockOptimizer() { $spf4b92b = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false)); $sp8ec2ac = $spf4b92b->parse($spf4b92b->tokenize('{{ block("foo") }}', 'index')); $spcefb62 = $sp8ec2ac->getNode('body')->getNode(0); $this->assertEquals('Twig_Node_Expression_BlockReference', get_class($spcefb62)); $this->assertTrue($spcefb62->getAttribute('output')); } public function testRenderParentBlockOptimizer() { $spf4b92b = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false)); $sp8ec2ac = $spf4b92b->parse($spf4b92b->tokenize('{% extends "foo" %}{% block content %}{{ parent() }}{% endblock %}', 'index')); $spcefb62 = $sp8ec2ac->getNode('blocks')->getNode('content')->getNode(0)->getNode('body'); $this->assertEquals('Twig_Node_Expression_Parent', get_class($spcefb62)); $this->assertTrue($spcefb62->getAttribute('output')); } public function testRenderVariableBlockOptimizer() { if (PHP_VERSION_ID >= 50400) { return; } $spf4b92b = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false)); $sp8ec2ac = $spf4b92b->parse($spf4b92b->tokenize('{{ block(name|lower) }}', 'index')); $spcefb62 = $sp8ec2ac->getNode('body')->getNode(0)->getNode(1); $this->assertEquals('Twig_Node_Expression_BlockReference', get_class($spcefb62)); $this->assertTrue($spcefb62->getAttribute('output')); } public function testForOptimizer($spe32893, $spc4a4e4) { $spf4b92b = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false)); $sp8ec2ac = $spf4b92b->parse($spf4b92b->tokenize($spe32893, 'index')); foreach ($spc4a4e4 as $sp3ac180 => $sp095d42) { $this->assertTrue($this->checkForConfiguration($sp8ec2ac, $sp3ac180, $sp095d42), sprintf('variable %s is %soptimized', $sp3ac180, $sp095d42 ? 'not ' : '')); } } public function getTestsForForOptimizer() { return array(array('{% for i in foo %}{% endfor %}', array('i' => false)), array('{% for i in foo %}{{ loop.index }}{% endfor %}', array('i' => true)), array('{% for i in foo %}{% for j in foo %}{% endfor %}{% endfor %}', array('i' => false, 'j' => false)), array('{% for i in foo %}{% include "foo" %}{% endfor %}', array('i' => true)), array('{% for i in foo %}{% include "foo" only %}{% endfor %}', array('i' => false)), array('{% for i in foo %}{% include "foo" with { "foo": "bar" } only %}{% endfor %}', array('i' => false)), array('{% for i in foo %}{% include "foo" with { "foo": loop.index } only %}{% endfor %}', array('i' => true)), array('{% for i in foo %}{% for j in foo %}{{ loop.index }}{% endfor %}{% endfor %}', array('i' => false, 'j' => true)), array('{% for i in foo %}{% for j in foo %}{{ loop.parent.loop.index }}{% endfor %}{% endfor %}', array('i' => true, 'j' => true)), array('{% for i in foo %}{% set l = loop %}{% for j in foo %}{{ l.index }}{% endfor %}{% endfor %}', array('i' => true, 'j' => false)), array('{% for i in foo %}{% for j in foo %}{{ foo.parent.loop.index }}{% endfor %}{% endfor %}', array('i' => false, 'j' => false)), array('{% for i in foo %}{% for j in foo %}{{ loop["parent"].loop.index }}{% endfor %}{% endfor %}', array('i' => true, 'j' => true)), array('{% for i in foo %}{{ include("foo") }}{% endfor %}', array('i' => true)), array('{% for i in foo %}{{ include("foo", with_context = false) }}{% endfor %}', array('i' => false)), array('{% for i in foo %}{{ include("foo", with_context = true) }}{% endfor %}', array('i' => true)), array('{% for i in foo %}{{ include("foo", { "foo": "bar" }, with_context = false) }}{% endfor %}', array('i' => false)), array('{% for i in foo %}{{ include("foo", { "foo": loop.index }, with_context = false) }}{% endfor %}', array('i' => true))); } public function checkForConfiguration(Twig_NodeInterface $spcefb62 = null, $sp3ac180, $sp095d42) { if (null === $spcefb62) { return; } foreach ($spcefb62 as $sp96b41e) { if ($sp96b41e instanceof Twig_Node_For) { if ($sp3ac180 === $sp96b41e->getNode('value_target')->getAttribute('name')) { return $sp095d42 == $sp96b41e->getAttribute('with_loop'); } } $sp575a78 = $this->checkForConfiguration($sp96b41e, $sp3ac180, $sp095d42); if (null !== $sp575a78) { return $sp575a78; } } } }