<?php




class Twig_Test_Method extends Twig_Test
{
    protected $Vvtyj0zt405w;
    protected $Vng2lb3h3obx;

    public function __construct(Twig_ExtensionInterface $Vvtyj0zt405w, $Vng2lb3h3obx, array $Vbo43qqknf4i = array())
    {
        $Vbo43qqknf4i['callable'] = array($Vvtyj0zt405w, $Vng2lb3h3obx);

        parent::__construct($Vbo43qqknf4i);

        $this->extension = $Vvtyj0zt405w;
        $this->method = $Vng2lb3h3obx;
    }

    public function compile()
    {
        return sprintf('$this->env->getExtension(\'%s\')->%s', $this->extension->getName(), $this->method);
    }
}
