<?php




class Twig_Node_For extends Twig_Node
{
    protected $Vhwccm4hjp3t;

    public function __construct(Twig_Node_Expression_AssignName $Vknwqh0mapks, Twig_Node_Expression_AssignName $Vr3fkhakslod, Twig_Node_Expression $Vngl2xdldp0y, Twig_Node_Expression $Vsp4nllgbxbn = null, Twig_NodeInterface $Vc5owkzetmkg, Twig_NodeInterface $Vjut20h40opi = null, $Vy5krvyy5dgq, $Vyzs3kd551qh = null)
    {
        $Vc5owkzetmkg = new Twig_Node(array($Vc5owkzetmkg, $this->loop = new Twig_Node_ForLoop($Vy5krvyy5dgq, $Vyzs3kd551qh)));

        if (null !== $Vsp4nllgbxbn) {
            $Vc5owkzetmkg = new Twig_Node_If(new Twig_Node(array($Vsp4nllgbxbn, $Vc5owkzetmkg)), null, $Vy5krvyy5dgq, $Vyzs3kd551qh);
        }

        parent::__construct(array('key_target' => $Vknwqh0mapks, 'value_target' => $Vr3fkhakslod, 'seq' => $Vngl2xdldp0y, 'body' => $Vc5owkzetmkg, 'else' => $Vjut20h40opi), array('with_loop' => true, 'ifexpr' => null !== $Vsp4nllgbxbn), $Vy5krvyy5dgq, $Vyzs3kd551qh);
    }

    
    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh
            ->addDebugInfo($this)
            
            ->write("\$Vhmvn2c55ghv['_parent'] = (array) \$Vhmvn2c55ghv;\n")
            ->write("\$Vhmvn2c55ghv['_seq'] = twig_ensure_traversable(")
            ->subcompile($this->getNode('seq'))
            ->raw(");\n")
        ;

        if (null !== $this->getNode('else')) {
            $V3hf0s3ktsxh->write("\$Vhmvn2c55ghv['_iterated'] = false;\n");
        }

        if ($this->getAttribute('with_loop')) {
            $V3hf0s3ktsxh
                ->write("\$Vhmvn2c55ghv['loop'] = array(\n")
                ->write("  'parent' => \$Vhmvn2c55ghv['_parent'],\n")
                ->write("  'index0' => 0,\n")
                ->write("  'index'  => 1,\n")
                ->write("  'first'  => true,\n")
                ->write(");\n")
            ;

            if (!$this->getAttribute('ifexpr')) {
                $V3hf0s3ktsxh
                    ->write("if (is_array(\$Vhmvn2c55ghv['_seq']) || (is_object(\$Vhmvn2c55ghv['_seq']) && \$Vhmvn2c55ghv['_seq'] instanceof Countable)) {\n")
                    ->indent()
                    ->write("\$Vac2bf3qhtlh = count(\$Vhmvn2c55ghv['_seq']);\n")
                    ->write("\$Vhmvn2c55ghv['loop']['revindex0'] = \$Vac2bf3qhtlh - 1;\n")
                    ->write("\$Vhmvn2c55ghv['loop']['revindex'] = \$Vac2bf3qhtlh;\n")
                    ->write("\$Vhmvn2c55ghv['loop']['length'] = \$Vac2bf3qhtlh;\n")
                    ->write("\$Vhmvn2c55ghv['loop']['last'] = 1 === \$Vac2bf3qhtlh;\n")
                    ->outdent()
                    ->write("}\n")
                ;
            }
        }

        $this->loop->setAttribute('else', null !== $this->getNode('else'));
        $this->loop->setAttribute('with_loop', $this->getAttribute('with_loop'));
        $this->loop->setAttribute('ifexpr', $this->getAttribute('ifexpr'));

        $V3hf0s3ktsxh
            ->write("foreach (\$Vhmvn2c55ghv['_seq'] as ")
            ->subcompile($this->getNode('key_target'))
            ->raw(' => ')
            ->subcompile($this->getNode('value_target'))
            ->raw(") {\n")
            ->indent()
            ->subcompile($this->getNode('body'))
            ->outdent()
            ->write("}\n")
        ;

        if (null !== $this->getNode('else')) {
            $V3hf0s3ktsxh
                ->write("if (!\$Vhmvn2c55ghv['_iterated']) {\n")
                ->indent()
                ->subcompile($this->getNode('else'))
                ->outdent()
                ->write("}\n")
            ;
        }

        $V3hf0s3ktsxh->write("\$Vyondy1qwhw0 = \$Vhmvn2c55ghv['_parent'];\n");

        
        $V3hf0s3ktsxh->write('unset($Vhmvn2c55ghv[\'_seq\'], $Vhmvn2c55ghv[\'_iterated\'], $Vhmvn2c55ghv[\''.$this->getNode('key_target')->getAttribute('name').'\'], $Vhmvn2c55ghv[\''.$this->getNode('value_target')->getAttribute('name').'\'], $Vhmvn2c55ghv[\'_parent\'], $Vhmvn2c55ghv[\'loop\']);'."\n");

        
        $V3hf0s3ktsxh->write("\$Vhmvn2c55ghv = array_intersect_key(\$Vhmvn2c55ghv, \$Vyondy1qwhw0) + \$Vyondy1qwhw0;\n");
    }
}
