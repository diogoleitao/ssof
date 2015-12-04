<?php




class Twig_TokenParserBroker implements Twig_TokenParserBrokerInterface
{
    protected $Vqfx20r3yfax;
    protected $Vqfx20r3yfaxs = array();
    protected $V31yh1iyt34f = array();

    
    public function __construct($Vqfx20r3yfaxs = array(), $V31yh1iyt34f = array())
    {
        foreach ($Vqfx20r3yfaxs as $Vqfx20r3yfax) {
            if (!$Vqfx20r3yfax instanceof Twig_TokenParserInterface) {
                throw new LogicException('$Vqfx20r3yfaxs must a an array of Twig_TokenParserInterface');
            }
            $this->parsers[$Vqfx20r3yfax->getTag()] = $Vqfx20r3yfax;
        }
        foreach ($V31yh1iyt34f as $Vgeh1juztbm5) {
            if (!$Vgeh1juztbm5 instanceof Twig_TokenParserBrokerInterface) {
                throw new LogicException('$V31yh1iyt34f must a an array of Twig_TokenParserBrokerInterface');
            }
            $this->brokers[] = $Vgeh1juztbm5;
        }
    }

    
    public function addTokenParser(Twig_TokenParserInterface $Vqfx20r3yfax)
    {
        $this->parsers[$Vqfx20r3yfax->getTag()] = $Vqfx20r3yfax;
    }

    
    public function removeTokenParser(Twig_TokenParserInterface $Vqfx20r3yfax)
    {
        $Vkkm4e2vaxrv = $Vqfx20r3yfax->getTag();
        if (isset($this->parsers[$Vkkm4e2vaxrv]) && $Vqfx20r3yfax === $this->parsers[$Vkkm4e2vaxrv]) {
            unset($this->parsers[$Vkkm4e2vaxrv]);
        }
    }

    
    public function addTokenParserBroker(Twig_TokenParserBroker $Vgeh1juztbm5)
    {
        $this->brokers[] = $Vgeh1juztbm5;
    }

    
    public function removeTokenParserBroker(Twig_TokenParserBroker $Vgeh1juztbm5)
    {
        if (false !== $Vbjmk1rrxfqv = array_search($Vgeh1juztbm5, $this->brokers)) {
            unset($this->brokers[$Vbjmk1rrxfqv]);
        }
    }

    
    public function getTokenParser($Vyzs3kd551qh)
    {
        if (isset($this->parsers[$Vyzs3kd551qh])) {
            return $this->parsers[$Vyzs3kd551qh];
        }
        $Vgeh1juztbm5 = end($this->brokers);
        while (false !== $Vgeh1juztbm5) {
            $Vqfx20r3yfax = $Vgeh1juztbm5->getTokenParser($Vyzs3kd551qh);
            if (null !== $Vqfx20r3yfax) {
                return $Vqfx20r3yfax;
            }
            $Vgeh1juztbm5 = prev($this->brokers);
        }
    }

    public function getParsers()
    {
        return $this->parsers;
    }

    public function getParser()
    {
        return $this->parser;
    }

    public function setParser(Twig_ParserInterface $Vqfx20r3yfax)
    {
        $this->parser = $Vqfx20r3yfax;
        foreach ($this->parsers as $Vspgswyhdzwj) {
            $Vspgswyhdzwj->setParser($Vqfx20r3yfax);
        }
        foreach ($this->brokers as $Vgeh1juztbm5) {
            $Vgeh1juztbm5->setParser($Vqfx20r3yfax);
        }
    }
}
