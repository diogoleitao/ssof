<?php

class Twig_NodeVisitor_SafeAnalysis implements Twig_NodeVisitorInterface
{
    protected $V5ttrtwbrnmr = array();
    protected $Volijp225gbg = array();

    public function setSafeVars($Volijp225gbg)
    {
        $this->safeVars = $Volijp225gbg;
    }

    public function getSafe(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        $Vv3q4ft0gbo4 = spl_object_hash($Vz3fbiqci0vl);
        if (!isset($this->data[$Vv3q4ft0gbo4])) {
            return;
        }

        foreach ($this->data[$Vv3q4ft0gbo4] as $Vwu2dxp424tq) {
            if ($Vwu2dxp424tq['key'] !== $Vz3fbiqci0vl) {
                continue;
            }

            if (in_array('html_attr', $Vwu2dxp424tq['value'])) {
                $Vwu2dxp424tq['value'][] = 'html';
            }

            return $Vwu2dxp424tq['value'];
        }
    }

    protected function setSafe(Twig_NodeInterface $Vz3fbiqci0vl, array $Vys3prfoki2r)
    {
        $Vv3q4ft0gbo4 = spl_object_hash($Vz3fbiqci0vl);
        if (isset($this->data[$Vv3q4ft0gbo4])) {
            foreach ($this->data[$Vv3q4ft0gbo4] as &$Vwu2dxp424tq) {
                if ($Vwu2dxp424tq['key'] === $Vz3fbiqci0vl) {
                    $Vwu2dxp424tq['value'] = $Vys3prfoki2r;

                    return;
                }
            }
        }
        $this->data[$Vv3q4ft0gbo4][] = array(
            'key' => $Vz3fbiqci0vl,
            'value' => $Vys3prfoki2r,
        );
    }

    public function enterNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        return $Vz3fbiqci0vl;
    }

    public function leaveNode(Twig_NodeInterface $Vz3fbiqci0vl, Twig_Environment $Vx44ywczaw14)
    {
        if ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Constant) {
            
            $this->setSafe($Vz3fbiqci0vl, array('all'));
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_BlockReference) {
            
            $this->setSafe($Vz3fbiqci0vl, array('all'));
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Parent) {
            
            $this->setSafe($Vz3fbiqci0vl, array('all'));
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Conditional) {
            
            $Vys3prfoki2r = $this->intersectSafe($this->getSafe($Vz3fbiqci0vl->getNode('expr2')), $this->getSafe($Vz3fbiqci0vl->getNode('expr3')));
            $this->setSafe($Vz3fbiqci0vl, $Vys3prfoki2r);
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Filter) {
            
            $Vkkm4e2vaxrv = $Vz3fbiqci0vl->getNode('filter')->getAttribute('value');
            $V4xqqawawaeh = $Vz3fbiqci0vl->getNode('arguments');
            if (false !== $Vntaxllqc33j = $Vx44ywczaw14->getFilter($Vkkm4e2vaxrv)) {
                $Vys3prfoki2r = $Vntaxllqc33j->getSafe($V4xqqawawaeh);
                if (null === $Vys3prfoki2r) {
                    $Vys3prfoki2r = $this->intersectSafe($this->getSafe($Vz3fbiqci0vl->getNode('node')), $Vntaxllqc33j->getPreservesSafety());
                }
                $this->setSafe($Vz3fbiqci0vl, $Vys3prfoki2r);
            } else {
                $this->setSafe($Vz3fbiqci0vl, array());
            }
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_Function) {
            
            $Vkkm4e2vaxrv = $Vz3fbiqci0vl->getAttribute('name');
            $V4xqqawawaeh = $Vz3fbiqci0vl->getNode('arguments');
            $Vpdqyyybdwv1 = $Vx44ywczaw14->getFunction($Vkkm4e2vaxrv);
            if (false !== $Vpdqyyybdwv1) {
                $this->setSafe($Vz3fbiqci0vl, $Vpdqyyybdwv1->getSafe($V4xqqawawaeh));
            } else {
                $this->setSafe($Vz3fbiqci0vl, array());
            }
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_MethodCall) {
            if ($Vz3fbiqci0vl->getAttribute('safe')) {
                $this->setSafe($Vz3fbiqci0vl, array('all'));
            } else {
                $this->setSafe($Vz3fbiqci0vl, array());
            }
        } elseif ($Vz3fbiqci0vl instanceof Twig_Node_Expression_GetAttr && $Vz3fbiqci0vl->getNode('node') instanceof Twig_Node_Expression_Name) {
            $Vkkm4e2vaxrv = $Vz3fbiqci0vl->getNode('node')->getAttribute('name');
            
            if ('_self' == $Vkkm4e2vaxrv || in_array($Vkkm4e2vaxrv, $this->safeVars)) {
                $this->setSafe($Vz3fbiqci0vl, array('all'));
            } else {
                $this->setSafe($Vz3fbiqci0vl, array());
            }
        } else {
            $this->setSafe($Vz3fbiqci0vl, array());
        }

        return $Vz3fbiqci0vl;
    }

    protected function intersectSafe(array $Vk5gde0byujz = null, array $Vkxzhjkxbjvx = null)
    {
        if (null === $Vk5gde0byujz || null === $Vkxzhjkxbjvx) {
            return array();
        }

        if (in_array('all', $Vk5gde0byujz)) {
            return $Vkxzhjkxbjvx;
        }

        if (in_array('all', $Vkxzhjkxbjvx)) {
            return $Vk5gde0byujz;
        }

        return array_intersect($Vk5gde0byujz, $Vkxzhjkxbjvx);
    }

    
    public function getPriority()
    {
        return 0;
    }
}
