<?php




class Twig_NodeTraverser
{
    protected $Vx44ywczaw14;
    protected $Vwhrpr43obxe;

    
    public function __construct(Twig_Environment $Vx44ywczaw14, array $Vwhrpr43obxe = array())
    {
        $this->env = $Vx44ywczaw14;
        $this->visitors = array();
        foreach ($Vwhrpr43obxe as $Vy4jojjdmqtp) {
            $this->addVisitor($Vy4jojjdmqtp);
        }
    }

    
    public function addVisitor(Twig_NodeVisitorInterface $Vy4jojjdmqtp)
    {
        if (!isset($this->visitors[$Vy4jojjdmqtp->getPriority()])) {
            $this->visitors[$Vy4jojjdmqtp->getPriority()] = array();
        }

        $this->visitors[$Vy4jojjdmqtp->getPriority()][] = $Vy4jojjdmqtp;
    }

    
    public function traverse(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        ksort($this->visitors);
        foreach ($this->visitors as $Vwhrpr43obxe) {
            foreach ($Vwhrpr43obxe as $Vy4jojjdmqtp) {
                $Vz3fbiqci0vl = $this->traverseForVisitor($Vy4jojjdmqtp, $Vz3fbiqci0vl);
            }
        }

        return $Vz3fbiqci0vl;
    }

    protected function traverseForVisitor(Twig_NodeVisitorInterface $Vy4jojjdmqtp, Twig_NodeInterface $Vz3fbiqci0vl = null)
    {
        if (null === $Vz3fbiqci0vl) {
            return;
        }

        $Vz3fbiqci0vl = $Vy4jojjdmqtp->enterNode($Vz3fbiqci0vl, $this->env);

        foreach ($Vz3fbiqci0vl as $Vxciknv0z5xi => $Vfuw514z1wy1) {
            if (false !== $Vfuw514z1wy1 = $this->traverseForVisitor($Vy4jojjdmqtp, $Vfuw514z1wy1)) {
                $Vz3fbiqci0vl->setNode($Vxciknv0z5xi, $Vfuw514z1wy1);
            } else {
                $Vz3fbiqci0vl->removeNode($Vxciknv0z5xi);
            }
        }

        return $Vy4jojjdmqtp->leaveNode($Vz3fbiqci0vl, $this->env);
    }
}
