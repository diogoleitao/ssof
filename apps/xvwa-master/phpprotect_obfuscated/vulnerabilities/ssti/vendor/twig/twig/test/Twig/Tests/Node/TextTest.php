<?php



class Twig_Tests_Node_TextTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_Text('foo', 1);

        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('data'));
    }

    public function getTests()
    {
        $V512ofmho3mi = array();
        $V512ofmho3mi[] = array(new Twig_Node_Text('foo', 1), "// line 1\necho \"foo\";");

        return $V512ofmho3mi;
    }
}
