<?php
class Twig_TokenParser_Do extends Twig_TokenParser { public function parse(Twig_Token $sp650e38) { $sp005e3e = $this->parser->getExpressionParser()->parseExpression(); $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE); return new Twig_Node_Do($sp005e3e, $sp650e38->getLine(), $this->getTag()); } public function getTag() { return 'do'; } }