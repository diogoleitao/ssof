<?php
class Twig_Tests_Node_ModuleTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp1965de = new Twig_Node_Text('foo', 1); $sped512c = new Twig_Node_Expression_Constant('layout.twig', 1); $sp8696f5 = new Twig_Node(); $sp964cdb = new Twig_Node(); $spdf8f90 = new Twig_Node(); $sp79b407 = 'foo.twig'; $spcefb62 = new Twig_Node_Module($sp1965de, $sped512c, $sp8696f5, $sp964cdb, $spdf8f90, new Twig_Node(array()), $sp79b407); $this->assertEquals($sp1965de, $spcefb62->getNode('body')); $this->assertEquals($sp8696f5, $spcefb62->getNode('blocks')); $this->assertEquals($sp964cdb, $spcefb62->getNode('macros')); $this->assertEquals($sped512c, $spcefb62->getNode('parent')); $this->assertEquals($sp79b407, $spcefb62->getAttribute('filename')); } public function getTests() { $speae043 = new Twig_Environment($this->getMock('Twig_LoaderInterface')); $sp754928 = array(); $sp1965de = new Twig_Node_Text('foo', 1); $sp90924c = null; $sp8696f5 = new Twig_Node(); $sp964cdb = new Twig_Node(); $spdf8f90 = new Twig_Node(); $sp79b407 = 'foo.twig'; $spcefb62 = new Twig_Node_Module($sp1965de, $sp90924c, $sp8696f5, $sp964cdb, $spdf8f90, new Twig_Node(array()), $sp79b407); $sp754928[] = array($spcefb62, '<?php

/* foo.twig */
class __TwigTemplate_e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
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
}', $speae043); $spc12849 = new Twig_Node_Import(new Twig_Node_Expression_Constant('foo.twig', 1), new Twig_Node_Expression_AssignName('macro', 1), 2); $sp1965de = new Twig_Node(array($spc12849)); $sp90924c = new Twig_Node_Expression_Constant('layout.twig', 1); $spcefb62 = new Twig_Node_Module($sp1965de, $sp90924c, $sp8696f5, $sp964cdb, $spdf8f90, new Twig_Node(array()), $sp79b407); $sp754928[] = array($spcefb62, '<?php

/* foo.twig */
class __TwigTemplate_e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "foo.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["macro"] = $this->loadTemplate("foo.twig", "foo.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
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
}', $speae043); $sp2cfac5 = new Twig_Node_Set(false, new Twig_Node(array(new Twig_Node_Expression_AssignName('foo', 4))), new Twig_Node(array(new Twig_Node_Expression_Constant('foo', 4))), 4); $sp1965de = new Twig_Node(array($sp2cfac5)); $sp90924c = new Twig_Node_Expression_Conditional(new Twig_Node_Expression_Constant(true, 2), new Twig_Node_Expression_Constant('foo', 2), new Twig_Node_Expression_Constant('foo', 2), 2); $spcefb62 = new Twig_Node_Module($sp1965de, $sp90924c, $sp8696f5, $sp964cdb, $spdf8f90, new Twig_Node(array()), $sp79b407); $sp754928[] = array($spcefb62, '<?php

/* foo.twig */
class __TwigTemplate_e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        // line 2
        return $this->loadTemplate(((true) ? ("foo") : ("foo")), "foo.twig", 2);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        $context["foo"] = "foo";
        // line 2
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
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
}', $speae043); return $sp754928; } }