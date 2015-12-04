<?php


class Twig_Extension_Escaper extends Twig_Extension
{
    protected $Vfys4tt2ji3o;

    public function __construct($Vfys4tt2ji3o = 'html')
    {
        $this->setDefaultStrategy($Vfys4tt2ji3o);
    }

    
    public function getTokenParsers()
    {
        return array(new Twig_TokenParser_AutoEscape());
    }

    
    public function getNodeVisitors()
    {
        return array(new Twig_NodeVisitor_Escaper());
    }

    
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('raw', 'twig_raw_filter', array('is_safe' => array('all'))),
        );
    }

    
    public function setDefaultStrategy($Vfys4tt2ji3o)
    {
        
        if (true === $Vfys4tt2ji3o) {
            $Vfys4tt2ji3o = 'html';
        }

        if ('filename' === $Vfys4tt2ji3o) {
            $Vfys4tt2ji3o = array('Twig_FileExtensionEscapingStrategy', 'guess');
        }

        $this->defaultStrategy = $Vfys4tt2ji3o;
    }

    
    public function getDefaultStrategy($V2npxty0bmys)
    {
        
        
        if (!is_string($this->defaultStrategy) && is_callable($this->defaultStrategy)) {
            return call_user_func($this->defaultStrategy, $V2npxty0bmys);
        }

        return $this->defaultStrategy;
    }

    
    public function getName()
    {
        return 'escaper';
    }
}


function twig_raw_filter($Viabwp03n3sk)
{
    return $Viabwp03n3sk;
}
