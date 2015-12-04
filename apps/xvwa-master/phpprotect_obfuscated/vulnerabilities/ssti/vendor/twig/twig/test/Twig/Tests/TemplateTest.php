<?php


class Twig_Tests_TemplateTest extends PHPUnit_Framework_TestCase
{
    
    public function testGetAttributeExceptions($V4lif0h4bhru, $Vnpz33gb3cxs, $Vdpigwq4kriq)
    {
        $Vkkm4e2vaxrv = 'index_'.($Vdpigwq4kriq ? 1 : 0);
        $V4lif0h4bhrus = array(
            $Vkkm4e2vaxrv => $V4lif0h4bhru.$Vdpigwq4kriq, 
        );

        $Vx44ywczaw14 = new Twig_Environment(new Twig_Loader_Array($V4lif0h4bhrus), array('strict_variables' => true));
        if (!$Vdpigwq4kriq) {
            $Vx44ywczaw14->addNodeVisitor(new CExtDisablingNodeVisitor());
        }
        $V4lif0h4bhru = $Vx44ywczaw14->loadTemplate($Vkkm4e2vaxrv);

        $Vhmvn2c55ghv = array(
            'string' => 'foo',
            'null' => null,
            'empty_array' => array(),
            'array' => array('foo' => 'foo'),
            'array_access' => new Twig_TemplateArrayAccessObject(),
            'magic_exception' => new Twig_TemplateMagicPropertyObjectWithException(),
            'object' => new stdClass(),
        );

        try {
            $V4lif0h4bhru->render($Vhmvn2c55ghv);
            $this->fail('Accessing an invalid attribute should throw an exception.');
        } catch (Twig_Error_Runtime $Vawjopoun3xn) {
            $this->assertSame(sprintf($Vnpz33gb3cxs, $Vkkm4e2vaxrv), $Vawjopoun3xn->getMessage());
        }
    }

