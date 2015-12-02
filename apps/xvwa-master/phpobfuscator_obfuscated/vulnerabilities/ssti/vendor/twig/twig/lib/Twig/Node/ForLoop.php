<?php
class Twig_Node_ForLoop extends Twig_Node { public function __construct($sp1f599c, $sp836199 = null) { parent::__construct(array(), array('with_loop' => false, 'ifexpr' => false, 'else' => false), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { if ($this->getAttribute('else')) { $spa1c015->write('$context[\'_iterated\'] = true;
'); } if ($this->getAttribute('with_loop')) { $spa1c015->write('++$context[\'loop\'][\'index0\'];
')->write('++$context[\'loop\'][\'index\'];
')->write('$context[\'loop\'][\'first\'] = false;
'); if (!$this->getAttribute('ifexpr')) { $spa1c015->write('if (isset($context[\'loop\'][\'length\'])) {
')->indent()->write('--$context[\'loop\'][\'revindex0\'];
')->write('--$context[\'loop\'][\'revindex\'];
')->write('$context[\'loop\'][\'last\'] = 0 === $context[\'loop\'][\'revindex0\'];
')->outdent()->write('}
'); } } } }