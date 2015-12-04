<?php




class Twig_SimpleTest
{
    protected $Vkkm4e2vaxrv;
    protected $Vicg521opc2w;
    protected $Vbo43qqknf4i;

    public function __construct($Vkkm4e2vaxrv, $Vicg521opc2w, array $Vbo43qqknf4i = array())
    {
        $this->name = $Vkkm4e2vaxrv;
        $this->callable = $Vicg521opc2w;
        $this->options = array_merge(array(
            'is_variadic' => false,
            'node_class' => 'Twig_Node_Expression_Test',
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

    public function isVariadic()
    {
        return $this->options['is_variadic'];
    }
}
