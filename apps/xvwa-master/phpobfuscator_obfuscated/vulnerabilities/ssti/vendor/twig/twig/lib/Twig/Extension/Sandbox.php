<?php
class Twig_Extension_Sandbox extends Twig_Extension { protected $sandboxedGlobally; protected $sandboxed; protected $policy; public function __construct(Twig_Sandbox_SecurityPolicyInterface $sp16554e, $spaff731 = false) { $this->policy = $sp16554e; $this->sandboxedGlobally = $spaff731; } public function getTokenParsers() { return array(new Twig_TokenParser_Sandbox()); } public function getNodeVisitors() { return array(new Twig_NodeVisitor_Sandbox()); } public function enableSandbox() { $this->sandboxed = true; } public function disableSandbox() { $this->sandboxed = false; } public function isSandboxed() { return $this->sandboxedGlobally || $this->sandboxed; } public function isSandboxedGlobally() { return $this->sandboxedGlobally; } public function setSecurityPolicy(Twig_Sandbox_SecurityPolicyInterface $sp16554e) { $this->policy = $sp16554e; } public function getSecurityPolicy() { return $this->policy; } public function checkSecurity($sp53db34, $sp34c924, $spbe1c61) { if ($this->isSandboxed()) { $this->policy->checkSecurity($sp53db34, $sp34c924, $spbe1c61); } } public function checkMethodAllowed($sp1bd56d, $sp810c92) { if ($this->isSandboxed()) { $this->policy->checkMethodAllowed($sp1bd56d, $sp810c92); } } public function checkPropertyAllowed($sp1bd56d, $sp810c92) { if ($this->isSandboxed()) { $this->policy->checkPropertyAllowed($sp1bd56d, $sp810c92); } } public function ensureToStringAllowed($sp1bd56d) { if ($this->isSandboxed() && is_object($sp1bd56d)) { $this->policy->checkMethodAllowed($sp1bd56d, '__toString'); } return $sp1bd56d; } public function getName() { return 'sandbox'; } }