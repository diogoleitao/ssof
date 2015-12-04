<?php


abstract class Twig_Test_NodeTestCase extends PHPUnit_Framework_TestCase
{
    abstract public function getTests();

    
    public function testCompile($Vz3fbiqci0vl, $Vxhxpu2senoc, $Vcy0fru44kky = null)
    {
        $this->assertNodeCompilation($Vxhxpu2senoc, $Vz3fbiqci0vl, $Vcy0fru44kky);
    }

    public function assertNodeCompilation($Vxhxpu2senoc, Twig_Node $Vz3fbiqci0vl, Twig_Environment $Vcy0fru44kky = null)
    {
        $V3hf0s3ktsxh = $this->getCompiler($Vcy0fru44kky);
        $V3hf0s3ktsxh->compile($Vz3fbiqci0vl);

        $this->assertEquals($Vxhxpu2senoc, trim($V3hf0s3ktsxh->getSource()));
    }

    protected function getCompiler(Twig_Environment $Vcy0fru44kky = null)
    {
        return new Twig_Compiler(null === $Vcy0fru44kky ? $this->getEnvironment() : $Vcy0fru44kky);
    }

    protected function getEnvironment()
    {
        return new Twig_Environment();
    }

    protected function getVariableGetter($Vkkm4e2vaxrv, $V0devhuwbm4i = false)
    {
        $V0devhuwbm4i = $V0devhuwbm4i > 0 ? "// line {$V0devhuwbm4i}\n" : '';

        if (PHP_VERSION_ID >= 50400) {
            return sprintf('%s(isset($Vhmvn2c55ghv["%s"]) ? $Vhmvn2c55ghv["%s"] : null)', $V0devhuwbm4i, $Vkkm4e2vaxrv, $Vkkm4e2vaxrv);
        }

        return sprintf('%s$this->getContext($Vhmvn2c55ghv, "%s")', $V0devhuwbm4i, $Vkkm4e2vaxrv);
    }

    protected function getAttributeGetter()
    {
        if (function_exists('twig_template_get_attributes')) {
            return 'twig_template_get_attributes($this, ';
        }

        return '$this->getAttribute(';
    }
}
