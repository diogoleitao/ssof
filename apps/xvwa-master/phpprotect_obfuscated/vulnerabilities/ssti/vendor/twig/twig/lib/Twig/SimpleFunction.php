<?php




class Twig_SimpleFunction
{
    protected $Vkkm4e2vaxrv;
    protected $Vicg521opc2w;
    protected $Vbo43qqknf4i;
    protected $V02jggtj2kdh = array();

    public function __construct($Vkkm4e2vaxrv, $Vicg521opc2w, array $Vbo43qqknf4i = array())
    {
        $this->name = $Vkkm4e2vaxrv;
        $this->callable = $Vicg521opc2w;
        $this->options = array_merge(array(
            'needs_environment' => false,
            'needs_context' => false,
            'is_variadic' => false,
            'is_safe' => null,
            'is_safe_callback' => null,
            'node_class' => 'Twig_Node_Expression_Function',
        ), $Vbo43qqknf4i);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCallable()
    {
        return $this->callable;
    }

    public function getNodeClass()
    {
        return $this->options['node_class'];
    }

    public function setArguments($V02jggtj2kdh)
    {
        $this->arguments = $V02jggtj2kdh;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    public function needsEnvironment()
    {
        return $this->options['needs_environment'];
    }

    public function needsContext()
    {
        return $this->options['needs_context'];
    }

    public function getSafe(Twig_Node $Voginwo1bpct)
    {
        if (null !== $this->options['is_safe']) {
            return $this->options['is_safe'];
        }

        if (null !== $this->options['is_safe_callback']) {
            return call_user_func($this->options['is_safe_callback'], $Voginwo1bpct);
        }

        return array();
    }

    public function isVariadic()
    {
        return $this->options['is_variadic'];
    }
}
