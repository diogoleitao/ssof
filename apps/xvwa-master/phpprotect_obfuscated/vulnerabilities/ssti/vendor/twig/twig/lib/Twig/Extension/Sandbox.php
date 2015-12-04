<?php


class Twig_Extension_Sandbox extends Twig_Extension
{
    protected $Vtywshzlklf1;
    protected $Vjb5du0jg3is;
    protected $V0w0sgsyygz2;

    public function __construct(Twig_Sandbox_SecurityPolicyInterface $V0w0sgsyygz2, $Vjb5du0jg3is = false)
    {
        $this->policy = $V0w0sgsyygz2;
        $this->sandboxedGlobally = $Vjb5du0jg3is;
    }

    
    public function getTokenParsers()
    {
        return array(new Twig_TokenParser_Sandbox());
    }

    
    public function getNodeVisitors()
    {
        return array(new Twig_NodeVisitor_Sandbox());
    }

    public function enableSandbox()
    {
        $this->sandboxed = true;
    }

    public function disableSandbox()
    {
        $this->sandboxed = false;
    }

    public function isSandboxed()
    {
        return $this->sandboxedGlobally || $this->sandboxed;
    }

    public function isSandboxedGlobally()
    {
        return $this->sandboxedGlobally;
    }

    public function setSecurityPolicy(Twig_Sandbox_SecurityPolicyInterface $V0w0sgsyygz2)
    {
        $this->policy = $V0w0sgsyygz2;
    }

    public function getSecurityPolicy()
    {
        return $this->policy;
    }

    public function checkSecurity($V5hu3rl2wtua, $Vh4matx43sow, $Vakwpkr2roqa)
    {
        if ($this->isSandboxed()) {
            $this->policy->checkSecurity($V5hu3rl2wtua, $Vh4matx43sow, $Vakwpkr2roqa);
        }
    }

    public function checkMethodAllowed($Vb03gyaku5il, $Vng2lb3h3obx)
    {
        if ($this->isSandboxed()) {
            $this->policy->checkMethodAllowed($Vb03gyaku5il, $Vng2lb3h3obx);
        }
    }

    public function checkPropertyAllowed($Vb03gyaku5il, $Vng2lb3h3obx)
    {
        if ($this->isSandboxed()) {
            $this->policy->checkPropertyAllowed($Vb03gyaku5il, $Vng2lb3h3obx);
        }
    }

    public function ensureToStringAllowed($Vb03gyaku5il)
    {
        if ($this->isSandboxed() && is_object($Vb03gyaku5il)) {
            $this->policy->checkMethodAllowed($Vb03gyaku5il, '__toString');
        }

        return $Vb03gyaku5il;
    }

    
    public function getName()
    {
        return 'sandbox';
    }
}
