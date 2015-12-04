<?php




class Twig_Profiler_NodeVisitor_Profiler implements Twig_NodeVisitorInterface
{
    private $Vwd3kv1nljcw;

    public function __construct($Vwd3kv1nljcw)
    {
        $this->extensionName = $Vwd3kv1nljcw;
    }

    
    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        return $Vz3fbiqci0vl;
    }

    
    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Module) {
            $V2tqz5k4ndy2 = $this->getVarName();
            $Vz3fbiqci0vl->setNode('display_start', new Twig_Node(array(new Twig_Profiler_Node_EnterProfile($this->extensionName, Twig_Profiler_Profile::TEMPLATE, $Vz3fbiqci0vl->getAttribute('filename'), $V2tqz5k4ndy2), $Vz3fbiqci0vl->getNode('display_start'))));
            $Vz3fbiqci0vl->setNode('display_end', new Twig_Node(array(new Twig_Profiler_Node_LeaveProfile($V2tqz5k4ndy2), $Vz3fbiqci0vl->getNode('display_end'))));
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Block) {
            $V2tqz5k4ndy2 = $this->getVarName();
            $Vz3fbiqci0vl->setNode('body', new Twig_Node_Body(array(
                new Twig_Profiler_Node_EnterProfile($this->extensionName, Twig_Profiler_Profile::BLOCK, $Vz3fbiqci0vl->getAttribute('name'), $V2tqz5k4ndy2),
                $Vz3fbiqci0vl->getNode('body'),
                new Twig_Profiler_Node_LeaveProfile($V2tqz5k4ndy2),
            )));
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Macro) {
            $V2tqz5k4ndy2 = $this->getVarName();
            $Vz3fbiqci0vl->setNode('body', new Twig_Node_Body(array(
                new Twig_Profiler_Node_EnterProfile($this->extensionName, Twig_Profiler_Profile::MACRO, $Vz3fbiqci0vl->getAttribute('name'), $V2tqz5k4ndy2),
                $Vz3fbiqci0vl->getNode('body'),
                new Twig_Profiler_Node_LeaveProfile($V2tqz5k4ndy2),
            )));
        }

        return $Vz3fbiqci0vl;
    }

    private function getVarName()
    {
        return sprintf('__internal_%s', hash('sha256', uniqid(mt_rand(), true), false));
    }

    
    public function getPriority()
    {
        return 0;
    }
}
