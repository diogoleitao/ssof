<?php



class Twig_Tests_Node_IfTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vptqrli2ues3 = new Twig_Node(array(
            new Twig_Node_Expression_Constant(true, 1),
            new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1),
        ), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_If($Vptqrli2ues3, $Vjut20h40opi, 1);

        $Vptqrli2ues3his->assertEquals($Vptqrli2ues3, $Vz3fbiqci0vl->getNode('tests'));
        $Vptqrli2ues3his->assertNull($Vz3fbiqci0vl->getNode('else'));

        $Vjut20h40opi = new Twig_Node_Print(new Twig_Node_Expression_Name('bar', 1), 1);
        $Vz3fbiqci0vl = new Twig_Node_If($Vptqrli2ues3, $Vjut20h40opi, 1);
        $Vptqrli2ues3his->assertEquals($Vjut20h40opi, $Vz3fbiqci0vl->getNode('else'));
    }

    public function getTests()
    {
        $Vptqrli2ues3ests = array();

        $Vptqrli2ues3 = new Twig_Node(array(
            new Twig_Node_Expression_Constant(true, 1),
            new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1),
        ), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_If($Vptqrli2ues3, $Vjut20h40opi, 1);

        $Vptqrli2ues3ests[] = array($Vz3fbiqci0vl, <<<EOF

if (true) {
    echo {$Vptqrli2ues3his->getVariableGetter('foo')};
}
EOF
        );

        $Vptqrli2ues3 = new Twig_Node(array(
            new Twig_Node_Expression_Constant(true, 1),
            new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1),
            new Twig_Node_Expression_Constant(false, 1),
            new Twig_Node_Print(new Twig_Node_Expression_Name('bar', 1), 1),
        ), array(), 1);
        $Vjut20h40opi = null;
        $Vz3fbiqci0vl = new Twig_Node_If($Vptqrli2ues3, $Vjut20h40opi, 1);

        $Vptqrli2ues3ests[] = array($Vz3fbiqci0vl, <<<EOF

if (true) {
    echo {$Vptqrli2ues3his->getVariableGetter('foo')};
} elseif (false) {
    echo {$Vptqrli2ues3his->getVariableGetter('bar')};
}
EOF
        );

        $Vptqrli2ues3 = new Twig_Node(array(
            new Twig_Node_Expression_Constant(true, 1),
            new Twig_Node_Print(new Twig_Node_Expression_Name('foo', 1), 1),
        ), array(), 1);
        $Vjut20h40opi = new Twig_Node_Print(new Twig_Node_Expression_Name('bar', 1), 1);
        $Vz3fbiqci0vl = new Twig_Node_If($Vptqrli2ues3, $Vjut20h40opi, 1);

        $Vptqrli2ues3ests[] = array($Vz3fbiqci0vl, <<<EOF

if (true) {
    echo {$Vptqrli2ues3his->getVariableGetter('foo')};
} else {
    echo {$Vptqrli2ues3his->getVariableGetter('bar')};
}
EOF
        );

        return $Vptqrli2ues3ests;
    }
}
