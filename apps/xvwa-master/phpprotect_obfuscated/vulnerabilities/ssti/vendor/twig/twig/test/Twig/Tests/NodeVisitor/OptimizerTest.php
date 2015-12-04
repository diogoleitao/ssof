<?php


class Twig_Tests_NodeVisitor_OptimizerTest extends PHPUnit_Framework_TestCase
{
    public function testRenderBlockOptimizer()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));

        $Vxzcqmu3jtlz = $Vx44ywczaw14->parse($Vx44ywczaw14->tokenize('{{ block("foo") }}', 'index'));

        $Vz3fbiqci0vl = $Vxzcqmu3jtlz->getNode('body')->getNode(0);

        $this->assertEquals('Twig_Node_Expression_BlockReference', get_class($Vz3fbiqci0vl));
        $this->assertTrue($Vz3fbiqci0vl->getAttribute('output'));
    }

    public function testRenderParentBlockOptimizer()
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));

        $Vxzcqmu3jtlz = $Vx44ywczaw14->parse($Vx44ywczaw14->tokenize('{% extends "foo" %}{% block content %}{{ parent() }}{% endblock %}', 'index'));

        $Vz3fbiqci0vl = $Vxzcqmu3jtlz->getNode('blocks')->getNode('content')->getNode(0)->getNode('body');

        $this->assertEquals('Twig_Node_Expression_Parent', get_class($Vz3fbiqci0vl));
        $this->assertTrue($Vz3fbiqci0vl->getAttribute('output'));
    }

    public function testRenderVariableBlockOptimizer()
    {
        if (PHP_VERSION_ID >= 50400) {
            return;
        }

        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false, 'autoescape' => false));
        $Vxzcqmu3jtlz = $Vx44ywczaw14->parse($Vx44ywczaw14->tokenize('{{ block(name|lower) }}', 'index'));

        $Vz3fbiqci0vl = $Vxzcqmu3jtlz->getNode('body')->getNode(0)->getNode(1);

        $this->assertEquals('Twig_Node_Expression_BlockReference', get_class($Vz3fbiqci0vl));
        $this->assertTrue($Vz3fbiqci0vl->getAttribute('output'));
    }

    
    public function testForOptimizer($V4lif0h4bhru, $Vg5u1pvb2vvz)
    {
        $Vx44ywczaw14 = new Twig_Environment($this->getMock('Twig_LoaderInterface'), array('cache' => false));

        $Vxzcqmu3jtlz = $Vx44ywczaw14->parse($Vx44ywczaw14->tokenize($V4lif0h4bhru, 'index'));

        foreach ($Vg5u1pvb2vvz as $Vgf254heetji => $Va4ka23ptx3j) {
            $this->assertTrue($this->checkForConfiguration($Vxzcqmu3jtlz, $Vgf254heetji, $Va4ka23ptx3j), sprintf('variable %s is %soptimized', $Vgf254heetji, $Va4ka23ptx3j ? 'not ' : ''));
        }
    }

    public function getTestsForForOptimizer()
    {
        return array(
            array('{% for i in foo %}{% endfor %}', array('i' => false)),

            array('{% for i in foo %}{{ loop.index }}{% endfor %}', array('i' => true)),

            array('{% for i in foo %}{% for j in foo %}{% endfor %}{% endfor %}', array('i' => false, 'j' => false)),

            array('{% for i in foo %}{% include "foo" %}{% endfor %}', array('i' => true)),

            array('{% for i in foo %}{% include "foo" only %}{% endfor %}', array('i' => false)),

            array('{% for i in foo %}{% include "foo" with { "foo": "bar" } only %}{% endfor %}', array('i' => false)),

            array('{% for i in foo %}{% include "foo" with { "foo": loop.index } only %}{% endfor %}', array('i' => true)),

            array('{% for i in foo %}{% for j in foo %}{{ loop.index }}{% endfor %}{% endfor %}', array('i' => false, 'j' => true)),

            array('{% for i in foo %}{% for j in foo %}{{ loop.parent.loop.index }}{% endfor %}{% endfor %}', array('i' => true, 'j' => true)),

            array('{% for i in foo %}{% set l = loop %}{% for j in foo %}{{ l.index }}{% endfor %}{% endfor %}', array('i' => true, 'j' => false)),

            array('{% for i in foo %}{% for j in foo %}{{ foo.parent.loop.index }}{% endfor %}{% endfor %}', array('i' => false, 'j' => false)),

            array('{% for i in foo %}{% for j in foo %}{{ loop["parent"].loop.index }}{% endfor %}{% endfor %}', array('i' => true, 'j' => true)),

            array('{% for i in foo %}{{ include("foo") }}{% endfor %}', array('i' => true)),

            array('{% for i in foo %}{{ include("foo", with_context = false) }}{% endfor %}', array('i' => false)),

            array('{% for i in foo %}{{ include("foo", with_context = true) }}{% endfor %}', array('i' => true)),

            array('{% for i in foo %}{{ include("foo", { "foo": "bar" }, with_context = false) }}{% endfor %}', array('i' => false)),

            array('{% for i in foo %}{{ include("foo", { "foo": loop.index }, with_context = false) }}{% endfor %}', array('i' => true)),
        );
    }

    public function checkForConfiguration(Twig_NodeInterface $Vz3fbiqci0vl = null, $Vgf254heetji, $Va4ka23ptx3j)
    {
        if (null === $Vz3fbiqci0vl) {
            return;
        }

        foreach ($Vz3fbiqci0vl as $Vfuw514z1wy1) {
            if ($Vfuw514z1wy1 instanceof Twig_Node_For) {
                if ($Vgf254heetji === $Vfuw514z1wy1->getNode('value_target')->getAttribute('name')) {
                    return $Va4ka23ptx3j == $Vfuw514z1wy1->getAttribute('with_loop');
                }
            }

            $Vsuyucwnscju = $this->checkForConfiguration($Vfuw514z1wy1, $Vgf254heetji, $Va4ka23ptx3j);
            if (null !== $Vsuyucwnscju) {
                return $Vsuyucwnscju;
            }
        }
    }
}