    public function getAttributeExceptions()
    {
        $V512ofmho3mi = array(
            array('{{ string["a"] }}', 'Impossible to access a key ("a") on a string variable ("foo") in "%s" at line 1', false),
            array('{{ null["a"] }}', 'Impossible to access a key ("a") on a null variable in "%s" at line 1', false),
            array('{{ empty_array["a"] }}', 'Key "a" does not exist as the array is empty in "%s" at line 1', false),
            array('{{ array["a"] }}', 'Key "a" for array with keys "foo" does not exist in "%s" at line 1', false),
            array('{{ array_access["a"] }}', 'Key "a" in object with ArrayAccess of class "Twig_TemplateArrayAccessObject" does not exist in "%s" at line 1', false),
            array('{{ string.a }}', 'Impossible to access an attribute ("a") on a string variable ("foo") in "%s" at line 1', false),
            array('{{ string.a() }}', 'Impossible to invoke a method ("a") on a string variable ("foo") in "%s" at line 1', false),
            array('{{ null.a }}', 'Impossible to access an attribute ("a") on a null variable in "%s" at line 1', false),
            array('{{ null.a() }}', 'Impossible to invoke a method ("a") on a null variable in "%s" at line 1', false),
            array('{{ empty_array.a }}', 'Key "a" does not exist as the array is empty in "%s" at line 1', false),
            array('{{ array.a }}', 'Key "a" for array with keys "foo" does not exist in "%s" at line 1', false),
            array('{{ attribute(array, -10) }}', 'Key "-10" for array with keys "foo" does not exist in "%s" at line 1', false),
            array('{{ array_access.a }}', 'Method "a" for object "Twig_TemplateArrayAccessObject" does not exist in "%s" at line 1', false),
            array('{% macro foo(obj) %}{{ obj.missing_method() }}{% endmacro %}{{ _self.foo(array_access) }}', 'Method "missing_method" for object "Twig_TemplateArrayAccessObject" does not exist in "%s" at line 1', false),
            array('{{ magic_exception.test }}', 'An exception has been thrown during the rendering of a template ("Hey! Don\'t try to isset me!") in "%s" at line 1.', false),
            array('{{ object["a"] }}', 'Impossible to access a key "a" on an object of class "stdClass" that does not implement ArrayAccess interface in "%s" at line 1', false),
        );

        if (function_exists('twig_template_get_attributes')) {
            foreach (array_slice($V512ofmho3mi, 0) as $Vaks55ym420e) {
                $Vaks55ym420e[2] = true;
                $V512ofmho3mi[] = $Vaks55ym420e;
            }
        }

        return $V512ofmho3mi;
    }

    
    public function testGetAttributeWithSandbox($Vu23r1opf0tb, $Vcsi2wocrpxd, $Vp1qvwk2ghzx, $Vdpigwq4kriq)
    {
        $V2cppyqdygng = new Twig_Environment();
        $V0w0sgsyygz2 = new Twig_Sandbox_SecurityPolicy(array(), array(), array(), array(), array());
        $V2cppyqdygng->addExtension(new Twig_Extension_Sandbox($V0w0sgsyygz2, !$Vp1qvwk2ghzx));
        $V4lif0h4bhru = new Twig_TemplateTest($V2cppyqdygng, $Vdpigwq4kriq);

        try {
            $V4lif0h4bhru->getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, array(), 'any');

            if (!$Vp1qvwk2ghzx) {
                $this->fail();
            }
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
            if ($Vp1qvwk2ghzx) {
                $this->fail();
            }

            $this->assertContains('is not allowed', $Vawjopoun3xn->getMessage());
        }
    }

    public function getGetAttributeWithSandbox()
    {
        $V512ofmho3mi = array(
            array(new Twig_TemplatePropertyObject(), 'defined', false, false),
            array(new Twig_TemplatePropertyObject(), 'defined', true, false),
            array(new Twig_TemplateMethodObject(), 'defined', false, false),
            array(new Twig_TemplateMethodObject(), 'defined', true, false),
        );

        if (function_exists('twig_template_get_attributes')) {
            foreach (array_slice($V512ofmho3mi, 0) as $Vaks55ym420e) {
                $Vaks55ym420e[3] = true;
                $V512ofmho3mi[] = $Vaks55ym420e;
            }
        }

        return $V512ofmho3mi;
    }

    
    public function testGetAttributeWithTemplateAsObject($Vdpigwq4kriq)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(new Twig_Environment(), $Vdpigwq4kriq);
        $V4lif0h4bhru1 = new Twig_TemplateTest(new Twig_Environment(), false);

        $this->assertInstanceof('Twig_Markup', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'string'));
        $this->assertEquals('some_string', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'string'));

        $this->assertInstanceof('Twig_Markup', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'true'));
        $this->assertEquals('1', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'true'));

        $this->assertInstanceof('Twig_Markup', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'zero'));
        $this->assertEquals('0', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'zero'));

        $this->assertNotInstanceof('Twig_Markup', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'empty'));
        $this->assertSame('', $V4lif0h4bhru->getAttribute($V4lif0h4bhru1, 'empty'));
    }

    public function getGetAttributeWithTemplateAsObject()
    {
        $Vja1uvorc2wu = array(
            array(false),
        );

        if (function_exists('twig_template_get_attributes')) {
            $Vja1uvorc2wu[] = array(true);
        }

        return $Vja1uvorc2wu;
    }

    
    public function testGetAttributeOnArrayWithConfusableKey($Vdpigwq4kriq = false)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(
            new Twig_Environment(),
            $Vdpigwq4kriq
        );

        $V1qa5pz21ghc = array('Zero', 'One', -1 => 'MinusOne', '' => 'EmptyString', '1.5' => 'FloatButString', '01' => 'IntegerButStringWithLeadingZeros');

        $this->assertSame('Zero', $V1qa5pz21ghc[false]);
        $this->assertSame('One', $V1qa5pz21ghc[true]);
        $this->assertSame('One', $V1qa5pz21ghc[1.5]);
        $this->assertSame('One', $V1qa5pz21ghc['1']);
        $this->assertSame('MinusOne', $V1qa5pz21ghc[-1.5]);
        $this->assertSame('FloatButString', $V1qa5pz21ghc['1.5']);
        $this->assertSame('IntegerButStringWithLeadingZeros', $V1qa5pz21ghc['01']);
        $this->assertSame('EmptyString', $V1qa5pz21ghc[null]);

        $this->assertSame('Zero', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, false), 'false is treated as 0 when accessing an array (equals PHP behavior)');
        $this->assertSame('One', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, true), 'true is treated as 1 when accessing an array (equals PHP behavior)');
        $this->assertSame('One', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, 1.5), 'float is casted to int when accessing an array (equals PHP behavior)');
        $this->assertSame('One', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, '1'), '"1" is treated as integer 1 when accessing an array (equals PHP behavior)');
        $this->assertSame('MinusOne', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, -1.5), 'negative float is casted to int when accessing an array (equals PHP behavior)');
        $this->assertSame('FloatButString', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, '1.5'), '"1.5" is treated as-is when accessing an array (equals PHP behavior)');
        $this->assertSame('IntegerButStringWithLeadingZeros', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, '01'), '"01" is treated as-is when accessing an array (equals PHP behavior)');
        $this->assertSame('EmptyString', $V4lif0h4bhru->getAttribute($V1qa5pz21ghc, null), 'null is treated as "" when accessing an array (equals PHP behavior)');
    }

    public function getTestsDependingOnExtensionAvailability()
    {
        if (function_exists('twig_template_get_attributes')) {
            return array(array(false), array(true));
        }

        return array(array(false));
    }

    
    public function testGetAttribute($Vmoex4dv3stf, $V2dijfr3ez0f, $Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, $Vdpigwq4kriq = false)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(new Twig_Environment(), $Vdpigwq4kriq);

        $this->assertEquals($V2dijfr3ez0f, $V4lif0h4bhru->getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu));
    }

    
    public function testGetAttributeStrict($Vmoex4dv3stf, $V2dijfr3ez0f, $Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, $Vdpigwq4kriq = false, $Vawjopoun3xnxceptionMessage = null)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(new Twig_Environment(null, array('strict_variables' => true)), $Vdpigwq4kriq);

        if ($Vmoex4dv3stf) {
            $this->assertEquals($V2dijfr3ez0f, $V4lif0h4bhru->getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu));
        } else {
            try {
                $this->assertEquals($V2dijfr3ez0f, $V4lif0h4bhru->getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu));

                throw new Exception('Expected Twig_Error_Runtime exception.');
            } catch (Twig_Error_Runtime $Vawjopoun3xn) {
                if (null !== $Vawjopoun3xnxceptionMessage) {
                    $this->assertSame($Vawjopoun3xnxceptionMessage, $Vawjopoun3xn->getMessage());
                }
            }
        }
    }

    
    public function testGetAttributeDefined($Vmoex4dv3stf, $V2dijfr3ez0f, $Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, $Vdpigwq4kriq = false)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(new Twig_Environment(), $Vdpigwq4kriq);

        $this->assertEquals($Vmoex4dv3stf, $V4lif0h4bhru->getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, true));
    }

    
    public function testGetAttributeDefinedStrict($Vmoex4dv3stf, $V2dijfr3ez0f, $Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, $Vdpigwq4kriq = false)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(new Twig_Environment(null, array('strict_variables' => true)), $Vdpigwq4kriq);

        $this->assertEquals($Vmoex4dv3stf, $V4lif0h4bhru->getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, true));
    }

    
    public function testGetAttributeCallExceptions($Vdpigwq4kriq = false)
    {
        $V4lif0h4bhru = new Twig_TemplateTest(new Twig_Environment(), $Vdpigwq4kriq);

        $Vu23r1opf0tb = new Twig_TemplateMagicMethodExceptionObject();

        $this->assertNull($V4lif0h4bhru->getAttribute($Vu23r1opf0tb, 'foo'));
    }

    public function getGetAttributeTests()
    {
        $V1qa5pz21ghc = array(
            'defined' => 'defined',
            'zero' => 0,
            'null' => null,
            '1' => 1,
            'bar' => true,
            '09' => '09',
            '+4' => '+4',
        );

        $Vu23r1opf0tbArray = new Twig_TemplateArrayAccessObject();
        $Veoubd5xnqjj = (object) $V1qa5pz21ghc;
        $V3mfdbot1wkr = new Twig_TemplateMagicPropertyObject();
        $Vlmzjkii4gyo = new Twig_TemplatePropertyObject();
        $Vlmzjkii4gyo1 = new Twig_TemplatePropertyObjectAndIterator();
        $Vlmzjkii4gyo2 = new Twig_TemplatePropertyObjectAndArrayAccess();
        $Vlmzjkii4gyo3 = new Twig_TemplatePropertyObjectDefinedWithUndefinedValue();
        $Veixixb4rzib = new Twig_TemplateMethodObject();
        $Vi2xgemnmkj3 = new Twig_TemplateMagicMethodObject();

        $Ve3nmuobbab1 = Twig_Template::ANY_CALL;
        $Vgutf132clxf = Twig_Template::METHOD_CALL;
        $V1qa5pz21ghcType = Twig_Template::ARRAY_CALL;

        $Vqwxlcfmzzln = array(
            
            array(true,  'defined', 'defined'),
            array(false, null,      'undefined'),
            array(false, null,      'protected'),
            array(true,  0,         'zero'),
            array(true,  1,         1),
            array(true,  1,         1.0),
            array(true,  null,      'null'),
            array(true,  true,      'bar'),
            array(true,  '09',      '09'),
            array(true,  '+4',      '+4'),
        );
        $Vaks55ym420eObjects = array(
            
            array($V1qa5pz21ghc,               $V1qa5pz21ghcType),
            array($Vu23r1opf0tbArray,         $V1qa5pz21ghcType),
            array($Veoubd5xnqjj,           $Ve3nmuobbab1),
            array($V3mfdbot1wkr, $Ve3nmuobbab1),
            array($Veixixb4rzib,        $Vgutf132clxf),
            array($Veixixb4rzib,        $Ve3nmuobbab1),
            array($Vlmzjkii4gyo,      $Ve3nmuobbab1),
            array($Vlmzjkii4gyo1,     $Ve3nmuobbab1),
            array($Vlmzjkii4gyo2,     $Ve3nmuobbab1),
        );

        $V512ofmho3mi = array();
        foreach ($Vaks55ym420eObjects as $Vaks55ym420eObject) {
            foreach ($Vqwxlcfmzzln as $Vaks55ym420e) {
                
                if (($Vaks55ym420eObject[0] instanceof stdClass || $Vaks55ym420eObject[0] instanceof Twig_TemplatePropertyObject) && is_numeric($Vaks55ym420e[2])) {
                    continue;
                }

                if ('+4' === $Vaks55ym420e[2] && $Veixixb4rzib === $Vaks55ym420eObject[0]) {
                    continue;
                }

                $V512ofmho3mi[] = array($Vaks55ym420e[0], $Vaks55ym420e[1], $Vaks55ym420eObject[0], $Vaks55ym420e[2], array(), $Vaks55ym420eObject[1]);
            }
        }

        
        $V512ofmho3mi = array_merge($V512ofmho3mi, array(
            array(true, null, $Vlmzjkii4gyo3, 'foo', array(), $Ve3nmuobbab1),
        ));

        
        $V512ofmho3mi = array_merge($V512ofmho3mi, array(
            array(true, 'defined', $Veixixb4rzib, 'defined',    array(), $Vgutf132clxf),
            array(true, 'defined', $Veixixb4rzib, 'DEFINED',    array(), $Vgutf132clxf),
            array(true, 'defined', $Veixixb4rzib, 'getDefined', array(), $Vgutf132clxf),
            array(true, 'defined', $Veixixb4rzib, 'GETDEFINED', array(), $Vgutf132clxf),
            array(true, 'static',  $Veixixb4rzib, 'static',     array(), $Vgutf132clxf),
            array(true, 'static',  $Veixixb4rzib, 'getStatic',  array(), $Vgutf132clxf),

            array(true, '__call_undefined', $Vi2xgemnmkj3, 'undefined', array(), $Vgutf132clxf),
            array(true, '__call_UNDEFINED', $Vi2xgemnmkj3, 'UNDEFINED', array(), $Vgutf132clxf),
        ));

        
        foreach ($V512ofmho3mi as $Vaks55ym420e) {
            if ($Ve3nmuobbab1 !== $Vaks55ym420e[5]) {
                $Vaks55ym420e[5] = $Ve3nmuobbab1;
                $V512ofmho3mi[] = $Vaks55ym420e;
            }
        }

        $Voltr0xmuvmg = new Twig_TemplateMethodAndPropObject();

        
        $V512ofmho3mi = array_merge($V512ofmho3mi, array(
            array(true, 'a', $Voltr0xmuvmg, 'a', array(), $Ve3nmuobbab1),
            array(true, 'a', $Voltr0xmuvmg, 'a', array(), $Vgutf132clxf),
            array(false, null, $Voltr0xmuvmg, 'a', array(), $V1qa5pz21ghcType),

            array(true, 'b_prop', $Voltr0xmuvmg, 'b', array(), $Ve3nmuobbab1),
            array(true, 'b', $Voltr0xmuvmg, 'B', array(), $Ve3nmuobbab1),
            array(true, 'b', $Voltr0xmuvmg, 'b', array(), $Vgutf132clxf),
            array(true, 'b', $Voltr0xmuvmg, 'B', array(), $Vgutf132clxf),
            array(false, null, $Voltr0xmuvmg, 'b', array(), $V1qa5pz21ghcType),

            array(false, null, $Voltr0xmuvmg, 'c', array(), $Ve3nmuobbab1),
            array(false, null, $Voltr0xmuvmg, 'c', array(), $Vgutf132clxf),
            array(false, null, $Voltr0xmuvmg, 'c', array(), $V1qa5pz21ghcType),

        ));

        
        $V512ofmho3mi = array_merge($V512ofmho3mi, array(
            array(false, null, 42, 'a', array(), $Ve3nmuobbab1, false, 'Impossible to access an attribute ("a") on a integer variable ("42")'),
            array(false, null, 'string', 'a', array(), $Ve3nmuobbab1, false, 'Impossible to access an attribute ("a") on a string variable ("string")'),
            array(false, null, array(), 'a', array(), $Ve3nmuobbab1, false, 'Key "a" does not exist as the array is empty'),
        ));

        

        if (function_exists('twig_template_get_attributes')) {
            foreach (array_slice($V512ofmho3mi, 0) as $Vaks55ym420e) {
                $Vaks55ym420e = array_pad($Vaks55ym420e, 7, null);
                $Vaks55ym420e[6] = true;
                $V512ofmho3mi[] = $Vaks55ym420e;
            }
        }

        return $V512ofmho3mi;
    }
}

