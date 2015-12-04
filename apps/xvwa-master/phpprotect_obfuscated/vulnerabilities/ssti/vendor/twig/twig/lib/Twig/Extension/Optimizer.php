<?php


class Twig_Extension_Optimizer extends Twig_Extension
{
    protected $Vx4ecyoyfzfk;

    public function __construct($Vx4ecyoyfzfk = -1)
    {
        $this->optimizers = $Vx4ecyoyfzfk;
    }

    
    public function getNodeVisitors()
    {
        return array(new Twig_NodeVisitor_Optimizer($this->optimizers));
    }

    
    public function getName()
    {
        return 'optimizer';
    }
}
