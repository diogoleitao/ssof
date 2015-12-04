<?php



class Twig_Tests_Extension_SandboxTest extends PHPUnit_Framework_TestCase
{
    protected static $Vgid132nc4mp, $Vc0vo4f1f0kv;

    public function setUp()
    {
        self::$Vgid132nc4mp = array(
            'name' => 'Fabien',
            'obj' => new FooObject(),
            'arr' => array('obj' => new FooObject()),
        );

        self::$Vc0vo4f1f0kv = array(
            '1_basic1' => '{{ obj.foo }}',
            '1_basic2' => '{{ name|upper }}',
            '1_basic3' => '{% if name %}foo{% endif %}',
            '1_basic4' => '{{ obj.bar }}',
            '1_basic5' => '{{ obj }}',
            '1_basic6' => '{{ arr.obj }}',
            '1_basic7' => '{{ cycle(["foo","bar"], 1) }}',
            '1_basic8' => '{{ obj.getfoobar }}{{ obj.getFooBar }}',
            '1_basic9' => '{{ obj.foobar }}{{ obj.fooBar }}',
            '1_basic' => '{% if obj.foo %}{{ obj.foo|upper }}{% endif %}',
            '1_layout' => '{% block content %}{% endblock %}',
            '1_child' => "{% extends \"1_layout\" %}\n{% block content %}\n{{ \"a\"|json_encode }}\n{% endblock %}",
        );
    }

    
    public function testSandboxWithInheritance()
    {
        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array('block'));
        $V2cppyqdygng->loadTemplate('1_child')->render(array());
    }

    public function testSandboxGloballySet()
    {
        $V2cppyqdygng = $this->getEnvironment(false, array(), self::$Vc0vo4f1f0kv);
        $this->assertEquals('FOO', $V2cppyqdygng->loadTemplate('1_basic')->render(self::$Vgid132nc4mp), 'Sandbox does nothing if it is disabled globally');

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic1')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed method is called');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic2')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed filter is called');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic3')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed tag is used in the template');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic4')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed property is called in the template');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic5')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed method (__toString()) is called in the template');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic6')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed method (__toString()) is called in the template');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('1_basic7')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception if an unallowed function is called in the template');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array(), array(), array('FooObject' => 'foo'));
        FooObject::reset();
        $this->assertEquals('foo', $V2cppyqdygng->loadTemplate('1_basic1')->render(self::$Vgid132nc4mp), 'Sandbox allow some methods');
        $this->assertEquals(1, FooObject::$Vebcfwbgpbnl['foo'], 'Sandbox only calls method once');

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array(), array(), array('FooObject' => '__toString'));
        FooObject::reset();
        $this->assertEquals('foo', $V2cppyqdygng->loadTemplate('1_basic5')->render(self::$Vgid132nc4mp), 'Sandbox allow some methods');
        $this->assertEquals(1, FooObject::$Vebcfwbgpbnl['__toString'], 'Sandbox only calls method once');

        $V2cppyqdygng = $this->getEnvironment(false, array(), self::$Vc0vo4f1f0kv);
        FooObject::reset();
        $this->assertEquals('foo', $V2cppyqdygng->loadTemplate('1_basic5')->render(self::$Vgid132nc4mp), 'Sandbox allows __toString when sandbox disabled');
        $this->assertEquals(1, FooObject::$Vebcfwbgpbnl['__toString'], 'Sandbox only calls method once');

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array(), array('upper'));
        $this->assertEquals('FABIEN', $V2cppyqdygng->loadTemplate('1_basic2')->render(self::$Vgid132nc4mp), 'Sandbox allow some filters');

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array('if'));
        $this->assertEquals('foo', $V2cppyqdygng->loadTemplate('1_basic3')->render(self::$Vgid132nc4mp), 'Sandbox allow some tags');

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array(), array(), array(), array('FooObject' => 'bar'));
        $this->assertEquals('bar', $V2cppyqdygng->loadTemplate('1_basic4')->render(self::$Vgid132nc4mp), 'Sandbox allow some properties');

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array(), array(), array(), array(), array('cycle'));
        $this->assertEquals('bar', $V2cppyqdygng->loadTemplate('1_basic7')->render(self::$Vgid132nc4mp), 'Sandbox allow some functions');

        foreach (array('getfoobar', 'getFoobar', 'getFooBar') as $Vkkm4e2vaxrv) {
            $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv, array(), array(), array('FooObject' => $Vkkm4e2vaxrv));
            FooObject::reset();
            $this->assertEquals('foobarfoobar', $V2cppyqdygng->loadTemplate('1_basic8')->render(self::$Vgid132nc4mp), 'Sandbox allow methods in a case-insensitive way');
            $this->assertEquals(2, FooObject::$Vebcfwbgpbnl['getFooBar'], 'Sandbox only calls method once');

            $this->assertEquals('foobarfoobar', $V2cppyqdygng->loadTemplate('1_basic9')->render(self::$Vgid132nc4mp), 'Sandbox allow methods via shortcut names (ie. without get/set)');
        }
    }

    public function testSandboxLocallySetForAnInclude()
    {
        self::$Vc0vo4f1f0kv = array(
            '2_basic' => '{{ obj.foo }}{% include "2_included" %}{{ obj.foo }}',
            '2_included' => '{% if obj.foo %}{{ obj.foo|upper }}{% endif %}',
        );

        $V2cppyqdygng = $this->getEnvironment(false, array(), self::$Vc0vo4f1f0kv);
        $this->assertEquals('fooFOOfoo', $V2cppyqdygng->loadTemplate('2_basic')->render(self::$Vgid132nc4mp), 'Sandbox does nothing if disabled globally and sandboxed not used for the include');

        self::$Vc0vo4f1f0kv = array(
            '3_basic' => '{{ obj.foo }}{% sandbox %}{% include "3_included" %}{% endsandbox %}{{ obj.foo }}',
            '3_included' => '{% if obj.foo %}{{ obj.foo|upper }}{% endif %}',
        );

        $V2cppyqdygng = $this->getEnvironment(true, array(), self::$Vc0vo4f1f0kv);
        try {
            $V2cppyqdygng->loadTemplate('3_basic')->render(self::$Vgid132nc4mp);
            $this->fail('Sandbox throws a SecurityError exception when the included file is sandboxed');
        } catch (Twig_Sandbox_SecurityError $Vawjopoun3xn) {
        }
    }

    public function testMacrosInASandbox()
    {
        $V2cppyqdygng = $this->getEnvironment(true, array('autoescape' => true), array('index' => <<<EOF
{%- import _self as macros %}

{%- macro test(text) %}<p>{{ text }}</p>{% endmacro %}

{{- macros.test('username') }}
EOF
        ), array('macro', 'import'), array('escape'));

        $this->assertEquals('<p>username</p>', $V2cppyqdygng->loadTemplate('index')->render(array()));
    }

    protected function getEnvironment($Vjb5du0jg3is, $Vbo43qqknf4i, $Vc0vo4f1f0kv, $V5hu3rl2wtua = array(), $Vh4matx43sow = array(), $Vyyyytst25qz = array(), $Vqmd5qvqgvzi = array(), $Vakwpkr2roqa = array())
    {
        $Vpnd0azzvluw = new Twig_Loader_Array($Vc0vo4f1f0kv);
        $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw, array_merge(array('debug' => true, 'cache' => false, 'autoescape' => false), $Vbo43qqknf4i));
        $V0w0sgsyygz2 = new Twig_Sandbox_SecurityPolicy($V5hu3rl2wtua, $Vh4matx43sow, $Vyyyytst25qz, $Vqmd5qvqgvzi, $Vakwpkr2roqa);
        $V2cppyqdygng->addExtension(new Twig_Extension_Sandbox($V0w0sgsyygz2, $Vjb5du0jg3is));

        return $V2cppyqdygng;
    }
}

class FooObject
{
    public static $Vebcfwbgpbnl = array('__toString' => 0, 'foo' => 0, 'getFooBar' => 0);

    public $Vpp3zeqdjqd2 = 'bar';

    public static function reset()
    {
        self::$Vebcfwbgpbnl = array('__toString' => 0, 'foo' => 0, 'getFooBar' => 0);
    }

    public function __toString()
    {
        ++self::$Vebcfwbgpbnl['__toString'];

        return 'foo';
    }

    public function foo()
    {
        ++self::$Vebcfwbgpbnl['foo'];

        return 'foo';
    }

    public function getFooBar()
    {
        ++self::$Vebcfwbgpbnl['getFooBar'];

        return 'foobar';
    }
}
