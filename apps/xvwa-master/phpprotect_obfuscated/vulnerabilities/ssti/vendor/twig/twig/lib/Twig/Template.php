<?php




abstract class Twig_Template implements Twig_TemplateInterface
{
    protected static $Vcxwghl1fqnk = array();

    protected $Vvlgul2pgukx;
    protected $Vvlgul2pgukxs = array();
    protected $Vx44ywczaw14;
    protected $V1vzehiuu4u4;
    protected $Vm3zysopwo4g;

    
    public function __construct(Twig_Environment $Vx44ywczaw14)
    {
        $this->env = $Vx44ywczaw14;
        $this->blocks = array();
        $this->traits = array();
    }

    
    abstract public function getTemplateName();

    
    public function getEnvironment()
    {
        return $this->env;
    }

    
    public function getParent(array $Vhmvn2c55ghv)
    {
        if (null !== $this->parent) {
            return $this->parent;
        }

        try {
            $Vvlgul2pgukx = $this->doGetParent($Vhmvn2c55ghv);

            if (false === $Vvlgul2pgukx) {
                return false;
            }

            if ($Vvlgul2pgukx instanceof self) {
                return $this->parents[$Vvlgul2pgukx->getTemplateName()] = $Vvlgul2pgukx;
            }

            if (!isset($this->parents[$Vvlgul2pgukx])) {
                $this->parents[$Vvlgul2pgukx] = $this->loadTemplate($Vvlgul2pgukx);
            }
        } catch (Twig_Error_Loader $Vawjopoun3xn) {
            $Vawjopoun3xn->setTemplateFile(null);
            $Vawjopoun3xn->guess();

            throw $Vawjopoun3xn;
        }

        return $this->parents[$Vvlgul2pgukx];
    }

    protected function doGetParent(array $Vhmvn2c55ghv)
    {
        return false;
    }

    public function isTraitable()
    {
        return true;
    }

    
    public function displayParentBlock($Vkkm4e2vaxrv, array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array())
    {
        $Vkkm4e2vaxrv = (string) $Vkkm4e2vaxrv;

        if (isset($this->traits[$Vkkm4e2vaxrv])) {
            $this->traits[$Vkkm4e2vaxrv][0]->displayBlock($Vkkm4e2vaxrv, $Vhmvn2c55ghv, $V1vzehiuu4u4, false);
        } elseif (false !== $Vvlgul2pgukx = $this->getParent($Vhmvn2c55ghv)) {
            $Vvlgul2pgukx->displayBlock($Vkkm4e2vaxrv, $Vhmvn2c55ghv, $V1vzehiuu4u4, false);
        } else {
            throw new Twig_Error_Runtime(sprintf('The template has no parent and no traits defining the "%s" block', $Vkkm4e2vaxrv), -1, $this->getTemplateName());
        }
    }

    
    public function displayBlock($Vkkm4e2vaxrv, array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array(), $Vsxieypaepjl = true)
    {
        $Vkkm4e2vaxrv = (string) $Vkkm4e2vaxrv;

        if ($Vsxieypaepjl && isset($V1vzehiuu4u4[$Vkkm4e2vaxrv])) {
            $V4lif0h4bhru = $V1vzehiuu4u4[$Vkkm4e2vaxrv][0];
            $Vciczzarwsxx = $V1vzehiuu4u4[$Vkkm4e2vaxrv][1];
        } elseif (isset($this->blocks[$Vkkm4e2vaxrv])) {
            $V4lif0h4bhru = $this->blocks[$Vkkm4e2vaxrv][0];
            $Vciczzarwsxx = $this->blocks[$Vkkm4e2vaxrv][1];
        } else {
            $V4lif0h4bhru = null;
            $Vciczzarwsxx = null;
        }

        if (null !== $V4lif0h4bhru) {
            try {
                $V4lif0h4bhru->$Vciczzarwsxx($Vhmvn2c55ghv, $V1vzehiuu4u4);
            } catch (Twig_Error $Vawjopoun3xn) {
                if (!$Vawjopoun3xn->getTemplateFile()) {
                    $Vawjopoun3xn->setTemplateFile($V4lif0h4bhru->getTemplateName());
                }

                
                
                if (false === $Vawjopoun3xn->getTemplateLine()) {
                    $Vawjopoun3xn->setTemplateLine(-1);
                    $Vawjopoun3xn->guess();
                }

                throw $Vawjopoun3xn;
            } catch (Exception $Vawjopoun3xn) {
                throw new Twig_Error_Runtime(sprintf('An exception has been thrown during the rendering of a template ("%s").', $Vawjopoun3xn->getMessage()), -1, $V4lif0h4bhru->getTemplateName(), $Vawjopoun3xn);
            }
        } elseif (false !== $Vvlgul2pgukx = $this->getParent($Vhmvn2c55ghv)) {
            $Vvlgul2pgukx->displayBlock($Vkkm4e2vaxrv, $Vhmvn2c55ghv, array_merge($this->blocks, $V1vzehiuu4u4), false);
        }
    }

    
    public function renderParentBlock($Vkkm4e2vaxrv, array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array())
    {
        ob_start();
        $this->displayParentBlock($Vkkm4e2vaxrv, $Vhmvn2c55ghv, $V1vzehiuu4u4);

        return ob_get_clean();
    }

    
    public function renderBlock($Vkkm4e2vaxrv, array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array(), $Vsxieypaepjl = true)
    {
        ob_start();
        $this->displayBlock($Vkkm4e2vaxrv, $Vhmvn2c55ghv, $V1vzehiuu4u4, $Vsxieypaepjl);

        return ob_get_clean();
    }

    
    public function hasBlock($Vkkm4e2vaxrv)
    {
        return isset($this->blocks[(string) $Vkkm4e2vaxrv]);
    }

    
    public function getBlockNames()
    {
        return array_keys($this->blocks);
    }

