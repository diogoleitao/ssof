<?php




class Twig_Node_Module extends Twig_Node
{
    public function __construct(Twig_NodeInterface $Vc5owkzetmkg, Twig_Node_Expression $Vvlgul2pgukx = null, Twig_NodeInterface $V1vzehiuu4u4, Twig_NodeInterface $Vsitxihtbnfd, Twig_NodeInterface $Vm3zysopwo4g, $Vjj2s2zrtoyd, $V2npxty0bmys)
    {
        
        parent::__construct(array(
            'parent' => $Vvlgul2pgukx,
            'body' => $Vc5owkzetmkg,
            'blocks' => $V1vzehiuu4u4,
            'macros' => $Vsitxihtbnfd,
            'traits' => $Vm3zysopwo4g,
            'display_start' => new Twig_Node(),
            'display_end' => new Twig_Node(),
            'constructor_start' => new Twig_Node(),
            'constructor_end' => new Twig_Node(),
            'class_end' => new Twig_Node(),
        ), array(
            'filename' => $V2npxty0bmys,
            'index' => null,
            'embedded_templates' => $Vjj2s2zrtoyd,
        ), 1);
    }

    public function setIndex($V5ep0o103ibg)
    {
        $this->setAttribute('index', $V5ep0o103ibg);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $this->compileTemplate($V3hf0s3ktsxh);

        foreach ($this->getAttribute('embedded_templates') as $V4lif0h4bhru) {
            $V3hf0s3ktsxh->subcompile($V4lif0h4bhru);
        }
    }

    protected function compileTemplate(Twig_Compiler $V3hf0s3ktsxh)
    {
        if (!$this->getAttribute('index')) {
            $V3hf0s3ktsxh->write('<?php');
        }

        $this->compileClassHeader($V3hf0s3ktsxh);

        if (
            count($this->getNode('blocks'))
            || count($this->getNode('traits'))
            || null === $this->getNode('parent')
            || $this->getNode('parent') instanceof Twig_Node_Expression_Constant
            || count($this->getNode('constructor_start'))
            || count($this->getNode('constructor_end'))
        ) {
            $this->compileConstructor($V3hf0s3ktsxh);
        }

        $this->compileGetParent($V3hf0s3ktsxh);

        $this->compileDisplay($V3hf0s3ktsxh);

        $V3hf0s3ktsxh->subcompile($this->getNode('blocks'));

        $this->compileMacros($V3hf0s3ktsxh);

        $this->compileGetTemplateName($V3hf0s3ktsxh);

        $this->compileIsTraitable($V3hf0s3ktsxh);

        $this->compileDebugInfo($V3hf0s3ktsxh);

        $this->compileClassFooter($V3hf0s3ktsxh);
    }

    protected function compileGetParent(Twig_Compiler $V3hf0s3ktsxh)
    {
        if (null === $Vvlgul2pgukx = $this->getNode('parent')) {
            return;
        }

        $V3hf0s3ktsxh
            ->write("protected function doGetParent(array \$Vhmvn2c55ghv)\n", "{\n")
            ->indent()
            ->addDebugInfo($Vvlgul2pgukx)
            ->write('return ')
        ;

        if ($Vvlgul2pgukx instanceof Twig_Node_Expression_Constant) {
            $V3hf0s3ktsxh->subcompile($Vvlgul2pgukx);
        } else {
            $V3hf0s3ktsxh
                ->raw('$this->loadTemplate(')
                ->subcompile($Vvlgul2pgukx)
                ->raw(', ')
                ->repr($V3hf0s3ktsxh->getFilename())
                ->raw(', ')
                ->repr($this->getNode('parent')->getLine())
                ->raw(')')
            ;
        }

        $V3hf0s3ktsxh
            ->raw(";\n")
            ->outdent()
            ->write("}\n\n")
        ;
    }

    protected function compileClassHeader(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write("\n\n")
            
            ->write('/* '.str_replace('*/', '* /', $this->getAttribute('filename'))." */\n")
            ->write('class '.$V3hf0s3ktsxh->getEnvironment()->getTemplateClass($this->getAttribute('filename'), $this->getAttribute('index')))
            ->raw(sprintf(" extends %s\n", $V3hf0s3ktsxh->getEnvironment()->getBaseTemplateClass()))
            ->write("{\n")
            ->indent()
        ;
    }

