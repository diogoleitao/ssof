<?php




interface Twig_ExtensionInterface
{
    
    public function initRuntime(Twig_Environment $Vcy0fru44kky);

    
    public function getTokenParsers();

    
    public function getNodeVisitors();

    
    public function getFilters();

    
    public function getTests();

    
    public function getFunctions();

    
    public function getOperators();

    
    public function getGlobals();

    
    public function getName();
}
