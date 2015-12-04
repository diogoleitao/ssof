<?php


abstract class Twig_Node_Expression_Call extends Twig_Node_Expression
{
    protected function compileCallable(Twig_Compiler $V3hf0s3ktsxh)
    {
        $Vcdzdjbgqgc5 = false;
        if ($this->hasAttribute('callable') && $Vicg521opc2w = $this->getAttribute('callable')) {
            if (is_string($Vicg521opc2w)) {
                $V3hf0s3ktsxh->raw($Vicg521opc2w);
            } elseif (is_array($Vicg521opc2w) && $Vicg521opc2w[0] instanceof Twig_ExtensionInterface) {
                $V3hf0s3ktsxh->raw(sprintf('$this->env->getExtension(\'%s\')->%s', $Vicg521opc2w[0]->getName(), $Vicg521opc2w[1]));
            } else {
                $Vtathfumoxhu = ucfirst($this->getAttribute('type'));
                $V3hf0s3ktsxh->raw(sprintf('call_user_func_array($this->env->get%s(\'%s\')->getCallable(), array', $Vtathfumoxhu, $this->getAttribute('name')));
                $Vcdzdjbgqgc5 = true;
            }
        } else {
            $V3hf0s3ktsxh->raw($this->getAttribute('thing')->compile());
        }

        $this->compileArguments($V3hf0s3ktsxh);

        if ($Vcdzdjbgqgc5) {
            $V3hf0s3ktsxh->raw(')');
        }
    }

    protected function compileArguments(Twig_Compiler $V3hf0s3ktsxh)
    {
        $V3hf0s3ktsxh->raw('(');

        $Vspubgfk23ku = true;

        if ($this->hasAttribute('needs_environment') && $this->getAttribute('needs_environment')) {
            $V3hf0s3ktsxh->raw('$this->env');
            $Vspubgfk23ku = false;
        }

        if ($this->hasAttribute('needs_context') && $this->getAttribute('needs_context')) {
            if (!$Vspubgfk23ku) {
                $V3hf0s3ktsxh->raw(', ');
            }
            $V3hf0s3ktsxh->raw('$Vhmvn2c55ghv');
            $Vspubgfk23ku = false;
        }

        if ($this->hasAttribute('arguments')) {
            foreach ($this->getAttribute('arguments') as $Vnlyqa1zys3i) {
                if (!$Vspubgfk23ku) {
                    $V3hf0s3ktsxh->raw(', ');
                }
                $V3hf0s3ktsxh->string($Vnlyqa1zys3i);
                $Vspubgfk23ku = false;
            }
        }

        if ($this->hasNode('node')) {
            if (!$Vspubgfk23ku) {
                $V3hf0s3ktsxh->raw(', ');
            }
            $V3hf0s3ktsxh->subcompile($this->getNode('node'));
            $Vspubgfk23ku = false;
        }

        if ($this->hasNode('arguments') && null !== $this->getNode('arguments')) {
            $Vicg521opc2w = $this->hasAttribute('callable') ? $this->getAttribute('callable') : null;

            $Vnlyqa1zys3is = $this->getArguments($Vicg521opc2w, $this->getNode('arguments'));

            foreach ($Vnlyqa1zys3is as $Vz3fbiqci0vl) {
                if (!$Vspubgfk23ku) {
                    $V3hf0s3ktsxh->raw(', ');
                }
                $V3hf0s3ktsxh->subcompile($Vz3fbiqci0vl);
                $Vspubgfk23ku = false;
            }
        }

        $V3hf0s3ktsxh->raw(')');
    }