class Twig_TemplateTest extends Twig_Template
{
    protected $Vdpigwq4kriqGetAttribute = false;

    public function __construct(Twig_Environment $Vx44ywczaw14, $Vdpigwq4kriqGetAttribute = false)
    {
        parent::__construct($Vx44ywczaw14);
        $this->useExtGetAttribute = $Vdpigwq4kriqGetAttribute;
        self::$Vcxwghl1fqnk = array();
    }

    public function getZero()
    {
        return 0;
    }

    public function getEmpty()
    {
        return '';
    }

    public function getString()
    {
        return 'some_string';
    }

    public function getTrue()
    {
        return true;
    }

    public function getTemplateName()
    {
    }

    public function getDebugInfo()
    {
        return array();
    }

    protected function doGetParent(array $Vhmvn2c55ghv)
    {
    }

    protected function doDisplay(array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array())
    {
    }

    public function getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, array $V02jggtj2kdh = array(), $Vtathfumoxhu = Twig_Template::ANY_CALL, $Vq0ls45yl4i4 = false, $Vglb5050dq5d = false)
    {
        if ($this->useExtGetAttribute) {
            return twig_template_get_attributes($this, $Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, $Vq0ls45yl4i4, $Vglb5050dq5d);
        } else {
            return parent::getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, $V02jggtj2kdh, $Vtathfumoxhu, $Vq0ls45yl4i4, $Vglb5050dq5d);
        }
    }
}

