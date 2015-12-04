<?php



class Twig_Tests_NativeExtensionTest extends PHPUnit_Framework_TestCase
{
    public function testGetProperties()
    {
        if (defined('HHVM_VERSION')) {
            $this->markTestSkipped('Skip under HHVM as the behavior is not the same as plain PHP (which is an edge case anyway)');
        }

        $V2cppyqdygng = new Twig_Environment(new Twig_Loader_Array(array('index' => '{{ d1.date }}{{ d2.date }}')), array(
            'debug' => true,
            'cache' => false,
            'autoescape' => false,
        ));

        $Verfmwyrnq5d = new DateTime();
        $Vbhhfsdtmayu = new DateTime();
        $Vubzayalqgq4 = $V2cppyqdygng->render('index', compact('d1', 'd2'));

        
        $this->assertEquals($Vubzayalqgq4, $Verfmwyrnq5d->date.$Vbhhfsdtmayu->date);
    }
}
