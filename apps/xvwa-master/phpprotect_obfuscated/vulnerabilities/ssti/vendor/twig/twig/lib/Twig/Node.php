<?php




class Twig_Node implements Twig_NodeInterface
{
    protected $V5pu4tsy2yad;
    protected $Vszrzh51wqf1;
    protected $Vy5krvyy5dgq;
    protected $Vyzs3kd551qh;

    
    public function __construct(array $V5pu4tsy2yad = array(), array $Vszrzh51wqf1 = array(), $Vy5krvyy5dgq = 0, $Vyzs3kd551qh = null)
    {
        $this->nodes = $V5pu4tsy2yad;
        $this->attributes = $Vszrzh51wqf1;
        $this->lineno = $Vy5krvyy5dgq;
        $this->tag = $Vyzs3kd551qh;
    }

    public function __toString()
    {
        $Vszrzh51wqf1 = array();
        foreach ($this->attributes as $Vkkm4e2vaxrv => $V2dijfr3ez0f) {
            $Vszrzh51wqf1[] = sprintf('%s: %s', $Vkkm4e2vaxrv, str_replace("\n", '', var_export($V2dijfr3ez0f, true)));
        }

        $V4kzgsq5cmsu = array(get_class($this).'('.implode(', ', $Vszrzh51wqf1));

        if (count($this->nodes)) {
            foreach ($this->nodes as $Vkkm4e2vaxrv => $Vz3fbiqci0vl) {
                $Vuf2e30lmssk = strlen($Vkkm4e2vaxrv) + 4;
                $Vz3fbiqci0vlrepr = array();
                foreach (explode("\n", (string) $Vz3fbiqci0vl) as $V0devhuwbm4i) {
                    $Vz3fbiqci0vlrepr[] = str_repeat(' ', $Vuf2e30lmssk).$V0devhuwbm4i;
                }

                $V4kzgsq5cmsu[] = sprintf('  %s: %s', $Vkkm4e2vaxrv, ltrim(implode("\n", $Vz3fbiqci0vlrepr)));
            }

            $V4kzgsq5cmsu[] = ')';
        } else {
            $V4kzgsq5cmsu[0] .= ')';
        }

        return implode("\n", $V4kzgsq5cmsu);
    }

    
    public function toXml($V1hsc1garvs4 = false)
    {
        $Vzmtb2f1kerv = new DOMDocument('1.0', 'UTF-8');
        $Vzmtb2f1kerv->formatOutput = true;
        $Vzmtb2f1kerv->appendChild($V3fxjygjpszz = $Vzmtb2f1kerv->createElement('twig'));

        $V3fxjygjpszz->appendChild($Vz3fbiqci0vl = $Vzmtb2f1kerv->createElement('node'));
        $Vz3fbiqci0vl->setAttribute('class', get_class($this));

        foreach ($this->attributes as $Vkkm4e2vaxrv => $V2dijfr3ez0f) {
            $Vz3fbiqci0vl->appendChild($Vmjdwhnseos2 = $Vzmtb2f1kerv->createElement('attribute'));
            $Vmjdwhnseos2->setAttribute('name', $Vkkm4e2vaxrv);
            $Vmjdwhnseos2->appendChild($Vzmtb2f1kerv->createTextNode($V2dijfr3ez0f));
        }

        foreach ($this->nodes as $Vkkm4e2vaxrv => $Vfuw514z1wy1) {
            if (null === $Vfuw514z1wy1) {
                continue;
            }

            $Vhnvtw3ipfx2 = $Vfuw514z1wy1->toXml(true)->getElementsByTagName('node')->item(0);
            $Vhnvtw3ipfx2 = $Vzmtb2f1kerv->importNode($Vhnvtw3ipfx2, true);
            $Vhnvtw3ipfx2->setAttribute('name', $Vkkm4e2vaxrv);

            $Vz3fbiqci0vl->appendChild($Vhnvtw3ipfx2);
        }

        return $V1hsc1garvs4 ? $Vzmtb2f1kerv : $Vzmtb2f1kerv->saveXml();
    }

    public function compile(Twig_Compiler $V3hf0s3ktsxh)
    {
        foreach ($this->nodes as $Vz3fbiqci0vl) {
            $Vz3fbiqci0vl->compile($V3hf0s3ktsxh);
        }
    }

    public function getLine()
    {
        return $this->lineno;
    }

    public function getNodeTag()
    {
        return $this->tag;
    }

    
    public function hasAttribute($Vkkm4e2vaxrv)
    {
        return array_key_exists($Vkkm4e2vaxrv, $this->attributes);
    }

    
    public function getAttribute($Vkkm4e2vaxrv)
    {
        if (!array_key_exists($Vkkm4e2vaxrv, $this->attributes)) {
            throw new LogicException(sprintf('Attribute "%s" does not exist for Node "%s".', $Vkkm4e2vaxrv, get_class($this)));
        }

        return $this->attributes[$Vkkm4e2vaxrv];
    }

    
    public function setAttribute($Vkkm4e2vaxrv, $V2dijfr3ez0f)
    {
        $this->attributes[$Vkkm4e2vaxrv] = $V2dijfr3ez0f;
    }

    
    public function removeAttribute($Vkkm4e2vaxrv)
    {
        unset($this->attributes[$Vkkm4e2vaxrv]);
    }

    
    public function hasNode($Vkkm4e2vaxrv)
    {
        return array_key_exists($Vkkm4e2vaxrv, $this->nodes);
    }

    
    public function getNode($Vkkm4e2vaxrv)
    {
        if (!array_key_exists($Vkkm4e2vaxrv, $this->nodes)) {
            throw new LogicException(sprintf('Node "%s" does not exist for Node "%s".', $Vkkm4e2vaxrv, get_class($this)));
        }

        return $this->nodes[$Vkkm4e2vaxrv];
    }

    
    public function setNode($Vkkm4e2vaxrv, $Vz3fbiqci0vl = null)
    {
        $this->nodes[$Vkkm4e2vaxrv] = $Vz3fbiqci0vl;
    }

    
    public function removeNode($Vkkm4e2vaxrv)
    {
        unset($this->nodes[$Vkkm4e2vaxrv]);
    }

    public function count()
    {
        return count($this->nodes);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->nodes);
    }
}