class Twig_TemplateArrayAccessObject implements ArrayAccess
{
    protected $Vhxwahhig5qp = 'protected';

    public $Vszrzh51wqf1 = array(
        'defined' => 'defined',
        'zero' => 0,
        'null' => null,
        '1' => 1,
        'bar' => true,
        '09' => '09',
        '+4' => '+4',
    );

    public function offsetExists($Vkkm4e2vaxrv)
    {
        return array_key_exists($Vkkm4e2vaxrv, $this->attributes);
    }

    public function offsetGet($Vkkm4e2vaxrv)
    {
        return array_key_exists($Vkkm4e2vaxrv, $this->attributes) ? $this->attributes[$Vkkm4e2vaxrv] : null;
    }

    public function offsetSet($Vkkm4e2vaxrv, $V2dijfr3ez0f)
    {
    }

    public function offsetUnset($Vkkm4e2vaxrv)
    {
    }
}

class Twig_TemplateMagicPropertyObject
{
    public $Vmoex4dv3stf = 'defined';

    public $Vszrzh51wqf1 = array(
        'zero' => 0,
        'null' => null,
        '1' => 1,
        'bar' => true,
        '09' => '09',
        '+4' => '+4',
    );

    protected $Vhxwahhig5qp = 'protected';

    public function __isset($Vkkm4e2vaxrv)
    {
        return array_key_exists($Vkkm4e2vaxrv, $this->attributes);
    }

