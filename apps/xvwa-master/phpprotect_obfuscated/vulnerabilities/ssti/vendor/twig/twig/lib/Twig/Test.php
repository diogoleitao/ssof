<?php




abstract class Twig_Test implements Twig_TestInterface, Twig_TestCallableInterface
{
    protected $Vbo43qqknf4i;
    protected $V02jggtj2kdh = array();

    public function __construct(array $Vbo43qqknf4i = array())
    {
        $this->options = array_merge(array(
            'callable' => null,
        ), $Vbo43qqknf4i);
    }

    public function getCallable()
    {
        return $this->options['callable'];
    }
}