    protected function loadTemplate($V4lif0h4bhru, $V4lif0h4bhruName = null, $V0devhuwbm4i = null, $V5ep0o103ibg = null)
    {
        try {
            if (is_array($V4lif0h4bhru)) {
                return $this->env->resolveTemplate($V4lif0h4bhru);
            }

            if ($V4lif0h4bhru instanceof self) {
                return $V4lif0h4bhru;
            }

            return $this->env->loadTemplate($V4lif0h4bhru, $V5ep0o103ibg);
        } catch (Twig_Error $Vawjopoun3xn) {
            if (!$Vawjopoun3xn->getTemplateFile()) {
                $Vawjopoun3xn->setTemplateFile($V4lif0h4bhruName ? $V4lif0h4bhruName : $this->getTemplateName());
            }

            if ($Vawjopoun3xn->getTemplateLine()) {
                throw $Vawjopoun3xn;
            }

            if (!$V0devhuwbm4i) {
                $Vawjopoun3xn->guess();
            } else {
                $Vawjopoun3xn->setTemplateLine($V0devhuwbm4i);
            }

            throw $Vawjopoun3xn;
        }
    }

    
    public function getBlocks()
    {
        return $this->blocks;
    }

    
    public function display(array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array())
    {
        $this->displayWithErrorHandling($this->env->mergeGlobals($Vhmvn2c55ghv), array_merge($this->blocks, $V1vzehiuu4u4));
    }

    
    public function render(array $Vhmvn2c55ghv)
    {
        $Vnavz4mpyufb = ob_get_level();
        ob_start();
        try {
            $this->display($Vhmvn2c55ghv);
        } catch (Exception $Vawjopoun3xn) {
            while (ob_get_level() > $Vnavz4mpyufb) {
                ob_end_clean();
            }

            throw $Vawjopoun3xn;
        }

        return ob_get_clean();
    }

