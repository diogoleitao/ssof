<?php




class Twig_Node_CheckSecurity extends Twig_Node
{
    protected $Vbs311tswx0p;
    protected $Vek0jgljgfnv;
    protected $Vu5fpp4zosj2;

    public function __construct(array $Vbs311tswx0p, array $Vek0jgljgfnv, array $Vu5fpp4zosj2)
    {
        $this->usedFilters = $Vbs311tswx0p;
        $this->usedTags = $Vek0jgljgfnv;
        $this->usedFunctions = $Vu5fpp4zosj2;

        parent::__construct();
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V5hu3rl2wtua = $Vh4matx43sow = $Vakwpkr2roqa = array();
        foreach (array('tags', 'filters', 'functions') as $Vtathfumoxhu) {
            foreach ($this->{'used'.ucfirst($Vtathfumoxhu)} as $Vkkm4e2vaxrv => $Vz3fbiqci0vl) {
                if ($Vz3fbiqci0vl instanceof Twig_Node) {
                    ${$Vtathfumoxhu}[$Vkkm4e2vaxrv] = $Vz3fbiqci0vl->getLine();
                } else {
                    ${$Vtathfumoxhu}[$Vz3fbiqci0vl] = null;
                }
            }
        }

        $V3hf0s3ktsxh
            ->write('$V5hu3rl2wtua = ')->repr(array_filter($V5hu3rl2wtua))->raw(";\n")
            ->write('$Vh4matx43sow = ')->repr(array_filter($Vh4matx43sow))->raw(";\n")
            ->write('$Vakwpkr2roqa = ')->repr(array_filter($Vakwpkr2roqa))->raw(";\n\n")
            ->write("try {\n")
            ->indent()
            ->write("\$this->env->getExtension('sandbox')->checkSecurity(\n")
            ->indent()
            ->write(!$V5hu3rl2wtua ? "array(),\n" : "array('".implode("', '", array_keys($V5hu3rl2wtua))."'),\n")
            ->write(!$Vh4matx43sow ? "array(),\n" : "array('".implode("', '", array_keys($Vh4matx43sow))."'),\n")
            ->write(!$Vakwpkr2roqa ? "array()\n" : "array('".implode("', '", array_keys($Vakwpkr2roqa))."')\n")
            ->outdent()
            ->write(");\n")
            ->outdent()
            ->write("} catch (Twig_Sandbox_SecurityError \$Vawjopoun3xn) {\n")
            ->indent()
            ->write("\$Vawjopoun3xn->setTemplateFile(\$this->getTemplateName());\n\n")
            ->write("if (\$Vawjopoun3xn instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset(\$V5hu3rl2wtua[\$Vawjopoun3xn->getTagName()])) {\n")
            ->indent()
            ->write("\$Vawjopoun3xn->setTemplateLine(\$V5hu3rl2wtua[\$Vawjopoun3xn->getTagName()]);\n")
            ->outdent()
            ->write("} elseif (\$Vawjopoun3xn instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset(\$Vh4matx43sow[\$Vawjopoun3xn->getFilterName()])) {\n")
            ->indent()
            ->write("\$Vawjopoun3xn->setTemplateLine(\$Vh4matx43sow[\$Vawjopoun3xn->getFilterName()]);\n")
            ->outdent()
            ->write("} elseif (\$Vawjopoun3xn instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset(\$Vakwpkr2roqa[\$Vawjopoun3xn->getFunctionName()])) {\n")
            ->indent()
            ->write("\$Vawjopoun3xn->setTemplateLine(\$Vakwpkr2roqa[\$Vawjopoun3xn->getFunctionName()]);\n")
            ->outdent()
            ->write("}\n\n")
            ->write("throw \$Vawjopoun3xn;\n")
            ->outdent()
            ->write("}\n\n")
        ;
    }
}