    protected function getArguments($Vicg521opc2w, $Vnlyqa1zys3is)
    {
        $Vxrkzlhk3tnq = $this->getAttribute('type');
        $Vqauf1mrmnwd = $this->getAttribute('name');

        $V3urvws4idjm = array();
        $Vxjlqezeqn43 = false;
        foreach ($Vnlyqa1zys3is as $Vkkm4e2vaxrv => $Vz3fbiqci0vl) {
            if (!is_int($Vkkm4e2vaxrv)) {
                $Vxjlqezeqn43 = true;
                $Vkkm4e2vaxrv = $this->normalizeName($Vkkm4e2vaxrv);
            } elseif ($Vxjlqezeqn43) {
                throw new Twig_Error_Syntax(sprintf('Positional arguments cannot be used after named arguments for %s "%s".', $Vxrkzlhk3tnq, $Vqauf1mrmnwd));
            }

            $V3urvws4idjm[$Vkkm4e2vaxrv] = $Vz3fbiqci0vl;
        }

        $V3xcoeesx2ld = $this->hasAttribute('is_variadic') && $this->getAttribute('is_variadic');
        if (!$Vxjlqezeqn43 && !$V3xcoeesx2ld) {
            return $V3urvws4idjm;
        }

        if (!$Vicg521opc2w) {
            if ($Vxjlqezeqn43) {
                $Vnpz33gb3cxs = sprintf('Named arguments are not supported for %s "%s".', $Vxrkzlhk3tnq, $Vqauf1mrmnwd);
            } else {
                $Vnpz33gb3cxs = sprintf('Arbitrary positional arguments are not supported for %s "%s".', $Vxrkzlhk3tnq, $Vqauf1mrmnwd);
            }

            throw new LogicException($Vnpz33gb3cxs);
        }

        
        if (is_array($Vicg521opc2w)) {
            $Vto203c3rzkl = new ReflectionMethod($Vicg521opc2w[0], $Vicg521opc2w[1]);
        } elseif (is_object($Vicg521opc2w) && !$Vicg521opc2w instanceof Closure) {
            $Vto203c3rzkl = new ReflectionObject($Vicg521opc2w);
            $Vto203c3rzkl = $Vto203c3rzkl->getMethod('__invoke');
        } elseif (is_string($Vicg521opc2w) && false !== strpos($Vicg521opc2w, '::')) {
            $Vto203c3rzkl = new ReflectionMethod($Vicg521opc2w);
        } else {
            $Vto203c3rzkl = new ReflectionFunction($Vicg521opc2w);
        }

        $Vp2vvq12metn = $Vto203c3rzkl->getParameters();
        if ($this->hasNode('node')) {
            array_shift($Vp2vvq12metn);
        }
        if ($this->hasAttribute('needs_environment') && $this->getAttribute('needs_environment')) {
            array_shift($Vp2vvq12metn);
        }
        if ($this->hasAttribute('needs_context') && $this->getAttribute('needs_context')) {
            array_shift($Vp2vvq12metn);
        }
        if ($this->hasAttribute('arguments') && null !== $this->getAttribute('arguments')) {
            foreach ($this->getAttribute('arguments') as $Vnlyqa1zys3i) {
                array_shift($Vp2vvq12metn);
            }
        }
        if ($V3xcoeesx2ld) {
            $Vnlyqa1zys3i = end($Vp2vvq12metn);
            if ($Vnlyqa1zys3i && $Vnlyqa1zys3i->isArray() && $Vnlyqa1zys3i->isDefaultValueAvailable() && array() === $Vnlyqa1zys3i->getDefaultValue()) {
                array_pop($Vp2vvq12metn);
            } else {
                $Vicg521opc2wName = $Vto203c3rzkl->name;
                if ($Vto203c3rzkl->getDeclaringClass()) {
                    $Vicg521opc2wName = $Vto203c3rzkl->getDeclaringClass()->name.'::'.$Vicg521opc2wName;
                }

                throw new LogicException(sprintf('The last parameter of "%s" for %s "%s" must be an array with default value, eg. "array $Vwc2eazpip14 = array()".', $Vicg521opc2wName, $Vxrkzlhk3tnq, $Vqauf1mrmnwd));
            }
        }

        $Vnlyqa1zys3is = array();
        $Vkkm4e2vaxrvs = array();
        $V2qg3xkgvcra = array();
        $Vigivlnnsnud = array();
        $Vbjmk1rrxfqv = 0;
        foreach ($Vp2vvq12metn as $V5ulcogck31f) {
            $Vkkm4e2vaxrvs[] = $Vkkm4e2vaxrv = $this->normalizeName($V5ulcogck31f->name);

            if (array_key_exists($Vkkm4e2vaxrv, $V3urvws4idjm)) {
                if (array_key_exists($Vbjmk1rrxfqv, $V3urvws4idjm)) {
                    throw new Twig_Error_Syntax(sprintf('Argument "%s" is defined twice for %s "%s".', $Vkkm4e2vaxrv, $Vxrkzlhk3tnq, $Vqauf1mrmnwd));
                }

                if (!empty($V2qg3xkgvcra)) {
                    throw new Twig_Error_Syntax(sprintf(
                        'Argument "%s" could not be assigned for %s "%s(%s)" because it is mapped to an internal PHP function which cannot determine default value for optional argument%s "%s".',
                        $Vkkm4e2vaxrv, $Vxrkzlhk3tnq, $Vqauf1mrmnwd, implode(', ', $Vkkm4e2vaxrvs), count($V2qg3xkgvcra) > 1 ? 's' : '', implode('", "', $V2qg3xkgvcra))
                    );
                }

                $Vnlyqa1zys3is = array_merge($Vnlyqa1zys3is, $Vigivlnnsnud);
                $Vnlyqa1zys3is[] = $V3urvws4idjm[$Vkkm4e2vaxrv];
                unset($V3urvws4idjm[$Vkkm4e2vaxrv]);
                $Vigivlnnsnud = array();
            } elseif (array_key_exists($Vbjmk1rrxfqv, $V3urvws4idjm)) {
                $Vnlyqa1zys3is = array_merge($Vnlyqa1zys3is, $Vigivlnnsnud);
                $Vnlyqa1zys3is[] = $V3urvws4idjm[$Vbjmk1rrxfqv];
                unset($V3urvws4idjm[$Vbjmk1rrxfqv]);
                $Vigivlnnsnud = array();
                ++$Vbjmk1rrxfqv;
            } elseif ($V5ulcogck31f->isDefaultValueAvailable()) {
                $Vigivlnnsnud[] = new Twig_Node_Expression_Constant($V5ulcogck31f->getDefaultValue(), -1);
            } elseif ($V5ulcogck31f->isOptional()) {
                if (empty($V3urvws4idjm)) {
                    break;
                } else {
                    $V2qg3xkgvcra[] = $Vkkm4e2vaxrv;
                }
            } else {
                throw new Twig_Error_Syntax(sprintf('Value for argument "%s" is required for %s "%s".', $Vkkm4e2vaxrv, $Vxrkzlhk3tnq, $Vqauf1mrmnwd));
            }
        }

        if ($V3xcoeesx2ld) {
            $V2dopm5nsaxj = new Twig_Node_Expression_Array(array(), -1);
            foreach ($V3urvws4idjm as $Vks5xpccznyi => $V2dijfr3ez0f) {
                if (is_int($Vks5xpccznyi)) {
                    $V2dopm5nsaxj->addElement($V2dijfr3ez0f);
                } else {
                    $V2dopm5nsaxj->addElement($V2dijfr3ez0f, new Twig_Node_Expression_Constant($Vks5xpccznyi, -1));
                }
                unset($V3urvws4idjm[$Vks5xpccznyi]);
            }

            if ($V2dopm5nsaxj->count()) {
                $Vnlyqa1zys3is = array_merge($Vnlyqa1zys3is, $Vigivlnnsnud);
                $Vnlyqa1zys3is[] = $V2dopm5nsaxj;
            }
        }

        if (!empty($V3urvws4idjm)) {
            $Vd3p1oqvvovm = null;
            foreach ($V3urvws4idjm as $V5ulcogck31feter) {
                if ($V5ulcogck31feter instanceof Twig_Node) {
                    $Vd3p1oqvvovm = $V5ulcogck31feter;
                    break;
                }
            }

            throw new Twig_Error_Syntax(sprintf(
                'Unknown argument%s "%s" for %s "%s(%s)".',
                count($V3urvws4idjm) > 1 ? 's' : '', implode('", "', array_keys($V3urvws4idjm)), $Vxrkzlhk3tnq, $Vqauf1mrmnwd, implode(', ', $Vkkm4e2vaxrvs)
            ), $Vd3p1oqvvovm ? $Vd3p1oqvvovm->getLine() : -1);
        }

        return $Vnlyqa1zys3is;
    }

    protected function normalizeName($Vkkm4e2vaxrv)
    {
        return strtolower(preg_replace(array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'), array('\\1_\\2', '\\1_\\2'), $Vkkm4e2vaxrv));
    }
}