    public function __get($Vkkm4e2vaxrv)
    {
        return array_key_exists($Vkkm4e2vaxrv, $this->attributes) ? $this->attributes[$Vkkm4e2vaxrv] : null;
    }
}

class Twig_TemplateMagicPropertyObjectWithException
{
    public function __isset($Vks5xpccznyi)
    {
        throw new Exception('Hey! Don\'t try to isset me!');
    }
}

class Twig_TemplatePropertyObject
{
    public $Vmoex4dv3stf = 'defined';
    public $Vp35j2nyhc2i = 0;
    public $Vxmuc5uag0rc = null;
    public $Vpp3zeqdjqd2 = true;

    protected $Vhxwahhig5qp = 'protected';
}

class Twig_TemplatePropertyObjectAndIterator extends Twig_TemplatePropertyObject implements IteratorAggregate
{
    public function getIterator()
    {
        return new ArrayIterator(array('foo', 'bar'));
    }
}

class Twig_TemplatePropertyObjectAndArrayAccess extends Twig_TemplatePropertyObject implements ArrayAccess
{
    private $V5ttrtwbrnmr = array();

    public function offsetExists($V4a3lwctfbe4)
    {
        return array_key_exists($V4a3lwctfbe4, $this->data);
    }

    public function offsetGet($V4a3lwctfbe4)
    {
        return $this->offsetExists($V4a3lwctfbe4) ? $this->data[$V4a3lwctfbe4] : 'n/a';
    }

