<?php



class Twig_Tests_Node_Expression_AssignNameTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_AssignName('foo', 1);

        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_AssignName('foo', 1);

        return array(
            array($Vz3fbiqci0vl, '$Vhmvn2c55ghv["foo"]'),
        );
    }
}
