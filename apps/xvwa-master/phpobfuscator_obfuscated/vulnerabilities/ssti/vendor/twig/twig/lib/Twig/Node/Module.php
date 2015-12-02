<?php
class Twig_Node_Module extends Twig_Node { public function __construct(Twig_NodeInterface $sp1965de, Twig_Node_Expression $sped512c = null, Twig_NodeInterface $sp8696f5, Twig_NodeInterface $sp964cdb, Twig_NodeInterface $spdf8f90, $sp38ff4f, $sp79b407) { parent::__construct(array('parent' => $sped512c, 'body' => $sp1965de, 'blocks' => $sp8696f5, 'macros' => $sp964cdb, 'traits' => $spdf8f90, 'display_start' => new Twig_Node(), 'display_end' => new Twig_Node(), 'constructor_start' => new Twig_Node(), 'constructor_end' => new Twig_Node(), 'class_end' => new Twig_Node()), array('filename' => $sp79b407, 'index' => null, 'embedded_templates' => $sp38ff4f), 1); } public function setIndex($sp0eb4bf) { $this->setAttribute('index', $sp0eb4bf); } public function compile(Twig_Compiler $spa1c015) { $this->compileTemplate($spa1c015); foreach ($this->getAttribute('embedded_templates') as $spe32893) { $spa1c015->subcompile($spe32893); } } protected function compileTemplate(Twig_Compiler $spa1c015) { if (!$this->getAttribute('index')) { $spa1c015->write('<?php'); } $this->compileClassHeader($spa1c015); if (count($this->getNode('blocks')) || count($this->getNode('traits')) || null === $this->getNode('parent') || $this->getNode('parent') instanceof Twig_Node_Expression_Constant || count($this->getNode('constructor_start')) || count($this->getNode('constructor_end'))) { $this->compileConstructor($spa1c015); } $this->compileGetParent($spa1c015); $this->compileDisplay($spa1c015); $spa1c015->subcompile($this->getNode('blocks')); $this->compileMacros($spa1c015); $this->compileGetTemplateName($spa1c015); $this->compileIsTraitable($spa1c015); $this->compileDebugInfo($spa1c015); $this->compileClassFooter($spa1c015); } protected function compileGetParent(Twig_Compiler $spa1c015) { if (null === ($sped512c = $this->getNode('parent'))) { return; } $spa1c015->write('protected function doGetParent(array $context)
', '{
')->indent()->addDebugInfo($sped512c)->write('return '); if ($sped512c instanceof Twig_Node_Expression_Constant) { $spa1c015->subcompile($sped512c); } else { $spa1c015->raw('$this->loadTemplate(')->subcompile($sped512c)->raw(', ')->repr($spa1c015->getFilename())->raw(', ')->repr($this->getNode('parent')->getLine())->raw(')'); } $spa1c015->raw(';
')->outdent()->write('}

'); } protected function compileClassHeader(Twig_Compiler $spa1c015) { $spa1c015->write('

')->write('/* ' . str_replace('*/', '* /', $this->getAttribute('filename')) . ' */
')->write('class ' . $spa1c015->getEnvironment()->getTemplateClass($this->getAttribute('filename'), $this->getAttribute('index')))->raw(sprintf(' extends %s
', $spa1c015->getEnvironment()->getBaseTemplateClass()))->write('{
')->indent(); } protected function compileConstructor(Twig_Compiler $spa1c015) { $spa1c015->write('public function __construct(Twig_Environment $env)
', '{
')->indent()->subcompile($this->getNode('constructor_start'))->write('parent::__construct($env);

'); if (null === ($sped512c = $this->getNode('parent'))) { $spa1c015->write('$this->parent = false;

'); } elseif ($sped512c instanceof Twig_Node_Expression_Constant) { $spa1c015->addDebugInfo($sped512c)->write('$this->parent = $this->loadTemplate(')->subcompile($sped512c)->raw(', ')->repr($spa1c015->getFilename())->raw(', ')->repr($this->getNode('parent')->getLine())->raw(');
'); } $spf29a2e = count($this->getNode('traits')); if ($spf29a2e) { foreach ($this->getNode('traits') as $spc83c7f => $sp06a7e9) { $this->compileLoadTemplate($spa1c015, $sp06a7e9->getNode('template'), sprintf('$_trait_%s', $spc83c7f)); $spa1c015->addDebugInfo($sp06a7e9->getNode('template'))->write(sprintf('if (!$_trait_%s->isTraitable()) {
', $spc83c7f))->indent()->write('throw new Twig_Error_Runtime(\'Template "\'.')->subcompile($sp06a7e9->getNode('template'))->raw('.\'" cannot be used as a trait.\');
')->outdent()->write('}
')->write(sprintf('$_trait_%s_blocks = $_trait_%s->getBlocks();

', $spc83c7f, $spc83c7f)); foreach ($sp06a7e9->getNode('targets') as $spd888fc => $spbb4d96) { $spa1c015->write(sprintf('if (!isset($_trait_%s_blocks[', $spc83c7f))->string($spd888fc)->raw('])) {
')->indent()->write('throw new Twig_Error_Runtime(sprintf(\'Block ')->string($spd888fc)->raw(' is not defined in trait ')->subcompile($sp06a7e9->getNode('template'))->raw('.\'));
')->outdent()->write('}

')->write(sprintf('$_trait_%s_blocks[', $spc83c7f))->subcompile($spbb4d96)->raw(sprintf('] = $_trait_%s_blocks[', $spc83c7f))->string($spd888fc)->raw(sprintf(']; unset($_trait_%s_blocks[', $spc83c7f))->string($spd888fc)->raw(']);

'); } } if ($spf29a2e > 1) { $spa1c015->write('$this->traits = array_merge(
')->indent(); for ($spc83c7f = 0; $spc83c7f < $spf29a2e; ++$spc83c7f) { $spa1c015->write(sprintf('$_trait_%s_blocks' . ($spc83c7f == $spf29a2e - 1 ? '' : ',') . '
', $spc83c7f)); } $spa1c015->outdent()->write(');

'); } else { $spa1c015->write('$this->traits = $_trait_0_blocks;

'); } $spa1c015->write('$this->blocks = array_merge(
')->indent()->write('$this->traits,
')->write('array(
'); } else { $spa1c015->write('$this->blocks = array(
'); } $spa1c015->indent(); foreach ($this->getNode('blocks') as $sp3eec35 => $spcefb62) { $spa1c015->write(sprintf('\'%s\' => array($this, \'block_%s\'),
', $sp3eec35, $sp3eec35)); } if ($spf29a2e) { $spa1c015->outdent()->write(')
'); } $spa1c015->outdent()->write(');
')->outdent()->subcompile($this->getNode('constructor_end'))->write('}

'); } protected function compileDisplay(Twig_Compiler $spa1c015) { $spa1c015->write('protected function doDisplay(array $context, array $blocks = array())
', '{
')->indent()->subcompile($this->getNode('display_start'))->subcompile($this->getNode('body')); if (null !== ($sped512c = $this->getNode('parent'))) { $spa1c015->addDebugInfo($sped512c); if ($sped512c instanceof Twig_Node_Expression_Constant) { $spa1c015->write('$this->parent'); } else { $spa1c015->write('$this->getParent($context)'); } $spa1c015->raw('->display($context, array_merge($this->blocks, $blocks));
'); } $spa1c015->subcompile($this->getNode('display_end'))->outdent()->write('}

'); } protected function compileClassFooter(Twig_Compiler $spa1c015) { $spa1c015->subcompile($this->getNode('class_end'))->outdent()->write('}
'); } protected function compileMacros(Twig_Compiler $spa1c015) { $spa1c015->subcompile($this->getNode('macros')); } protected function compileGetTemplateName(Twig_Compiler $spa1c015) { $spa1c015->write('public function getTemplateName()
', '{
')->indent()->write('return ')->repr($this->getAttribute('filename'))->raw(';
')->outdent()->write('}

'); } protected function compileIsTraitable(Twig_Compiler $spa1c015) { $spce40de = null === $this->getNode('parent') && 0 === count($this->getNode('macros')); if ($spce40de) { if ($this->getNode('body') instanceof Twig_Node_Body) { $sp6619de = $this->getNode('body')->getNode(0); } else { $sp6619de = $this->getNode('body'); } if (!count($sp6619de)) { $sp6619de = new Twig_Node(array($sp6619de)); } foreach ($sp6619de as $spcefb62) { if (!count($spcefb62)) { continue; } if ($spcefb62 instanceof Twig_Node_Text && ctype_space($spcefb62->getAttribute('data'))) { continue; } if ($spcefb62 instanceof Twig_Node_BlockReference) { continue; } $spce40de = false; break; } } if ($spce40de) { return; } $spa1c015->write('public function isTraitable()
', '{
')->indent()->write(sprintf('return %s;
', $spce40de ? 'true' : 'false'))->outdent()->write('}

'); } protected function compileDebugInfo(Twig_Compiler $spa1c015) { $spa1c015->write('public function getDebugInfo()
', '{
')->indent()->write(sprintf('return %s;
', str_replace('
', '', var_export(array_reverse($spa1c015->getDebugInfo(), true), true))))->outdent()->write('}
'); } protected function compileLoadTemplate(Twig_Compiler $spa1c015, $spcefb62, $sp517828) { if ($spcefb62 instanceof Twig_Node_Expression_Constant) { $spa1c015->write(sprintf('%s = $this->loadTemplate(', $sp517828))->subcompile($spcefb62)->raw(', ')->repr($spa1c015->getFilename())->raw(', ')->repr($spcefb62->getLine())->raw(');
'); } else { $spa1c015->write(sprintf('%s = ', $sp517828))->subcompile($spcefb62)->raw(';
')->write(sprintf('if (!%s', $sp517828))->raw(' instanceof Twig_Template) {
')->indent()->write(sprintf('%s = $this->loadTemplate(%s')->raw(', ')->repr($spa1c015->getFilename())->raw(', ')->repr($spcefb62->getLine())->raw(');
', $sp517828, $sp517828))->outdent()->write('}
'); } } }