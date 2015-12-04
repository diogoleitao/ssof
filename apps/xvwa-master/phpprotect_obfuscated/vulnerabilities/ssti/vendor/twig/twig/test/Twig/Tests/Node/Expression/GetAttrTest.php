<?php



class Twig_Tests_Node_Expression_GetAttrTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vj4whpw1etp0 = new Twig_Node_Expression_Name('foo', 1);
        $Vp512djlhl50 = new Twig_Node_Expression_Constant('bar', 1);
        $V4xqqawawaeh = new Twig_Node_Expression_Array(array(), 1);
        $V4xqqawawaeh->addElement(new Twig_Node_Expression_Name('foo', 1));
        $V4xqqawawaeh->addElement(new Twig_Node_Expression_Constant('bar', 1));
        $Vz3fbiqci0vl = new Twig_Node_Expression_GetAttr($Vj4whpw1etp0, $Vp512djlhl50, $V4xqqawawaeh, Twig_Template::ARRAY_CALL, 1);

        $this->assertEquals($Vj4whpw1etp0, $Vz3fbiqci0vl->getNode('node'));
        $this->assertEquals($Vp512djlhl50, $Vz3fbiqci0vl->getNode('attribute'));
        $this->assertEquals($V4xqqawawaeh, $Vz3fbiqci0vl->getNode('arguments'));
        $this->assertEquals(Twig_Template::ARRAY_CALL, $Vz3fbiqci0vl->getAttribute('type'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();

        $Vj4whpw1etp0 = new Twig_Node_Expression_Name('foo', 1);
        $Vp512djlhl50 = new Twig_Node_Expression_Constant('bar', 1);
        $V4xqqawawaeh = new Twig_Node_Expression_Array(array(), 1);
        $Vz3fbiqci0vl = new Twig_Node_Expression_GetAttr($Vj4whpw1etp0, $Vp512djlhl50, $V4xqqawawaeh, Twig_Template::ANY_CALL, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, sprintf('%s%s, "bar", array())', $this->getAttributeGetter(), $this->getVariableGetter('foo', 1)));

        $Vz3fbiqci0vl = new Twig_Node_Expression_GetAttr($Vj4whpw1etp0, $Vp512djlhl50, $V4xqqawawaeh, Twig_Template::ARRAY_CALL, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, sprintf('%s%s, "bar", array(), "array")', $this->getAttributeGetter(), $this->getVariableGetter('foo', 1)));

        $V4xqqawawaeh = new Twig_Node_Expression_Array(array(), 1);
        $V4xqqawawaeh->addElement(new Twig_Node_Expression_Name('foo', 1));
        $V4xqqawawaeh->addElement(new Twig_Node_Expression_Constant('bar', 1));
        $Vz3fbiqci0vl = new Twig_Node_Expression_GetAttr($Vj4whpw1etp0, $Vp512djlhl50, $V4xqqawawaeh, Twig_Template::METHOD_CALL, 1);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, sprintf('%s%s, "bar", array(0 => %s, 1 => "bar"), "method")', $this->getAttributeGetter(), $this->getVariableGetter('foo', 1), $this->getVariableGetter('foo')));

        return $V512ofmho3mi;
    }
}
