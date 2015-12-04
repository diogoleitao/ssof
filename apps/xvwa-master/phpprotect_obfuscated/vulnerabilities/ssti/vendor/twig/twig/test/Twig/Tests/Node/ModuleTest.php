<?php



class Twig_Tests_Node_ModuleTest extends Twig_Test_NodeTestCase
{
    public function testConstructor()
    {
        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $Vvlgul2pgukx = new Twig_Node_Expression_Constant('layout.twig', 1);
        $V1vzehiuu4u4 = new Twig_Node();
        $Vsitxihtbnfd = new Twig_Node();
        $Vm3zysopwo4g = new Twig_Node();
        $V2npxty0bmys = 'foo.twig';
        $Vz3fbiqci0vl = new Twig_Node_Module($Vc5owkzetmkg, $Vvlgul2pgukx, $V1vzehiuu4u4, $Vsitxihtbnfd, $Vm3zysopwo4g, new Twig_Node(array()), $V2npxty0bmys);

        $this->assertEquals($Vc5owkzetmkg, $Vz3fbiqci0vl->getNode('body'));
        $this->assertEquals($V1vzehiuu4u4, $Vz3fbiqci0vl->getNode('blocks'));
        $this->assertEquals($Vsitxihtbnfd, $Vz3fbiqci0vl->getNode('macros'));
        $this->assertEquals($Vvlgul2pgukx, $Vz3fbiqci0vl->getNode('parent'));
        $this->assertEquals($V2npxty0bmys, $Vz3fbiqci0vl->getAttribute('filename'));
    }

    public function getTests()
    {
        $V2cppyqdygng = new Twig_Environment($this->getMock('Twig_LoaderInterface'));

        $V512ofmho3mi = array();

        $Vc5owkzetmkg = new Twig_Node_Text('foo', 1);
        $Vpxqfkrda502 = null;
        $V1vzehiuu4u4 = new Twig_Node();
        $Vsitxihtbnfd = new Twig_Node();
        $Vm3zysopwo4g = new Twig_Node();
        $V2npxty0bmys = 'foo.twig';

        $Vz3fbiqci0vl = new Twig_Node_Module($Vc5owkzetmkg, $Vpxqfkrda502, $V1vzehiuu4u4, $Vsitxihtbnfd, $Vm3zysopwo4g, new Twig_Node(array()), $V2npxty0bmys);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF
<?php


class __TwigTemplate_e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855 extends Twig_Template
{
    public function __construct(Twig_Environment \$Vx44ywczaw14)
    {
        parent::__construct(\$Vx44ywczaw14);

        \$this->parent = false;

        \$this->blocks = array(
        );
    }

    protected function doDisplay(array \$Vhmvn2c55ghv, array \$V1vzehiuu4u4 = array())
    {
        
        echo "foo";
    }

    public function getTemplateName()
    {
        return "foo.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
EOF
        , $V2cppyqdygng);

        $Vkih0ggaaoj4 = new Twig_Node_Import(new Twig_Node_Expression_Constant('foo.twig', 1), new Twig_Node_Expression_AssignName('macro', 1), 2);

        $Vc5owkzetmkg = new Twig_Node(array($Vkih0ggaaoj4));
        $Vpxqfkrda502 = new Twig_Node_Expression_Constant('layout.twig', 1);

        $Vz3fbiqci0vl = new Twig_Node_Module($Vc5owkzetmkg, $Vpxqfkrda502, $V1vzehiuu4u4, $Vsitxihtbnfd, $Vm3zysopwo4g, new Twig_Node(array()), $V2npxty0bmys);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF
<?php


class __TwigTemplate_e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855 extends Twig_Template
{
    public function __construct(Twig_Environment \$Vx44ywczaw14)
    {
        parent::__construct(\$Vx44ywczaw14);

        
        \$this->parent = \$this->loadTemplate("layout.twig", "foo.twig", 1);
        \$this->blocks = array(
        );
    }

    protected function doGetParent(array \$Vhmvn2c55ghv)
    {
        return "layout.twig";
    }

    protected function doDisplay(array \$Vhmvn2c55ghv, array \$V1vzehiuu4u4 = array())
    {
        
        \$Vhmvn2c55ghv["macro"] = \$this->loadTemplate("foo.twig", "foo.twig", 2);
        
        \$this->parent->display(\$Vhmvn2c55ghv, array_merge(\$this->blocks, \$V1vzehiuu4u4));
    }

    public function getTemplateName()
    {
        return "foo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 1,  24 => 2,  11 => 1,);
    }
}
EOF
        , $V2cppyqdygng);

        $Vr5zxwqsh5cy = new Twig_Node_Set(false, new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 4))), new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 4))), 4);
        $Vc5owkzetmkg = new Twig_Node(array($Vr5zxwqsh5cy));
        $Vpxqfkrda502 = new Twig_Node_Expression_Conditional(
                        new Twig_Node_Expression_Constant(true, 2),
                        new Twig_Node_Expression_Constant('foo', 2),
                        new Twig_Node_Expression_Constant('foo', 2),
                        2
                    );

        $Vz3fbiqci0vl = new Twig_Node_Module($Vc5owkzetmkg, $Vpxqfkrda502, $V1vzehiuu4u4, $Vsitxihtbnfd, $Vm3zysopwo4g, new Twig_Node(array()), $V2npxty0bmys);
        $V512ofmho3mi[] = array($Vz3fbiqci0vl, <<<EOF
<?php


class __TwigTemplate_e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855 extends Twig_Template
{
    protected function doGetParent(array \$Vhmvn2c55ghv)
    {
        
        return \$this->loadTemplate(((true) ? ("foo") : ("foo")), "foo.twig", 2);
    }

    protected function doDisplay(array \$Vhmvn2c55ghv, array \$V1vzehiuu4u4 = array())
    {
        
        \$Vhmvn2c55ghv["foo"] = "foo";
        
        \$this->getParent(\$Vhmvn2c55ghv)->display(\$Vhmvn2c55ghv, array_merge(\$this->blocks, \$V1vzehiuu4u4));
    }

    public function getTemplateName()
    {
        return "foo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  17 => 2,  15 => 4,  9 => 2,);
    }
}
EOF
        , $V2cppyqdygng);

        return $V512ofmho3mi;
    }
}