    public function offsetSet($V4a3lwctfbe4, $V2dijfr3ez0f)
    {
    }

    public function offsetUnset($V4a3lwctfbe4)
    {
    }
}

class Twig_TemplatePropertyObjectDefinedWithUndefinedValue
{
    public $Vp0wjf3opjpt;

    public function __construct()
    {
        $this->foo = @$Vjnhr0vg24sv;
    }
}

class Twig_TemplateMethodObject
{
    public function getDefined()
    {
        return 'defined';
    }

    public function get1()
    {
        return 1;
    }

    public function get09()
    {
        return '09';
    }

    public function getZero()
    {
        return 0;
    }

    public function getNull()
    {
    }

    public function isBar()
    {
        return true;
    }

    protected function getProtected()
    {
        return 'protected';
    }

    public static function getStatic()
    {
        return 'static';
    }
}

class Twig_TemplateMethodAndPropObject
{
    private $Vk5gde0byujz = 'a_prop';
    public function getA()
    {
        return 'a';
    }

    public $Vkxzhjkxbjvx = 'b_prop';
    public function getB()
    {
        return 'b';
    }

    private $Vko3a3c0ndj4 = 'c_prop';
    private function getC()
    {
        return 'c';
    }
}

class Twig_TemplateMagicMethodObject
{
    public function __call($Vng2lb3h3obx, $V02jggtj2kdh)
    {
        return '__call_'.$Vng2lb3h3obx;
    }
}

class Twig_TemplateMagicMethodExceptionObject
{
    public function __call($Vng2lb3h3obx, $V02jggtj2kdh)
    {
        throw new BadMethodCallException(sprintf('Unkown method %s', $Vng2lb3h3obx));
    }
}

class CExtDisablingNodeVisitor implements Twig_NodeVisitorInterface
{
    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr) {
            $Vz3fbiqci0vl->setAttribute('disable_c_ext', true);
        }

        return $Vz3fbiqci0vl;
    }

    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        return $Vz3fbiqci0vl;
    }

    public function getPriority()
    {
        return 0;
    }
}
