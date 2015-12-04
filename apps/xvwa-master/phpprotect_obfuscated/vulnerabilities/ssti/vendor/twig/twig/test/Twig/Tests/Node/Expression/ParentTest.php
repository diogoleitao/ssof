<?php



class Twig_Tests_Node_Expression_ParentTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Parent('foo', 1);

        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();
        $V512ofmho3mi[] = array(new Twig_Node_Expression_Parent('foo', 1), '$this->renderParentBlock("foo", $Vhmvn2c55ghv, $V1vzehiuu4u4)');

        return $V512ofmho3mi;
    }
}
