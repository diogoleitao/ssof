<?php




class Twig_Compiler implements Twig_CompilerInterface
{
    protected $Vq43aatlkebo;
    protected $Vxhxpu2senoc;
    protected $Vvrucbn2mrud;
    protected $Vx44ywczaw14;
    protected $Vpzf3krqouzg;
    protected $Vxhxpu2senocOffset;
    protected $Vxhxpu2senocLine;
    protected $V2npxty0bmys;

    
    public function __construct(Twig_Environment $Vx44ywczaw14)
    {
        $this->env = $Vx44ywczaw14;
        $this->debugInfo = array();
    }

    public function getFilename()
    {
        return $this->filename;
    }

    
    public function getEnvironment()
    {
        return $this->env;
    }

    
    public function getSource()
    {
        return $this->source;
    }

    
    public function compile(Twig_NodeInterface $Vz3fbiqci0vl, $Vvrucbn2mrud = 0)
    {
        $this->lastLine = null;
        $this->source = '';
        $this->debugInfo = array();
        $this->sourceOffset = 0;
        
        $this->sourceLine = 1;
        $this->indentation = $Vvrucbn2mrud;

        if ($Vz3fbiqci0vl instanceof Twig_Node_Module) {
            $this->filename = $Vz3fbiqci0vl->getAttribute('filename');
        }

        $Vz3fbiqci0vl->compile($this);

        return $this;
    }

    public function subcompile(Twig_NodeInterface $Vz3fbiqci0vl, $Vv2qasrdbpme = true)
    {
        if (false === $Vv2qasrdbpme) {
            $this->addIndentation();
        }

        $Vz3fbiqci0vl->compile($this);

        return $this;
    }

    
    public function raw($Viabwp03n3sk)
    {
        $this->source .= $Viabwp03n3sk;

        return $this;
    }

    
    public function write()
    {
        $Viabwp03n3sks = func_get_args();
        foreach ($Viabwp03n3sks as $Viabwp03n3sk) {
            $this->addIndentation();
            $this->source .= $Viabwp03n3sk;
        }

        return $this;
    }

    
    public function addIndentation()
    {
        $this->source .= str_repeat(' ', $this->indentation * 4);

        return $this;
    }

    
    public function string($V2dijfr3ez0f)
    {
        $this->source .= sprintf('"%s"', addcslashes($V2dijfr3ez0f, "\0\t\"\$\\"));

        return $this;
    }

    
    public function repr($V2dijfr3ez0f)
    {
        if (is_int($V2dijfr3ez0f) || is_float($V2dijfr3ez0f)) {
            if (false !== $Vhzts1pnkyc2 = setlocale(LC_NUMERIC, 0)) {
                setlocale(LC_NUMERIC, 'C');
            }

            $this->raw($V2dijfr3ez0f);

            if (false !== $Vhzts1pnkyc2) {
                setlocale(LC_NUMERIC, $Vhzts1pnkyc2);
            }
        } elseif (null === $V2dijfr3ez0f) {
            $this->raw('null');
        } elseif (is_bool($V2dijfr3ez0f)) {
            $this->raw($V2dijfr3ez0f ? 'true' : 'false');
        } elseif (is_array($V2dijfr3ez0f)) {
            $this->raw('array(');
            $Vspubgfk23ku = true;
            foreach ($V2dijfr3ez0f as $Vks5xpccznyi => $Vwsyawgcujk4) {
                if (!$Vspubgfk23ku) {
                    $this->raw(', ');
                }
                $Vspubgfk23ku = false;
                $this->repr($Vks5xpccznyi);
                $this->raw(' => ');
                $this->repr($Vwsyawgcujk4);
            }
            $this->raw(')');
        } else {
            $this->string($V2dijfr3ez0f);
        }

        return $this;
    }

    
    public function addDebugInfo(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        if ($Vz3fbiqci0vl->getLine() != $this->lastLine) {
            $this->write(sprintf("// line %d\n", $Vz3fbiqci0vl->getLine()));

            
            
            
            if (((int) ini_get('mbstring.func_overload')) & 2) {
                
                $this->sourceLine += mb_substr_count(mb_substr($this->source, $this->sourceOffset), "\n");
            } else {
                $this->sourceLine += substr_count($this->source, "\n", $this->sourceOffset);
            }
            $this->sourceOffset = strlen($this->source);
            $this->debugInfo[$this->sourceLine] = $Vz3fbiqci0vl->getLine();

            $this->lastLine = $Vz3fbiqci0vl->getLine();
        }

        return $this;
    }

    public function getDebugInfo()
    {
        ksort($this->debugInfo);

        return $this->debugInfo;
    }

    
    public function indent($Vit3kd5mtaop = 1)
    {
        $this->indentation += $Vit3kd5mtaop;

        return $this;
    }

    
    public function outdent($Vit3kd5mtaop = 1)
    {
        
        if ($this->indentation < $Vit3kd5mtaop) {
            throw new LogicException('Unable to call outdent() as the indentation would become negative');
        }

        $this->indentation -= $Vit3kd5mtaop;

        return $this;
    }

    public function getVarName()
    {
        return sprintf('__internal_%s', hash('sha256', uniqid(mt_rand(), true), false));
    }
}
