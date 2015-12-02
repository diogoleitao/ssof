<?php
class Twig_Tests_Extension_SandboxTest extends PHPUnit_Framework_TestCase { protected static $params, $templates; public function setUp() { self::$params = array('name' => 'Fabien', 'obj' => new FooObject(), 'arr' => array('obj' => new FooObject())); self::$templates = array('1_basic1' => '{{ obj.foo }}', '1_basic2' => '{{ name|upper }}', '1_basic3' => '{% if name %}foo{% endif %}', '1_basic4' => '{{ obj.bar }}', '1_basic5' => '{{ obj }}', '1_basic6' => '{{ arr.obj }}', '1_basic7' => '{{ cycle(["foo","bar"], 1) }}', '1_basic8' => '{{ obj.getfoobar }}{{ obj.getFooBar }}', '1_basic9' => '{{ obj.foobar }}{{ obj.fooBar }}', '1_basic' => '{% if obj.foo %}{{ obj.foo|upper }}{% endif %}', '1_layout' => '{% block content %}{% endblock %}', '1_child' => '{% extends "1_layout" %}
{% block content %}
{{ "a"|json_encode }}
{% endblock %}'); } public function testSandboxWithInheritance() { $speae043 = $this->getEnvironment(true, array(), self::$templates, array('block')); $speae043->loadTemplate('1_child')->render(array()); } public function testSandboxGloballySet() { $speae043 = $this->getEnvironment(false, array(), self::$templates); $this->assertEquals('FOO', $speae043->loadTemplate('1_basic')->render(self::$params), 'Sandbox does nothing if it is disabled globally'); $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic1')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed method is called'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic2')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed filter is called'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic3')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed tag is used in the template'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic4')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed property is called in the template'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic5')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed method (__toString()) is called in the template'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic6')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed method (__toString()) is called in the template'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('1_basic7')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception if an unallowed function is called in the template'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } $speae043 = $this->getEnvironment(true, array(), self::$templates, array(), array(), array('FooObject' => 'foo')); FooObject::reset(); $this->assertEquals('foo', $speae043->loadTemplate('1_basic1')->render(self::$params), 'Sandbox allow some methods'); $this->assertEquals(1, FooObject::$called['foo'], 'Sandbox only calls method once'); $speae043 = $this->getEnvironment(true, array(), self::$templates, array(), array(), array('FooObject' => '__toString')); FooObject::reset(); $this->assertEquals('foo', $speae043->loadTemplate('1_basic5')->render(self::$params), 'Sandbox allow some methods'); $this->assertEquals(1, FooObject::$called['__toString'], 'Sandbox only calls method once'); $speae043 = $this->getEnvironment(false, array(), self::$templates); FooObject::reset(); $this->assertEquals('foo', $speae043->loadTemplate('1_basic5')->render(self::$params), 'Sandbox allows __toString when sandbox disabled'); $this->assertEquals(1, FooObject::$called['__toString'], 'Sandbox only calls method once'); $speae043 = $this->getEnvironment(true, array(), self::$templates, array(), array('upper')); $this->assertEquals('FABIEN', $speae043->loadTemplate('1_basic2')->render(self::$params), 'Sandbox allow some filters'); $speae043 = $this->getEnvironment(true, array(), self::$templates, array('if')); $this->assertEquals('foo', $speae043->loadTemplate('1_basic3')->render(self::$params), 'Sandbox allow some tags'); $speae043 = $this->getEnvironment(true, array(), self::$templates, array(), array(), array(), array('FooObject' => 'bar')); $this->assertEquals('bar', $speae043->loadTemplate('1_basic4')->render(self::$params), 'Sandbox allow some properties'); $speae043 = $this->getEnvironment(true, array(), self::$templates, array(), array(), array(), array(), array('cycle')); $this->assertEquals('bar', $speae043->loadTemplate('1_basic7')->render(self::$params), 'Sandbox allow some functions'); foreach (array('getfoobar', 'getFoobar', 'getFooBar') as $sp3eec35) { $speae043 = $this->getEnvironment(true, array(), self::$templates, array(), array(), array('FooObject' => $sp3eec35)); FooObject::reset(); $this->assertEquals('foobarfoobar', $speae043->loadTemplate('1_basic8')->render(self::$params), 'Sandbox allow methods in a case-insensitive way'); $this->assertEquals(2, FooObject::$called['getFooBar'], 'Sandbox only calls method once'); $this->assertEquals('foobarfoobar', $speae043->loadTemplate('1_basic9')->render(self::$params), 'Sandbox allow methods via shortcut names (ie. without get/set)'); } } public function testSandboxLocallySetForAnInclude() { self::$templates = array('2_basic' => '{{ obj.foo }}{% include "2_included" %}{{ obj.foo }}', '2_included' => '{% if obj.foo %}{{ obj.foo|upper }}{% endif %}'); $speae043 = $this->getEnvironment(false, array(), self::$templates); $this->assertEquals('fooFOOfoo', $speae043->loadTemplate('2_basic')->render(self::$params), 'Sandbox does nothing if disabled globally and sandboxed not used for the include'); self::$templates = array('3_basic' => '{{ obj.foo }}{% sandbox %}{% include "3_included" %}{% endsandbox %}{{ obj.foo }}', '3_included' => '{% if obj.foo %}{{ obj.foo|upper }}{% endif %}'); $speae043 = $this->getEnvironment(true, array(), self::$templates); try { $speae043->loadTemplate('3_basic')->render(self::$params); $this->fail('Sandbox throws a SecurityError exception when the included file is sandboxed'); } catch (Twig_Sandbox_SecurityError $spbcee8e) { } } public function testMacrosInASandbox() { $speae043 = $this->getEnvironment(true, array('autoescape' => true), array('index' => '{%- import _self as macros %}

{%- macro test(text) %}<p>{{ text }}</p>{% endmacro %}

{{- macros.test(\'username\') }}'), array('macro', 'import'), array('escape')); $this->assertEquals('<p>username</p>', $speae043->loadTemplate('index')->render(array())); } protected function getEnvironment($spaff731, $sp44f03d, $sp34ff74, $sp53db34 = array(), $sp34c924 = array(), $sp2c061e = array(), $sp05be97 = array(), $spbe1c61 = array()) { $spdfb5a9 = new Twig_Loader_Array($sp34ff74); $speae043 = new Twig_Environment($spdfb5a9, array_merge(array('debug' => true, 'cache' => false, 'autoescape' => false), $sp44f03d)); $sp16554e = new Twig_Sandbox_SecurityPolicy($sp53db34, $sp34c924, $sp2c061e, $sp05be97, $spbe1c61); $speae043->addExtension(new Twig_Extension_Sandbox($sp16554e, $spaff731)); return $speae043; } } class FooObject { public static $called = array('__toString' => 0, 'foo' => 0, 'getFooBar' => 0); public $bar = 'bar'; public static function reset() { self::$called = array('__toString' => 0, 'foo' => 0, 'getFooBar' => 0); } public function __toString() { ++self::$called['__toString']; return 'foo'; } public function foo() { ++self::$called['foo']; return 'foo'; } public function getFooBar() { ++self::$called['getFooBar']; return 'foobar'; } }