<?php



class Twig_Tests_Node_Expression_NameTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Name('foo', 1);

        $this->assertEquals('foo', $Vz3fbiqci0vl->getAttribute('name'));
    }

    public function getTests()
    {
        $Vz3fbiqci0vl = new Twig_Node_Expression_Name('foo', 1);
        $Vqqtkfohvziv = new Twig_Node_Expression_Name('_self', 1);
        $Vhmvn2c55ghv = new Twig_Node_Expression_Name('_context', 1);

        $Vx44ywczaw14 = new Twig_Environment(null, array('strict_variables' => true));
        $Vx44ywczaw141 = new Twig_Environment(null, array('strict_variables' => false));

        return array(
            array($Vz3fbiqci0vl, "// line 1\n".(PHP_VERSION_ID >= 50400 ? '(isset($Vhmvn2c55ghv["foo"]) ? $Vhmvn2c55ghv["foo"] : $this->getContext($Vhmvn2c55ghv, "foo"))' : '$this->getContext($Vhmvn2c55ghv, "foo")'), $Vx44ywczaw14),
            array($Vz3fbiqci0vl, $this->getVariableGetter('foo', 1), $Vx44ywczaw141),
            array($Vqqtkfohvziv, "// line 1\n\$this"),
            array($Vhmvn2c55ghv, "// line 1\n\$Vhmvn2c55ghv"),
        );
    }
}
