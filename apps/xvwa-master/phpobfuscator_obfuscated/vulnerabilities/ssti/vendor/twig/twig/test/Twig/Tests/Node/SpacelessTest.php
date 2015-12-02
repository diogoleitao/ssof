<?php
class Twig_Tests_Node_SpacelessTest extends Twig_Test_NodeTestCase { public function testConstructor() { $sp1965de = new Twig_Node(array(new Twig_Node_Text('<div>   <div>   foo   </div>   </div>', 1))); $spcefb62 = new Twig_Node_Spaceless($sp1965de, 1); $this->assertEquals($sp1965de, $spcefb62->getNode('body')); } public function getTests() { $sp1965de = new Twig_Node(array(new Twig_Node_Text('<div>   <div>   foo   </div>   </div>', 1))); $spcefb62 = new Twig_Node_Spaceless($sp1965de, 1); return array(array($spcefb62, '// line 1
ob_start();
echo "<div>   <div>   foo   </div>   </div>";
echo trim(preg_replace(\'/>\\s+</\', \'><\', ob_get_clean()));')); } }