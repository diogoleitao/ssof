<?php




abstract class Twig_Function implements Twig_FunctionInterface, Twig_FunctionCallableInterface
{
    protected $Vbo43qqknf4i;
    protected $V02jggtj2kdh = array();

    public function __construct(array $Vbo43qqknf4i = array())
    {
        $this->options = array_merge(array(
            'needs_environment' => false,
            'needs_context' => false,
            'callable' => null,
        ), $Vbo43qqknf4i);
    }

    public function setArguments($V02jggtj2kdh)
    {
        $this->arguments = $V02jggtj2kdh;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    public function needsEnvironment()
    {
        return $this->options['needs_environment'];
    }

    public function needsContext()
    {
        return $this->options['needs_context'];
    }

    public function getSafe(Twig_Node $Voginwo1bpct)
    {
        if (isset($this->options['is_safe'])) {
            return $this->options['is_safe'];
        }

        if (isset($this->options['is_safe_callback'])) {
            return call_user_func($this->options['is_safe_callback'], $Voginwo1bpct);
        }

        return array();
    }

    public function getCallable()
    {
        return $this->options['callable'];
    }
}
