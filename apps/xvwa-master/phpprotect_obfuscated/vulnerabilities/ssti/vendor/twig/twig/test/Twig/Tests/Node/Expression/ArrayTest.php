<?php



class Twig_Tests_Node_Expression_ArrayTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vf1izqo4gxss = array(new Twig_Node_Expression_Constant('foo', 1), $Vp0wjf3opjpt = new Twig_Node_Expression_Constant('bar', 1));
        $Vz3fbiqci0vl = new Twig_Node_Expression_Array($Vf1izqo4gxss, 1);

        $this->assertEquals($Vp0wjf3opjpt, $Vz3fbiqci0vl->getNode(1));
    }

    public function getTests()
    {
        $Vf1izqo4gxss = array(
            new Twig_Node_Expression_Constant('foo', 1),
            new Twig_Node_Expression_Constant('bar', 1),

            new Twig_Node_Expression_Constant('bar', 1),
            new Twig_Node_Expression_Constant('foo', 1),
        );
        $Vz3fbiqci0vl = new Twig_Node_Expression_Array($Vf1izqo4gxss, 1);

        return array(
            array($Vz3fbiqci0vl, 'array("foo" => "bar", "bar" => "foo")'),
        );
    }
}