    protected function displayWithErrorHandling(array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array())
    {
        try {
            $this->doDisplay($Vhmvn2c55ghv, $V1vzehiuu4u4);
        } catch (Twig_Error $Vawjopoun3xn) {
            if (!$Vawjopoun3xn->getTemplateFile()) {
                $Vawjopoun3xn->setTemplateFile($this->getTemplateName());
            }

            
            
            if (false === $Vawjopoun3xn->getTemplateLine()) {
                $Vawjopoun3xn->setTemplateLine(-1);
                $Vawjopoun3xn->guess();
            }

            throw $Vawjopoun3xn;
        } catch (Exception $Vawjopoun3xn) {
            throw new Twig_Error_Runtime(sprintf('An exception has been thrown during the rendering of a template ("%s").', $Vawjopoun3xn->getMessage()), -1, $this->getTemplateName(), $Vawjopoun3xn);
        }
    }

    
    abstract protected function doDisplay(array $Vhmvn2c55ghv, array $V1vzehiuu4u4 = array());

    
    final protected function getContext($Vhmvn2c55ghv, $Vcsi2wocrpxd, $Vglb5050dq5d = false)
    {
        if (!array_key_exists($Vcsi2wocrpxd, $Vhmvn2c55ghv)) {
            if ($Vglb5050dq5d || !$this->env->isStrictVariables()) {
                return;
            }

            throw new Twig_Error_Runtime(sprintf('Variable "%s" does not exist', $Vcsi2wocrpxd), -1, $this->getTemplateName());
        }

        return $Vhmvn2c55ghv[$Vcsi2wocrpxd];
    }

    
    protected function getAttribute($Vu23r1opf0tb, $Vcsi2wocrpxd, array $V02jggtj2kdh = array(), $Vtathfumoxhu = self::ANY_CALL, $Vq0ls45yl4i4 = false, $Vglb5050dq5d = false)
    {
        
        if (self::METHOD_CALL !== $Vtathfumoxhu) {
            $Viyrjil1cufa = is_bool($Vcsi2wocrpxd) || is_float($Vcsi2wocrpxd) ? (int) $Vcsi2wocrpxd : $Vcsi2wocrpxd;

            if ((is_array($Vu23r1opf0tb) && array_key_exists($Viyrjil1cufa, $Vu23r1opf0tb))
                || ($Vu23r1opf0tb instanceof ArrayAccess && isset($Vu23r1opf0tb[$Viyrjil1cufa]))
            ) {
                if ($Vq0ls45yl4i4) {
                    return true;
                }

                return $Vu23r1opf0tb[$Viyrjil1cufa];
            }

            if (self::ARRAY_CALL === $Vtathfumoxhu || !is_object($Vu23r1opf0tb)) {
                if ($Vq0ls45yl4i4) {
                    return false;
                }

                if ($Vglb5050dq5d || !$this->env->isStrictVariables()) {
                    return;
                }

                if ($Vu23r1opf0tb instanceof ArrayAccess) {
                    $Vnpz33gb3cxs = sprintf('Key "%s" in object with ArrayAccess of class "%s" does not exist', $Viyrjil1cufa, get_class($Vu23r1opf0tb));
                } elseif (is_object($Vu23r1opf0tb)) {
                    $Vnpz33gb3cxs = sprintf('Impossible to access a key "%s" on an object of class "%s" that does not implement ArrayAccess interface', $Vcsi2wocrpxd, get_class($Vu23r1opf0tb));
                } elseif (is_array($Vu23r1opf0tb)) {
                    if (empty($Vu23r1opf0tb)) {
                        $Vnpz33gb3cxs = sprintf('Key "%s" does not exist as the array is empty', $Viyrjil1cufa);
                    } else {
                        $Vnpz33gb3cxs = sprintf('Key "%s" for array with keys "%s" does not exist', $Viyrjil1cufa, implode(', ', array_keys($Vu23r1opf0tb)));
                    }
                } elseif (self::ARRAY_CALL === $Vtathfumoxhu) {
                    if (null === $Vu23r1opf0tb) {
                        $Vnpz33gb3cxs = sprintf('Impossible to access a key ("%s") on a null variable', $Vcsi2wocrpxd);
                    } else {
                        $Vnpz33gb3cxs = sprintf('Impossible to access a key ("%s") on a %s variable ("%s")', $Vcsi2wocrpxd, gettype($Vu23r1opf0tb), $Vu23r1opf0tb);
                    }
                } elseif (null === $Vu23r1opf0tb) {
                    $Vnpz33gb3cxs = sprintf('Impossible to access an attribute ("%s") on a null variable', $Vcsi2wocrpxd);
                } else {
                    $Vnpz33gb3cxs = sprintf('Impossible to access an attribute ("%s") on a %s variable ("%s")', $Vcsi2wocrpxd, gettype($Vu23r1opf0tb), $Vu23r1opf0tb);
                }

                throw new Twig_Error_Runtime($Vnpz33gb3cxs, -1, $this->getTemplateName());
            }
        }

        if (!is_object($Vu23r1opf0tb)) {
            if ($Vq0ls45yl4i4) {
                return false;
            }

            if ($Vglb5050dq5d || !$this->env->isStrictVariables()) {
                return;
            }

            if (null === $Vu23r1opf0tb) {
                $Vnpz33gb3cxs = sprintf('Impossible to invoke a method ("%s") on a null variable', $Vcsi2wocrpxd);
            } else {
                $Vnpz33gb3cxs = sprintf('Impossible to invoke a method ("%s") on a %s variable ("%s")', $Vcsi2wocrpxd, gettype($Vu23r1opf0tb), $Vu23r1opf0tb);
            }

            throw new Twig_Error_Runtime($Vnpz33gb3cxs, -1, $this->getTemplateName());
        }

        
        if (self::METHOD_CALL !== $Vtathfumoxhu) {
            if (isset($Vu23r1opf0tb->$Vcsi2wocrpxd) || array_key_exists((string) $Vcsi2wocrpxd, $Vu23r1opf0tb)) {
                if ($Vq0ls45yl4i4) {
                    return true;
                }

                if ($this->env->hasExtension('sandbox')) {
                    $this->env->getExtension('sandbox')->checkPropertyAllowed($Vu23r1opf0tb, $Vcsi2wocrpxd);
                }

                return $Vu23r1opf0tb->$Vcsi2wocrpxd;
            }
        }

        $Vnwpwvxwn3wh = get_class($Vu23r1opf0tb);

        
        if (!isset(self::$Vcxwghl1fqnk[$Vnwpwvxwn3wh]['methods'])) {
            self::$Vcxwghl1fqnk[$Vnwpwvxwn3wh]['methods'] = array_change_key_case(array_flip(get_class_methods($Vu23r1opf0tb)));
        }

        $Vauwbqpax4p4 = false;
        $Vhowftzy4d3p = strtolower($Vcsi2wocrpxd);
        if (isset(self::$Vcxwghl1fqnk[$Vnwpwvxwn3wh]['methods'][$Vhowftzy4d3p])) {
            $Vng2lb3h3obx = (string) $Vcsi2wocrpxd;
        } elseif (isset(self::$Vcxwghl1fqnk[$Vnwpwvxwn3wh]['methods']['get'.$Vhowftzy4d3p])) {
            $Vng2lb3h3obx = 'get'.$Vcsi2wocrpxd;
        } elseif (isset(self::$Vcxwghl1fqnk[$Vnwpwvxwn3wh]['methods']['is'.$Vhowftzy4d3p])) {
            $Vng2lb3h3obx = 'is'.$Vcsi2wocrpxd;
        } elseif (isset(self::$Vcxwghl1fqnk[$Vnwpwvxwn3wh]['methods']['__call'])) {
            $Vng2lb3h3obx = (string) $Vcsi2wocrpxd;
            $Vauwbqpax4p4 = true;
        } else {
            if ($Vq0ls45yl4i4) {
                return false;
            }

            if ($Vglb5050dq5d || !$this->env->isStrictVariables()) {
                return;
            }

            throw new Twig_Error_Runtime(sprintf('Method "%s" for object "%s" does not exist', $Vcsi2wocrpxd, get_class($Vu23r1opf0tb)), -1, $this->getTemplateName());
        }

        if ($Vq0ls45yl4i4) {
            return true;
        }

        if ($this->env->hasExtension('sandbox')) {
            $this->env->getExtension('sandbox')->checkMethodAllowed($Vu23r1opf0tb, $Vng2lb3h3obx);
        }

        
        
        try {
            $Vsuyucwnscju = call_user_func_array(array($Vu23r1opf0tb, $Vng2lb3h3obx), $V02jggtj2kdh);
        } catch (BadMethodCallException $Vawjopoun3xn) {
            if ($Vauwbqpax4p4 && ($Vglb5050dq5d || !$this->env->isStrictVariables())) {
                return;
            }
            throw $Vawjopoun3xn;
        }

        
        
        if ($Vu23r1opf0tb instanceof Twig_TemplateInterface) {
            return $Vsuyucwnscju === '' ? '' : new Twig_Markup($Vsuyucwnscju, $this->env->getCharset());
        }

        return $Vsuyucwnscju;
    }
}