    protected function compileConstructor(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write("public function __construct(Twig_Environment \$Vx44ywczaw14)\n", "{\n")
            ->indent()
            ->subcompile($this->getNode('constructor_start'))
            ->write("parent::__construct(\$Vx44ywczaw14);\n\n")
        ;

        
        if (null === $Vvlgul2pgukx = $this->getNode('parent')) {
            $V3hf0s3ktsxh->write("\$this->parent = false;\n\n");
        } elseif ($Vvlgul2pgukx instanceof Twig_Node_Expression_Constant) {
            $V3hf0s3ktsxh
                ->addDebugInfo($Vvlgul2pgukx)
                ->write('$this->parent = $this->loadTemplate(')
                ->subcompile($Vvlgul2pgukx)
                ->raw(', ')
                ->repr($V3hf0s3ktsxh->getFilename())
                ->raw(', ')
                ->repr($this->getNode('parent')->getLine())
                ->raw(");\n")
            ;
        }

        $Vuywbl512pv1 = count($this->getNode('traits'));
        if ($Vuywbl512pv1) {
            
            foreach ($this->getNode('traits') as $Vh3cz3bzejsf => $Vrr05hjays3s) {
                $this->compileLoadTemplate($V3hf0s3ktsxh, $Vrr05hjays3s->getNode('template'), sprintf('$Vixfvu5swhi2%s', $Vh3cz3bzejsf));

                $V3hf0s3ktsxh
                    ->addDebugInfo($Vrr05hjays3s->getNode('template'))
                    ->write(sprintf("if (!\$Vixfvu5swhi2%s->isTraitable()) {\n", $Vh3cz3bzejsf))
                    ->indent()
                    ->write("throw new Twig_Error_Runtime('Template \"'.")
                    ->subcompile($Vrr05hjays3s->getNode('template'))
                    ->raw(".'\" cannot be used as a trait.');\n")
                    ->outdent()
                    ->write("}\n")
                    ->write(sprintf("\$Vixfvu5swhi2%s_blocks = \$Vixfvu5swhi2%s->getBlocks();\n\n", $Vh3cz3bzejsf, $Vh3cz3bzejsf))
                ;

                foreach ($Vrr05hjays3s->getNode('targets') as $Vks5xpccznyi => $V2dijfr3ez0f) {
                    $V3hf0s3ktsxh
                        ->write(sprintf('if (!isset($Vixfvu5swhi2%s_blocks[', $Vh3cz3bzejsf))
                        ->string($Vks5xpccznyi)
                        ->raw("])) {\n")
                        ->indent()
                        ->write("throw new Twig_Error_Runtime(sprintf('Block ")
                        ->string($Vks5xpccznyi)
                        ->raw(' is not defined in trait ')
                        ->subcompile($Vrr05hjays3s->getNode('template'))
                        ->raw(".'));\n")
                        ->outdent()
                        ->write("}\n\n")

                        ->write(sprintf('$Vixfvu5swhi2%s_blocks[', $Vh3cz3bzejsf))
                        ->subcompile($V2dijfr3ez0f)
                        ->raw(sprintf('] = $Vixfvu5swhi2%s_blocks[', $Vh3cz3bzejsf))
                        ->string($Vks5xpccznyi)
                        ->raw(sprintf(']; unset($Vixfvu5swhi2%s_blocks[', $Vh3cz3bzejsf))
                        ->string($Vks5xpccznyi)
                        ->raw("]);\n\n")
                    ;
                }
            }

            if ($Vuywbl512pv1 > 1) {
                $V3hf0s3ktsxh
                    ->write("\$this->traits = array_merge(\n")
                    ->indent()
                ;

                for ($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf < $Vuywbl512pv1; ++$Vh3cz3bzejsf) {
                    $V3hf0s3ktsxh
                        ->write(sprintf('$Vixfvu5swhi2%s_blocks'.($Vh3cz3bzejsf == $Vuywbl512pv1 - 1 ? '' : ',')."\n", $Vh3cz3bzejsf))
                    ;
                }

                $V3hf0s3ktsxh
                    ->outdent()
                    ->write(");\n\n")
                ;
            } else {
                $V3hf0s3ktsxh
                    ->write("\$this->traits = \$Vixfvu5swhi20_blocks;\n\n")
                ;
            }

            $V3hf0s3ktsxh
                ->write("\$this->blocks = array_merge(\n")
                ->indent()
                ->write("\$this->traits,\n")
                ->write("array(\n")
            ;
        } else {
            $V3hf0s3ktsxh
                ->write("\$this->blocks = array(\n")
            ;
        }

        
        $V3hf0s3ktsxh
            ->indent()
        ;

        foreach ($this->getNode('blocks') as $Vkkm4e2vaxrv => $Vz3fbiqci0vl) {
            $V3hf0s3ktsxh
                ->write(sprintf("'%s' => array(\$this, 'block_%s'),\n", $Vkkm4e2vaxrv, $Vkkm4e2vaxrv))
            ;
        }

        if ($Vuywbl512pv1) {
            $V3hf0s3ktsxh
                ->outdent()
                ->write(")\n")
            ;
        }

        $V3hf0s3ktsxh
            ->outdent()
            ->write(");\n")
            ->outdent()
            ->subcompile($this->getNode('constructor_end'))
            ->write("}\n\n")
        ;
    }

