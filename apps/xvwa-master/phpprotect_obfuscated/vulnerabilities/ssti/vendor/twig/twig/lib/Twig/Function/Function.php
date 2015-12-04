<?php




class Twig_Function_Function extends Twig_Function
{
    protected $Vpdqyyybdwv1;

    public function __construct($Vpdqyyybdwv1, array $Vbo43qqknf4i = array())
    {
        $Vbo43qqknf4i['callable'] = $Vpdqyyybdwv1;

        parent::__construct($Vbo43qqknf4i);

        $this->function = $Vpdqyyybdwv1;
    }

    public function compile()
    {
        return $this->function;
    }
}
