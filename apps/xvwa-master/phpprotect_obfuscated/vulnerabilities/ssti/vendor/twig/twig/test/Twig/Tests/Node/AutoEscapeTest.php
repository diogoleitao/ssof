<?php



class Twig_Tests_Node_AutoEscapeTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Text('foo', 1)));
        $Vz3fbiqci0vl = new Twig_Node_AutoEscape(true, $Vc5owkzetmkg, 1);

        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body'));
        $this->assertTrue($Vz3fbiqci0vl->getAttribute('value'));
    }

    public function getTests()
    {
        $Vc5owkzetmkg = new Twig_Node(array(new Twig_Node_Text('foo', 1)));
        $Vz3fbiqci0vl = new Twig_Node_AutoEscape(true, $Vc5owkzetmkg, 1);

        return array(
            array($Vz3fbiqci0vl, "// line 1\necho \"foo\";"),
        );
    }
}
