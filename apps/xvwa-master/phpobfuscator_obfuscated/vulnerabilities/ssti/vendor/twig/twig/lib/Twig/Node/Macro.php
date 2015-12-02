<?php
class Twig_Node_Macro extends Twig_Node { const VARARGS_NAME = 'varargs'; public function __construct($sp3eec35, Twig_NodeInterface $sp1965de, Twig_NodeInterface $spc5cc06, $sp1f599c, $sp836199 = null) { foreach ($spc5cc06 as $sp257498 => $spe65765) { if (self::VARARGS_NAME === $sp257498) { throw new Twig_Error_Syntax(sprintf('The argument "%s" in macro "%s" cannot be defined because the variable "%s" is reserved for arbitrary arguments', self::VARARGS_NAME, $sp3eec35, self::VARARGS_NAME), $spe65765->getLine()); } } parent::__construct(array('body' => $sp1965de, 'arguments' => $spc5cc06), array('name' => $sp3eec35), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write(sprintf('public function get%s(', $this->getAttribute('name'))); $spffdcfa = count($this->getNode('arguments')); $spd8e1fc = 0; foreach ($this->getNode('arguments') as $sp3eec35 => $sp093bdb) { $spa1c015->raw('$__' . $sp3eec35 . '__ = ')->subcompile($sp093bdb); if (++$spd8e1fc < $spffdcfa) { $spa1c015->raw(', '); } } if (PHP_VERSION_ID >= 50600) { if ($spffdcfa) { $spa1c015->raw(', '); } $spa1c015->raw('...$__varargs__'); } $spa1c015->raw(')
')->write('{
')->indent(); $spa1c015->write('$context = $this->env->mergeGlobals(array(
')->indent(); foreach ($this->getNode('arguments') as $sp3eec35 => $sp093bdb) { $spa1c015->addIndentation()->string($sp3eec35)->raw(' => $__' . $sp3eec35 . '__')->raw(',
'); } $spa1c015->addIndentation()->string(self::VARARGS_NAME)->raw(' => '); if (PHP_VERSION_ID >= 50600) { $spa1c015->raw('$__varargs__,
'); } else { $spa1c015->raw('func_num_args() > ')->repr($spffdcfa)->raw(' ? array_slice(func_get_args(), ')->repr($spffdcfa)->raw(') : array(),
'); } $spa1c015->outdent()->write('));

')->write('$blocks = array();

')->write('ob_start();
')->write('try {
')->indent()->subcompile($this->getNode('body'))->outdent()->write('} catch (Exception $e) {
')->indent()->write('ob_end_clean();

')->write('throw $e;
')->outdent()->write('}

')->write('return (\'\' === $tmp = ob_get_clean()) ? \'\' : new Twig_Markup($tmp, $this->env->getCharset());
')->outdent()->write('}

'); } }