    protected function compileDisplay(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write("protected function doDisplay(array \$Vhmvn2c55ghv, array \$V1vzehiuu4u4 = array())\n", "{\n")
            ->indent()
            ->subcompile($this->getNode('display_start'))
            ->subcompile($this->getNode('body'))
        ;

        if (null !== $Vvlgul2pgukx = $this->getNode('parent')) {
            $V3hf0s3ktsxh->addDebugInfo($Vvlgul2pgukx);
            if ($Vvlgul2pgukx instanceof Twig_Node_Expression_Constant) {
                $V3hf0s3ktsxh->write('$this->parent');
            } else {
                $V3hf0s3ktsxh->write('$this->getParent($Vhmvn2c55ghv)');
            }
            $V3hf0s3ktsxh->raw("->display(\$Vhmvn2c55ghv, array_merge(\$this->blocks, \$V1vzehiuu4u4));\n");
        }

        $V3hf0s3ktsxh
            ->subcompile($this->getNode('display_end'))
            ->outdent()
            ->write("}\n\n")
        ;
    }

    protected function compileClassFooter(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->subcompile($this->getNode('class_end'))
            ->outdent()
            ->write("}\n")
        ;
    }

    protected function compileMacros(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->subcompile($this->getNode('macros'));
    }

    protected function compileGetTemplateName(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write("public function getTemplateName()\n", "{\n")
            ->indent()
            ->write('return ')
            ->repr($this->getAttribute('filename'))
            ->raw(";\n")
            ->outdent()
            ->write("}\n\n")
        ;
    }

    protected function compileIsTraitable(Twig_Compiler $V3hf0s3ktsxh)
    {
        
        
        
        
        
        
        
        $Vrr05hjays3sable = null === $this->getNode('parent') && 0 === count($this->getNode('macros'));
        if ($Vrr05hjays3sable) {
            if ($this->getNode('body') instanceof Twig_Node_Body) {
                $Vz3fbiqci0vls = $this->getNode('body')->getNode(0);
            } else {
                $Vz3fbiqci0vls = $this->getNode('body');
            }

            if (!count($Vz3fbiqci0vls)) {
                $Vz3fbiqci0vls = new Twig_Node(array($Vz3fbiqci0vls));
            }

            foreach ($Vz3fbiqci0vls as $Vz3fbiqci0vl) {
                if (!count($Vz3fbiqci0vl)) {
                    continue;
                }

                if ($Vz3fbiqci0vl instanceof Twig_Node_Text && ctype_space($Vz3fbiqci0vl->getAttribute('data'))) {
                    continue;
                }

                if ($Vz3fbiqci0vl instanceof Twig_Node_BlockReference) {
                    continue;
                }

                $Vrr05hjays3sable = false;
                break;
            }
        }

        if ($Vrr05hjays3sable) {
            return;
        }

        $V3hf0s3ktsxh
            ->write("public function isTraitable()\n", "{\n")
            ->indent()
            ->write(sprintf("return %s;\n", $Vrr05hjays3sable ? 'true' : 'false'))
            ->outdent()
            ->write("}\n\n")
        ;
    }

    protected function compileDebugInfo(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->write("public function getDebugInfo()\n", "{\n")
            ->indent()
            ->write(sprintf("return %s;\n", str_replace("\n", '', var_export(array_reverse($V3hf0s3ktsxh->getDebugInfo(), true), true))))
            ->outdent()
            ->write("}\n")
        ;
    }

    protected function compileLoadTemplate(Twig_Compiler $V3hf0s3ktsxh, $Vz3fbiqci0vl, $Vl2x41mifdiq)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Constant) {
            $V3hf0s3ktsxh
                ->write(sprintf('%s = $this->loadTemplate(', $Vl2x41mifdiq))
                ->subcompile($Vz3fbiqci0vl)
                ->raw(', ')
                ->repr($V3hf0s3ktsxh->getFilename())
                ->raw(', ')
                ->repr($Vz3fbiqci0vl->getLine())
                ->raw(");\n")
            ;
        } else {
            $V3hf0s3ktsxh
                ->write(sprintf('%s = ', $Vl2x41mifdiq))
                ->subcompile($Vz3fbiqci0vl)
                ->raw(";\n")
                ->write(sprintf('if (!%s', $Vl2x41mifdiq))
                ->raw(" instanceof Twig_Template) {\n")
                ->indent()
                ->write(sprintf('%s = $this->loadTemplate(%s')
                ->raw(', ')
                ->repr($V3hf0s3ktsxh->getFilename())
                ->raw(', ')
                ->repr($Vz3fbiqci0vl->getLine())
                ->raw(");\n", $Vl2x41mifdiq, $Vl2x41mifdiq))
                ->outdent()
                ->write("}\n")
            ;
        }
    }
}
