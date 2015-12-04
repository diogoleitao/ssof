<?php




abstract class Twig_Test_IntegrationTestCase extends PHPUnit_Framework_TestCase
{
    abstract protected function getExtensions();
    abstract protected function getFixturesDir();

    
    public function testIntegration($Vq4aq0rd5eme, $Vnpz33gb3cxs, $Vjcejcx1bb3f, $Vc0vo4f1f0kv, $Vvpibbwbvf5d, $V2rh1ixpw3ym)
    {
        $this->doIntegrationTest($Vq4aq0rd5eme, $Vnpz33gb3cxs, $Vjcejcx1bb3f, $Vc0vo4f1f0kv, $Vvpibbwbvf5d, $V2rh1ixpw3ym);
    }

    public function getTests()
    {
        $Vex5nvvywam5 = realpath($this->getFixturesDir());
        $V512ofmho3mi = array();

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($Vex5nvvywam5), RecursiveIteratorIterator::LEAVES_ONLY) as $Vq4aq0rd5eme) {
            if (!preg_match('/\.test$/', $Vq4aq0rd5eme)) {
                continue;
            }

            $Vaks55ym420e = file_get_contents($Vq4aq0rd5eme->getRealpath());

            if (preg_match('/
                    --TEST--\s*(.*?)\s*(?:--CONDITION--\s*(.*))?\s*((?:--TEMPLATE(?:\(.*?\))?--(?:.*?))+)\s*(?:--DATA--\s*(.*))?\s*--EXCEPTION--\s*(.*)/sx', $Vaks55ym420e, $V2pnuu5quolb)) {
                $Vnpz33gb3cxs = $V2pnuu5quolb[1];
                $Vjcejcx1bb3f = $V2pnuu5quolb[2];
                $Vc0vo4f1f0kv = $this->parseTemplates($V2pnuu5quolb[3]);
                $Vvpibbwbvf5d = $V2pnuu5quolb[5];
                $V2rh1ixpw3ym = array(array(null, $V2pnuu5quolb[4], null, ''));
            } elseif (preg_match('/--TEST--\s*(.*?)\s*(?:--CONDITION--\s*(.*))?\s*((?:--TEMPLATE(?:\(.*?\))?--(?:.*?))+)--DATA--.*?--EXPECT--.*/s', $Vaks55ym420e, $V2pnuu5quolb)) {
                $Vnpz33gb3cxs = $V2pnuu5quolb[1];
                $Vjcejcx1bb3f = $V2pnuu5quolb[2];
                $Vc0vo4f1f0kv = $this->parseTemplates($V2pnuu5quolb[3]);
                $Vvpibbwbvf5d = false;
                preg_match_all('/--DATA--(.*?)(?:--CONFIG--(.*?))?--EXPECT--(.*?)(?=\-\-DATA\-\-|$)/s', $Vaks55ym420e, $V2rh1ixpw3ym, PREG_SET_ORDER);
            } else {
                throw new InvalidArgumentException(sprintf('Test "%s" is not valid.', str_replace($Vex5nvvywam5.'/', '', $Vq4aq0rd5eme)));
            }

            $V512ofmho3mi[] = array(str_replace($Vex5nvvywam5.'/', '', $Vq4aq0rd5eme), $Vnpz33gb3cxs, $Vjcejcx1bb3f, $Vc0vo4f1f0kv, $Vvpibbwbvf5d, $V2rh1ixpw3ym);
        }

        return $V512ofmho3mi;
    }

    protected function doIntegrationTest($Vq4aq0rd5eme, $Vnpz33gb3cxs, $Vjcejcx1bb3f, $Vc0vo4f1f0kv, $Vvpibbwbvf5d, $V2rh1ixpw3ym)
    {
        if ($Vjcejcx1bb3f) {
            eval('$Vsuyucwnscju = '.$Vjcejcx1bb3f.';');
            if (!$Vsuyucwnscju) {
                $this->markTestSkipped($Vjcejcx1bb3f);
            }
        }

        $Vpnd0azzvluw = new Twig_Loader_Array($Vc0vo4f1f0kv);

        foreach ($V2rh1ixpw3ym as $Vh3cz3bzejsf => $V2pnuu5quolb) {
            $Vgk5sotte4fz = array_merge(array(
                'cache' => false,
                'strict_variables' => true,
            ), $V2pnuu5quolb[2] ? eval($V2pnuu5quolb[2].';') : array());
            $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw, $Vgk5sotte4fz);
            $V2cppyqdygng->addGlobal('global', 'global');
            foreach ($this->getExtensions() as $Vvtyj0zt405w) {
                $V2cppyqdygng->addExtension($Vvtyj0zt405w);
            }

            
            
            if (PHP_VERSION_ID >= 50300) {
                $Vqj3wwguatxw = new ReflectionProperty($V2cppyqdygng, 'templateClassPrefix');
                $Vqj3wwguatxw->setAccessible(true);
                $Vqj3wwguatxw->setValue($V2cppyqdygng, '__TwigTemplate_'.hash('sha256', uniqid(mt_rand(), true), false).'_');
            }

            try {
                $V4lif0h4bhru = $V2cppyqdygng->loadTemplate('index.twig');
            } catch (Exception $Vawjopoun3xn) {
                if (false !== $Vvpibbwbvf5d) {
                    $this->assertEquals(trim($Vvpibbwbvf5d), trim(sprintf('%s: %s', get_class($Vawjopoun3xn), $Vawjopoun3xn->getMessage())));

                    return;
                }

                if ($Vawjopoun3xn instanceof Twig_Error_Syntax) {
                    $Vawjopoun3xn->setTemplateFile($Vq4aq0rd5eme);

                    throw $Vawjopoun3xn;
                }

                throw new Twig_Error(sprintf('%s: %s', get_class($Vawjopoun3xn), $Vawjopoun3xn->getMessage()), -1, $Vq4aq0rd5eme, $Vawjopoun3xn);
            }

            try {
                $Vubzayalqgq4 = trim($V4lif0h4bhru->render(eval($V2pnuu5quolb[1].';')), "\n ");
            } catch (Exception $Vawjopoun3xn) {
                if (false !== $Vvpibbwbvf5d) {
                    $this->assertEquals(trim($Vvpibbwbvf5d), trim(sprintf('%s: %s', get_class($Vawjopoun3xn), $Vawjopoun3xn->getMessage())));

                    return;
                }

                if ($Vawjopoun3xn instanceof Twig_Error_Syntax) {
                    $Vawjopoun3xn->setTemplateFile($Vq4aq0rd5eme);
                } else {
                    $Vawjopoun3xn = new Twig_Error(sprintf('%s: %s', get_class($Vawjopoun3xn), $Vawjopoun3xn->getMessage()), -1, $Vq4aq0rd5eme, $Vawjopoun3xn);
                }

                $Vubzayalqgq4 = trim(sprintf('%s: %s', get_class($Vawjopoun3xn), $Vawjopoun3xn->getMessage()));
            }

            if (false !== $Vvpibbwbvf5d) {
                list($Vnwpwvxwn3wh) = explode(':', $Vvpibbwbvf5d);
                $this->assertThat(null, new PHPUnit_Framework_Constraint_Exception($Vnwpwvxwn3wh));
            }

            $Vawjopoun3xnxpected = trim($V2pnuu5quolb[3], "\n ");

            if ($Vawjopoun3xnxpected != $Vubzayalqgq4) {
                printf("Compiled templates that failed on case %d:\n", $Vh3cz3bzejsf + 1);

                foreach (array_keys($Vc0vo4f1f0kv) as $Vkkm4e2vaxrv) {
                    echo "Template: $Vkkm4e2vaxrv\n";
                    $Vxhxpu2senoc = $Vpnd0azzvluw->getSource($Vkkm4e2vaxrv);
                    echo $V2cppyqdygng->compile($V2cppyqdygng->parse($V2cppyqdygng->tokenize($Vxhxpu2senoc, $Vkkm4e2vaxrv)));
                }
            }
            $this->assertEquals($Vawjopoun3xnxpected, $Vubzayalqgq4, $Vnpz33gb3cxs.' (in '.$Vq4aq0rd5eme.')');
        }
    }

    protected static function parseTemplates($Vaks55ym420e)
    {
        $Vc0vo4f1f0kv = array();
        preg_match_all('/--TEMPLATE(?:\((.*?)\))?--(.*?)(?=\-\-TEMPLATE|$)/s', $Vaks55ym420e, $V2pnuu5quolbes, PREG_SET_ORDER);
        foreach ($V2pnuu5quolbes as $V2pnuu5quolb) {
            $Vc0vo4f1f0kv[($V2pnuu5quolb[1] ? $V2pnuu5quolb[1] : 'index.twig')] = $V2pnuu5quolb[2];
        }

        return $Vc0vo4f1f0kv;
    }
}
