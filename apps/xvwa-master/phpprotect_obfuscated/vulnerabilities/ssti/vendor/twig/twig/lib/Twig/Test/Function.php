<?php




class Twig_Test_Function extends Twig_Test
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
