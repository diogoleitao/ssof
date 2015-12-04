<?php




class Twig_Error extends Exception
{
    protected $Vy5krvyy5dgq;
    protected $V2npxty0bmys;
    protected $V1adpwf0swfh;
    protected $Vda0un1ul0vl;

    
    public function __construct($Vnpz33gb3cxs, $Vy5krvyy5dgq = -1, $V2npxty0bmys = null, Exception $Vda0un1ul0vl = null)
    {
        if (PHP_VERSION_ID < 50300) {
            $this->previous = $Vda0un1ul0vl;
            parent::__construct('');
        } else {
            parent::__construct('', 0, $Vda0un1ul0vl);
        }

        $this->lineno = $Vy5krvyy5dgq;
        $this->filename = $V2npxty0bmys;

        if (-1 === $this->lineno || null === $this->filename) {
            $this->guessTemplateInfo();
        }

        $this->rawMessage = $Vnpz33gb3cxs;

        $this->updateRepr();
    }

    
    public function getRawMessage()
    {
        return $this->rawMessage;
    }

    
    public function getTemplateFile()
    {
        return $this->filename;
    }

    
    public function setTemplateFile($V2npxty0bmys)
    {
        $this->filename = $V2npxty0bmys;

        $this->updateRepr();
    }

    
    public function getTemplateLine()
    {
        return $this->lineno;
    }

    
    public function setTemplateLine($Vy5krvyy5dgq)
    {
        $this->lineno = $Vy5krvyy5dgq;

        $this->updateRepr();
    }

    public function guess()
    {
        $this->guessTemplateInfo();
        $this->updateRepr();
    }

    
    public function __call($Vng2lb3h3obx, $V02jggtj2kdh)
    {
        if ('getprevious' == strtolower($Vng2lb3h3obx)) {
            return $this->previous;
        }

        throw new BadMethodCallException(sprintf('Method "Twig_Error::%s()" does not exist.', $Vng2lb3h3obx));
    }

    protected function updateRepr()
    {
        $this->message = $this->rawMessage;

        $Vvykgewte13i = false;
        if ('.' === substr($this->message, -1)) {
            $this->message = substr($this->message, 0, -1);
            $Vvykgewte13i = true;
        }

        if ($this->filename) {
            if (is_string($this->filename) || (is_object($this->filename) && method_exists($this->filename, '__toString'))) {
                $V2npxty0bmys = sprintf('"%s"', $this->filename);
            } else {
                $V2npxty0bmys = json_encode($this->filename);
            }
            $this->message .= sprintf(' in %s', $V2npxty0bmys);
        }

        if ($this->lineno && $this->lineno >= 0) {
            $this->message .= sprintf(' at line %d', $this->lineno);
        }

        if ($Vvykgewte13i) {
            $this->message .= '.';
        }
    }

    protected function guessTemplateInfo()
    {
        $V4lif0h4bhru = null;
        $V4lif0h4bhruClass = null;

        if (PHP_VERSION_ID >= 50306) {
            $Vdna4zunt2vj = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS | DEBUG_BACKTRACE_PROVIDE_OBJECT);
        } else {
            $Vdna4zunt2vj = debug_backtrace();
        }

        foreach ($Vdna4zunt2vj as $Vfxgapjn1onp) {
            if (isset($Vfxgapjn1onp['object']) && $Vfxgapjn1onp['object'] instanceof Twig_Template && 'Twig_Template' !== get_class($Vfxgapjn1onp['object'])) {
                $Vt4bfh0z5c2i = get_class($Vfxgapjn1onp['object']);
                $Vtcmqvsbk11a = 0 === strpos($V4lif0h4bhruClass, $Vt4bfh0z5c2i);
                if (null === $this->filename || ($this->filename == $Vfxgapjn1onp['object']->getTemplateName() && !$Vtcmqvsbk11a)) {
                    $V4lif0h4bhru = $Vfxgapjn1onp['object'];
                    $V4lif0h4bhruClass = get_class($Vfxgapjn1onp['object']);
                }
            }
        }

        
        if (null !== $V4lif0h4bhru && null === $this->filename) {
            $this->filename = $V4lif0h4bhru->getTemplateName();
        }

        if (null === $V4lif0h4bhru || $this->lineno > -1) {
            return;
        }

        $Vto203c3rzkl = new ReflectionObject($V4lif0h4bhru);
        $Vq4aq0rd5eme = $Vto203c3rzkl->getFileName();

        
        if (is_dir($Vq4aq0rd5eme)) {
            $Vq4aq0rd5eme = '';
        }

        $Vj5sbmxlydpq = array($Vawjopoun3xn = $this);
        while (($Vawjopoun3xn instanceof self || method_exists($Vawjopoun3xn, 'getPrevious')) && $Vawjopoun3xn = $Vawjopoun3xn->getPrevious()) {
            $Vj5sbmxlydpq[] = $Vawjopoun3xn;
        }

        while ($Vawjopoun3xn = array_pop($Vj5sbmxlydpq)) {
            $Vfxgapjn1onps = $Vawjopoun3xn->getTrace();
            array_unshift($Vfxgapjn1onps, array('file' => $Vawjopoun3xn->getFile(), 'line' => $Vawjopoun3xn->getLine()));

            while ($Vfxgapjn1onp = array_shift($Vfxgapjn1onps)) {
                if (!isset($Vfxgapjn1onp['file']) || !isset($Vfxgapjn1onp['line']) || $Vq4aq0rd5eme != $Vfxgapjn1onp['file']) {
                    continue;
                }

                foreach ($V4lif0h4bhru->getDebugInfo() as $Vbchmp4jlyi1 => $V4lif0h4bhruLine) {
                    if ($Vbchmp4jlyi1 <= $Vfxgapjn1onp['line']) {
                        
                        $this->lineno = $V4lif0h4bhruLine;

                        return;
                    }
                }
            }
        }
    }
}
