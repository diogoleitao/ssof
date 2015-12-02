<?php
class Twig_Node_For extends Twig_Node { protected $loop; public function __construct(Twig_Node_Expression_AssignName $spf6dbe1, Twig_Node_Expression_AssignName $spf730ed, Twig_Node_Expression $spf6a5d7, Twig_Node_Expression $sp8ff448 = null, Twig_NodeInterface $sp1965de, Twig_NodeInterface $sp4fa8a7 = null, $sp1f599c, $sp836199 = null) { $sp1965de = new Twig_Node(array($sp1965de, $this->loop = new Twig_Node_ForLoop($sp1f599c, $sp836199))); if (null !== $sp8ff448) { $sp1965de = new Twig_Node_If(new Twig_Node(array($sp8ff448, $sp1965de)), null, $sp1f599c, $sp836199); } parent::__construct(array('key_target' => $spf6dbe1, 'value_target' => $spf730ed, 'seq' => $spf6a5d7, 'body' => $sp1965de, 'else' => $sp4fa8a7), array('with_loop' => true, 'ifexpr' => null !== $sp8ff448), $sp1f599c, $sp836199); } public function compile(Twig_Compiler $spa1c015) { $spa1c015->addDebugInfo($this)->write('$context[\'_parent\'] = (array) $context;
')->write('$context[\'_seq\'] = twig_ensure_traversable(')->subcompile($this->getNode('seq'))->raw(');
'); if (null !== $this->getNode('else')) { $spa1c015->write('$context[\'_iterated\'] = false;
'); } if ($this->getAttribute('with_loop')) { $spa1c015->write('$context[\'loop\'] = array(
')->write('  \'parent\' => $context[\'_parent\'],
')->write('  \'index0\' => 0,
')->write('  \'index\'  => 1,
')->write('  \'first\'  => true,
')->write(');
'); if (!$this->getAttribute('ifexpr')) { $spa1c015->write('if (is_array($context[\'_seq\']) || (is_object($context[\'_seq\']) && $context[\'_seq\'] instanceof Countable)) {
')->indent()->write('$length = count($context[\'_seq\']);
')->write('$context[\'loop\'][\'revindex0\'] = $length - 1;
')->write('$context[\'loop\'][\'revindex\'] = $length;
')->write('$context[\'loop\'][\'length\'] = $length;
')->write('$context[\'loop\'][\'last\'] = 1 === $length;
')->outdent()->write('}
'); } } $this->loop->setAttribute('else', null !== $this->getNode('else')); $this->loop->setAttribute('with_loop', $this->getAttribute('with_loop')); $this->loop->setAttribute('ifexpr', $this->getAttribute('ifexpr')); $spa1c015->write('foreach ($context[\'_seq\'] as ')->subcompile($this->getNode('key_target'))->raw(' => ')->subcompile($this->getNode('value_target'))->raw(') {
')->indent()->subcompile($this->getNode('body'))->outdent()->write('}
'); if (null !== $this->getNode('else')) { $spa1c015->write('if (!$context[\'_iterated\']) {
')->indent()->subcompile($this->getNode('else'))->outdent()->write('}
'); } $spa1c015->write('$_parent = $context[\'_parent\'];
'); $spa1c015->write('unset($context[\'_seq\'], $context[\'_iterated\'], $context[\'' . $this->getNode('key_target')->getAttribute('name') . '\'], $context[\'' . $this->getNode('value_target')->getAttribute('name') . '\'], $context[\'_parent\'], $context[\'loop\']);' . '
'); $spa1c015->write('$context = array_intersect_key($context, $_parent) + $_parent;
'); } }