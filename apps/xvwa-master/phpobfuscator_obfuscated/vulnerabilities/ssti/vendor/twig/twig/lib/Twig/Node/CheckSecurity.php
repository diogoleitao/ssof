<?php
class Twig_Node_CheckSecurity extends Twig_Node { protected $usedFilters; protected $usedTags; protected $usedFunctions; public function __construct(array $spb20ded, array $spd4f663, array $spaab14e) { $this->usedFilters = $spb20ded; $this->usedTags = $spd4f663; $this->usedFunctions = $spaab14e; parent::__construct(); } public function compile(Twig_Compiler $spa1c015) { $sp53db34 = $sp34c924 = $spbe1c61 = array(); foreach (array('tags', 'filters', 'functions') as $sp32ff7e) { foreach ($this->{'used' . ucfirst($sp32ff7e)} as $sp3eec35 => $spcefb62) { if ($spcefb62 instanceof Twig_Node) { ${$sp32ff7e}[$sp3eec35] = $spcefb62->getLine(); } else { ${$sp32ff7e}[$spcefb62] = null; } } } $spa1c015->write('$tags = ')->repr(array_filter($sp53db34))->raw(';
')->write('$filters = ')->repr(array_filter($sp34c924))->raw(';
')->write('$functions = ')->repr(array_filter($spbe1c61))->raw(';

')->write('try {
')->indent()->write('$this->env->getExtension(\'sandbox\')->checkSecurity(
')->indent()->write(!$sp53db34 ? 'array(),
' : 'array(\'' . implode('\', \'', array_keys($sp53db34)) . '\'),
')->write(!$sp34c924 ? 'array(),
' : 'array(\'' . implode('\', \'', array_keys($sp34c924)) . '\'),
')->write(!$spbe1c61 ? 'array()
' : 'array(\'' . implode('\', \'', array_keys($spbe1c61)) . '\')
')->outdent()->write(');
')->outdent()->write('} catch (Twig_Sandbox_SecurityError $e) {
')->indent()->write('$e->setTemplateFile($this->getTemplateName());

')->write('if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
')->indent()->write('$e->setTemplateLine($tags[$e->getTagName()]);
')->outdent()->write('} elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
')->indent()->write('$e->setTemplateLine($filters[$e->getFilterName()]);
')->outdent()->write('} elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
')->indent()->write('$e->setTemplateLine($functions[$e->getFunctionName()]);
')->outdent()->write('}

')->write('throw $e;
')->outdent()->write('}

'); } }