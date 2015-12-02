<?php
class Twig_Tests_TemplateTest extends PHPUnit_Framework_TestCase { public function testGetAttributeExceptions($spe32893, $sp9f2d02, $sp37bf87) { $sp3eec35 = 'index_' . ($sp37bf87 ? 1 : 0); $sp34ff74 = array($sp3eec35 => $spe32893 . $sp37bf87); $spf4b92b = new Twig_Environment(new Twig_Loader_Array($sp34ff74), array('strict_variables' => true)); if (!$sp37bf87) { $spf4b92b->addNodeVisitor(new CExtDisablingNodeVisitor()); } $spe32893 = $spf4b92b->loadTemplate($sp3eec35); $spdacfa9 = array('string' => 'foo', 'null' => null, 'empty_array' => array(), 'array' => array('foo' => 'foo'), 'array_access' => new Twig_TemplateArrayAccessObject(), 'magic_exception' => new Twig_TemplateMagicPropertyObjectWithException(), 'object' => new stdClass()); try { $spe32893->render($spdacfa9); $this->fail('Accessing an invalid attribute should throw an exception.'); } catch (Twig_Error_Runtime $spbcee8e) { $this->assertSame(sprintf($sp9f2d02, $sp3eec35), $spbcee8e->getMessage()); } } public function getAttributeExceptions() { $sp754928 = array(array('{{ string["a"] }}', 'Impossible to access a key ("a") on a string variable ("foo") in "%s" at line 1', false), array('{{ null["a"] }}', 'Impossible to access a key ("a") on a null variable in "%s" at line 1', false), array('{{ empty_array["a"] }}', 'Key "a" does not exist as the array is empty in "%s" at line 1', false), array('{{ array["a"] }}', 'Key "a" for array with keys "foo" does not exist in "%s" at line 1', false), array('{{ array_access["a"] }}', 'Key "a" in object with ArrayAccess of class "Twig_TemplateArrayAccessObject" does not exist in "%s" at line 1', false), array('{{ string.a }}', 'Impossible to access an attribute ("a") on a string variable ("foo") in "%s" at line 1', false), array('{{ string.a() }}', 'Impossible to invoke a method ("a") on a string variable ("foo") in "%s" at line 1', false), array('{{ null.a }}', 'Impossible to access an attribute ("a") on a null variable in "%s" at line 1', false), array('{{ null.a() }}', 'Impossible to invoke a method ("a") on a null variable in "%s" at line 1', false), array('{{ empty_array.a }}', 'Key "a" does not exist as the array is empty in "%s" at line 1', false), array('{{ array.a }}', 'Key "a" for array with keys "foo" does not exist in "%s" at line 1', false), array('{{ attribute(array, -10) }}', 'Key "-10" for array with keys "foo" does not exist in "%s" at line 1', false), array('{{ array_access.a }}', 'Method "a" for object "Twig_TemplateArrayAccessObject" does not exist in "%s" at line 1', false), array('{% macro foo(obj) %}{{ obj.missing_method() }}{% endmacro %}{{ _self.foo(array_access) }}', 'Method "missing_method" for object "Twig_TemplateArrayAccessObject" does not exist in "%s" at line 1', false), array('{{ magic_exception.test }}', 'An exception has been thrown during the rendering of a template ("Hey! Don\'t try to isset me!") in "%s" at line 1.', false), array('{{ object["a"] }}', 'Impossible to access a key "a" on an object of class "stdClass" that does not implement ArrayAccess interface in "%s" at line 1', false)); if (function_exists('twig_template_get_attributes')) { foreach (array_slice($sp754928, 0) as $sp26d1b4) { $sp26d1b4[2] = true; $sp754928[] = $sp26d1b4; } } return $sp754928; } public function testGetAttributeWithSandbox($sp941276, $spb437e7, $sp819100, $sp37bf87) { $speae043 = new Twig_Environment(); $sp16554e = new Twig_Sandbox_SecurityPolicy(array(), array(), array(), array(), array()); $speae043->addExtension(new Twig_Extension_Sandbox($sp16554e, !$sp819100)); $spe32893 = new Twig_TemplateTest($speae043, $sp37bf87); try { $spe32893->getAttribute($sp941276, $spb437e7, array(), 'any'); if (!$sp819100) { $this->fail(); } } catch (Twig_Sandbox_SecurityError $spbcee8e) { if ($sp819100) { $this->fail(); } $this->assertContains('is not allowed', $spbcee8e->getMessage()); } } public function getGetAttributeWithSandbox() { $sp754928 = array(array(new Twig_TemplatePropertyObject(), 'defined', false, false), array(new Twig_TemplatePropertyObject(), 'defined', true, false), array(new Twig_TemplateMethodObject(), 'defined', false, false), array(new Twig_TemplateMethodObject(), 'defined', true, false)); if (function_exists('twig_template_get_attributes')) { foreach (array_slice($sp754928, 0) as $sp26d1b4) { $sp26d1b4[3] = true; $sp754928[] = $sp26d1b4; } } return $sp754928; } public function testGetAttributeWithTemplateAsObject($sp37bf87) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(), $sp37bf87); $spb818e2 = new Twig_TemplateTest(new Twig_Environment(), false); $this->assertInstanceof('Twig_Markup', $spe32893->getAttribute($spb818e2, 'string')); $this->assertEquals('some_string', $spe32893->getAttribute($spb818e2, 'string')); $this->assertInstanceof('Twig_Markup', $spe32893->getAttribute($spb818e2, 'true')); $this->assertEquals('1', $spe32893->getAttribute($spb818e2, 'true')); $this->assertInstanceof('Twig_Markup', $spe32893->getAttribute($spb818e2, 'zero')); $this->assertEquals('0', $spe32893->getAttribute($spb818e2, 'zero')); $this->assertNotInstanceof('Twig_Markup', $spe32893->getAttribute($spb818e2, 'empty')); $this->assertSame('', $spe32893->getAttribute($spb818e2, 'empty')); } public function getGetAttributeWithTemplateAsObject() { $sp9a4d01 = array(array(false)); if (function_exists('twig_template_get_attributes')) { $sp9a4d01[] = array(true); } return $sp9a4d01; } public function testGetAttributeOnArrayWithConfusableKey($sp37bf87 = false) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(), $sp37bf87); $sp1d3170 = array('Zero', 'One', -1 => 'MinusOne', '' => 'EmptyString', '1.5' => 'FloatButString', '01' => 'IntegerButStringWithLeadingZeros'); $this->assertSame('Zero', $sp1d3170[false]); $this->assertSame('One', $sp1d3170[true]); $this->assertSame('One', $sp1d3170[1.5]); $this->assertSame('One', $sp1d3170['1']); $this->assertSame('MinusOne', $sp1d3170[-1.5]); $this->assertSame('FloatButString', $sp1d3170['1.5']); $this->assertSame('IntegerButStringWithLeadingZeros', $sp1d3170['01']); $this->assertSame('EmptyString', $sp1d3170[null]); $this->assertSame('Zero', $spe32893->getAttribute($sp1d3170, false), 'false is treated as 0 when accessing an array (equals PHP behavior)'); $this->assertSame('One', $spe32893->getAttribute($sp1d3170, true), 'true is treated as 1 when accessing an array (equals PHP behavior)'); $this->assertSame('One', $spe32893->getAttribute($sp1d3170, 1.5), 'float is casted to int when accessing an array (equals PHP behavior)'); $this->assertSame('One', $spe32893->getAttribute($sp1d3170, '1'), '"1" is treated as integer 1 when accessing an array (equals PHP behavior)'); $this->assertSame('MinusOne', $spe32893->getAttribute($sp1d3170, -1.5), 'negative float is casted to int when accessing an array (equals PHP behavior)'); $this->assertSame('FloatButString', $spe32893->getAttribute($sp1d3170, '1.5'), '"1.5" is treated as-is when accessing an array (equals PHP behavior)'); $this->assertSame('IntegerButStringWithLeadingZeros', $spe32893->getAttribute($sp1d3170, '01'), '"01" is treated as-is when accessing an array (equals PHP behavior)'); $this->assertSame('EmptyString', $spe32893->getAttribute($sp1d3170, null), 'null is treated as "" when accessing an array (equals PHP behavior)'); } public function getTestsDependingOnExtensionAvailability() { if (function_exists('twig_template_get_attributes')) { return array(array(false), array(true)); } return array(array(false)); } public function testGetAttribute($sp603000, $spbb4d96, $sp941276, $spb437e7, $spc5cc06, $sp32ff7e, $sp37bf87 = false) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(), $sp37bf87); $this->assertEquals($spbb4d96, $spe32893->getAttribute($sp941276, $spb437e7, $spc5cc06, $sp32ff7e)); } public function testGetAttributeStrict($sp603000, $spbb4d96, $sp941276, $spb437e7, $spc5cc06, $sp32ff7e, $sp37bf87 = false, $spf86409 = null) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(null, array('strict_variables' => true)), $sp37bf87); if ($sp603000) { $this->assertEquals($spbb4d96, $spe32893->getAttribute($sp941276, $spb437e7, $spc5cc06, $sp32ff7e)); } else { try { $this->assertEquals($spbb4d96, $spe32893->getAttribute($sp941276, $spb437e7, $spc5cc06, $sp32ff7e)); throw new Exception('Expected Twig_Error_Runtime exception.'); } catch (Twig_Error_Runtime $spbcee8e) { if (null !== $spf86409) { $this->assertSame($spf86409, $spbcee8e->getMessage()); } } } } public function testGetAttributeDefined($sp603000, $spbb4d96, $sp941276, $spb437e7, $spc5cc06, $sp32ff7e, $sp37bf87 = false) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(), $sp37bf87); $this->assertEquals($sp603000, $spe32893->getAttribute($sp941276, $spb437e7, $spc5cc06, $sp32ff7e, true)); } public function testGetAttributeDefinedStrict($sp603000, $spbb4d96, $sp941276, $spb437e7, $spc5cc06, $sp32ff7e, $sp37bf87 = false) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(null, array('strict_variables' => true)), $sp37bf87); $this->assertEquals($sp603000, $spe32893->getAttribute($sp941276, $spb437e7, $spc5cc06, $sp32ff7e, true)); } public function testGetAttributeCallExceptions($sp37bf87 = false) { $spe32893 = new Twig_TemplateTest(new Twig_Environment(), $sp37bf87); $sp941276 = new Twig_TemplateMagicMethodExceptionObject(); $this->assertNull($spe32893->getAttribute($sp941276, 'foo')); } public function getGetAttributeTests() { $sp1d3170 = array('defined' => 'defined', 'zero' => 0, 'null' => null, '1' => 1, 'bar' => true, '09' => '09', '+4' => '+4'); $sp7fd2c8 = new Twig_TemplateArrayAccessObject(); $sp6b7dfe = (object) $sp1d3170; $spe2a038 = new Twig_TemplateMagicPropertyObject(); $sp76a942 = new Twig_TemplatePropertyObject(); $spcc8f45 = new Twig_TemplatePropertyObjectAndIterator(); $sp8183f6 = new Twig_TemplatePropertyObjectAndArrayAccess(); $sp9aa668 = new Twig_TemplatePropertyObjectDefinedWithUndefinedValue(); $spe25b64 = new Twig_TemplateMethodObject(); $spd119da = new Twig_TemplateMagicMethodObject(); $spe89740 = Twig_Template::ANY_CALL; $spd5d33e = Twig_Template::METHOD_CALL; $sp26f05b = Twig_Template::ARRAY_CALL; $spe2e8ff = array(array(true, 'defined', 'defined'), array(false, null, 'undefined'), array(false, null, 'protected'), array(true, 0, 'zero'), array(true, 1, 1), array(true, 1, 1.0), array(true, null, 'null'), array(true, true, 'bar'), array(true, '09', '09'), array(true, '+4', '+4')); $sp0006e9 = array(array($sp1d3170, $sp26f05b), array($sp7fd2c8, $sp26f05b), array($sp6b7dfe, $spe89740), array($spe2a038, $spe89740), array($spe25b64, $spd5d33e), array($spe25b64, $spe89740), array($sp76a942, $spe89740), array($spcc8f45, $spe89740), array($sp8183f6, $spe89740)); $sp754928 = array(); foreach ($sp0006e9 as $sp3086ec) { foreach ($spe2e8ff as $sp26d1b4) { if (($sp3086ec[0] instanceof stdClass || $sp3086ec[0] instanceof Twig_TemplatePropertyObject) && is_numeric($sp26d1b4[2])) { continue; } if ('+4' === $sp26d1b4[2] && $spe25b64 === $sp3086ec[0]) { continue; } $sp754928[] = array($sp26d1b4[0], $sp26d1b4[1], $sp3086ec[0], $sp26d1b4[2], array(), $sp3086ec[1]); } } $sp754928 = array_merge($sp754928, array(array(true, null, $sp9aa668, 'foo', array(), $spe89740))); $sp754928 = array_merge($sp754928, array(array(true, 'defined', $spe25b64, 'defined', array(), $spd5d33e), array(true, 'defined', $spe25b64, 'DEFINED', array(), $spd5d33e), array(true, 'defined', $spe25b64, 'getDefined', array(), $spd5d33e), array(true, 'defined', $spe25b64, 'GETDEFINED', array(), $spd5d33e), array(true, 'static', $spe25b64, 'static', array(), $spd5d33e), array(true, 'static', $spe25b64, 'getStatic', array(), $spd5d33e), array(true, '__call_undefined', $spd119da, 'undefined', array(), $spd5d33e), array(true, '__call_UNDEFINED', $spd119da, 'UNDEFINED', array(), $spd5d33e))); foreach ($sp754928 as $sp26d1b4) { if ($spe89740 !== $sp26d1b4[5]) { $sp26d1b4[5] = $spe89740; $sp754928[] = $sp26d1b4; } } $spec1629 = new Twig_TemplateMethodAndPropObject(); $sp754928 = array_merge($sp754928, array(array(true, 'a', $spec1629, 'a', array(), $spe89740), array(true, 'a', $spec1629, 'a', array(), $spd5d33e), array(false, null, $spec1629, 'a', array(), $sp26f05b), array(true, 'b_prop', $spec1629, 'b', array(), $spe89740), array(true, 'b', $spec1629, 'B', array(), $spe89740), array(true, 'b', $spec1629, 'b', array(), $spd5d33e), array(true, 'b', $spec1629, 'B', array(), $spd5d33e), array(false, null, $spec1629, 'b', array(), $sp26f05b), array(false, null, $spec1629, 'c', array(), $spe89740), array(false, null, $spec1629, 'c', array(), $spd5d33e), array(false, null, $spec1629, 'c', array(), $sp26f05b))); $sp754928 = array_merge($sp754928, array(array(false, null, 42, 'a', array(), $spe89740, false, 'Impossible to access an attribute ("a") on a integer variable ("42")'), array(false, null, 'string', 'a', array(), $spe89740, false, 'Impossible to access an attribute ("a") on a string variable ("string")'), array(false, null, array(), 'a', array(), $spe89740, false, 'Key "a" does not exist as the array is empty'))); if (function_exists('twig_template_get_attributes')) { foreach (array_slice($sp754928, 0) as $sp26d1b4) { $sp26d1b4 = array_pad($sp26d1b4, 7, null); $sp26d1b4[6] = true; $sp754928[] = $sp26d1b4; } } return $sp754928; } } class Twig_TemplateTest extends Twig_Template { protected $useExtGetAttribute = false; public function __construct(Twig_Environment $spf4b92b, $spec142b = false) { parent::__construct($spf4b92b); $this->useExtGetAttribute = $spec142b; self::$cache = array(); } public function getZero() { return 0; } public function getEmpty() { return ''; } public function getString() { return 'some_string'; } public function getTrue() { return true; } public function getTemplateName() { } public function getDebugInfo() { return array(); } protected function doGetParent(array $spdacfa9) { } protected function doDisplay(array $spdacfa9, array $sp8696f5 = array()) { } public function getAttribute($sp941276, $spb437e7, array $spc5cc06 = array(), $sp32ff7e = Twig_Template::ANY_CALL, $sp5b25e3 = false, $spf0dacc = false) { if ($this->useExtGetAttribute) { return twig_template_get_attributes($this, $sp941276, $spb437e7, $spc5cc06, $sp32ff7e, $sp5b25e3, $spf0dacc); } else { return parent::getAttribute($sp941276, $spb437e7, $spc5cc06, $sp32ff7e, $sp5b25e3, $spf0dacc); } } } class Twig_TemplateArrayAccessObject implements ArrayAccess { protected $protected = 'protected'; public $attributes = array('defined' => 'defined', 'zero' => 0, 'null' => null, '1' => 1, 'bar' => true, '09' => '09', '+4' => '+4'); public function offsetExists($sp3eec35) { return array_key_exists($sp3eec35, $this->attributes); } public function offsetGet($sp3eec35) { return array_key_exists($sp3eec35, $this->attributes) ? $this->attributes[$sp3eec35] : null; } public function offsetSet($sp3eec35, $spbb4d96) { } public function offsetUnset($sp3eec35) { } } class Twig_TemplateMagicPropertyObject { public $defined = 'defined'; public $attributes = array('zero' => 0, 'null' => null, '1' => 1, 'bar' => true, '09' => '09', '+4' => '+4'); protected $protected = 'protected'; public function __isset($sp3eec35) { return array_key_exists($sp3eec35, $this->attributes); } public function __get($sp3eec35) { return array_key_exists($sp3eec35, $this->attributes) ? $this->attributes[$sp3eec35] : null; } } class Twig_TemplateMagicPropertyObjectWithException { public function __isset($spd888fc) { throw new Exception('Hey! Don\'t try to isset me!'); } } class Twig_TemplatePropertyObject { public $defined = 'defined'; public $zero = 0; public $null = null; public $bar = true; protected $protected = 'protected'; } class Twig_TemplatePropertyObjectAndIterator extends Twig_TemplatePropertyObject implements IteratorAggregate { public function getIterator() { return new ArrayIterator(array('foo', 'bar')); } } class Twig_TemplatePropertyObjectAndArrayAccess extends Twig_TemplatePropertyObject implements ArrayAccess { private $data = array(); public function offsetExists($sped1d3e) { return array_key_exists($sped1d3e, $this->data); } public function offsetGet($sped1d3e) { return $this->offsetExists($sped1d3e) ? $this->data[$sped1d3e] : 'n/a'; } public function offsetSet($sped1d3e, $spbb4d96) { } public function offsetUnset($sped1d3e) { } } class Twig_TemplatePropertyObjectDefinedWithUndefinedValue { public $foo; public function __construct() { $this->foo = @$sp58058a; } } class Twig_TemplateMethodObject { public function getDefined() { return 'defined'; } public function get1() { return 1; } public function get09() { return '09'; } public function getZero() { return 0; } public function getNull() { } public function isBar() { return true; } protected function getProtected() { return 'protected'; } public static function getStatic() { return 'static'; } } class Twig_TemplateMethodAndPropObject { private $a = 'a_prop'; public function getA() { return 'a'; } public $b = 'b_prop'; public function getB() { return 'b'; } private $c = 'c_prop'; private function sp385c85() { return 'c'; } } class Twig_TemplateMagicMethodObject { public function __call($sp810c92, $spc5cc06) { return '__call_' . $sp810c92; } } class Twig_TemplateMagicMethodExceptionObject { public function __call($sp810c92, $spc5cc06) { throw new BadMethodCallException(sprintf('Unkown method %s', $sp810c92)); } } class CExtDisablingNodeVisitor implements Twig_NodeVisitorInterface { public function enterNode(Twig_NodeInterface $spcefb62, Twig_Environment $spf4b92b) { if ($spcefb62 instanceof Twig_Node_Expression_GetAttr) { $spcefb62->setAttribute('disable_c_ext', true); } return $spcefb62; } public function leaveNode(Twig_NodeInterface $spcefb62, Twig_Environment $spf4b92b) { return $spcefb62; } public function getPriority() { return 0; } }