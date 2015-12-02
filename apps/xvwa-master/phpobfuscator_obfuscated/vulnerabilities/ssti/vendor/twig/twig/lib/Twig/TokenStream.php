<?php
class Twig_TokenStream { protected $tokens; protected $current; protected $filename; public function __construct(array $sp5c5fab, $sp79b407 = null) { $this->tokens = $sp5c5fab; $this->current = 0; $this->filename = $sp79b407; } public function __toString() { return implode('
', $this->tokens); } public function injectTokens(array $sp5c5fab) { $this->tokens = array_merge(array_slice($this->tokens, 0, $this->current), $sp5c5fab, array_slice($this->tokens, $this->current)); } public function next() { if (!isset($this->tokens[++$this->current])) { throw new Twig_Error_Syntax('Unexpected end of template', $this->tokens[$this->current - 1]->getLine(), $this->filename); } return $this->tokens[$this->current - 1]; } public function nextIf($sp81b2a2, $sp5e2031 = null) { if ($this->tokens[$this->current]->test($sp81b2a2, $sp5e2031)) { return $this->next(); } } public function expect($sp32ff7e, $spbb4d96 = null, $sp9f2d02 = null) { $sp650e38 = $this->tokens[$this->current]; if (!$sp650e38->test($sp32ff7e, $spbb4d96)) { $sp1a6fde = $sp650e38->getLine(); throw new Twig_Error_Syntax(sprintf('%sUnexpected token "%s" of value "%s" ("%s" expected%s)', $sp9f2d02 ? $sp9f2d02 . '. ' : '', Twig_Token::typeToEnglish($sp650e38->getType()), $sp650e38->getValue(), Twig_Token::typeToEnglish($sp32ff7e), $spbb4d96 ? sprintf(' with value "%s"', $spbb4d96) : ''), $sp1a6fde, $this->filename); } $this->next(); return $sp650e38; } public function look($sp7cdeab = 1) { if (!isset($this->tokens[$this->current + $sp7cdeab])) { throw new Twig_Error_Syntax('Unexpected end of template', $this->tokens[$this->current + $sp7cdeab - 1]->getLine(), $this->filename); } return $this->tokens[$this->current + $sp7cdeab]; } public function test($sp81b2a2, $sp5e2031 = null) { return $this->tokens[$this->current]->test($sp81b2a2, $sp5e2031); } public function isEOF() { return $this->tokens[$this->current]->getType() === Twig_Token::EOF_TYPE; } public function getCurrent() { return $this->tokens[$this->current]; } public function getFilename() { return $this->filename; } }