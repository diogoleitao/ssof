<?php




class Twig_Markup implements Countable
{
    protected $Vw1hejthoeh0;
    protected $Vne0bkzg1krv;

    public function __construct($Vw1hejthoeh0, $Vne0bkzg1krv)
    {
        $this->content = (string) $Vw1hejthoeh0;
        $this->charset = $Vne0bkzg1krv;
    }

    public function __toString()
    {
        return $this->content;
    }

    public function count()
    {
        return function_exists('mb_get_info') ? mb_strlen($this->content, $this->charset) : strlen($this->content);
    }
}
