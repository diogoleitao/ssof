<?php



abstract class Twig_Tests_Profiler_Dumper_AbstractTest extends PHPUnit_Framework_TestCase
{
    protected function getProfile()
    {
        $V02pvw3wfyzg = $this->getMockBuilder('Twig_Profiler_Profile')->disableOriginalConstructor()->getMock();

        $V02pvw3wfyzg->expects($this->any())->method('isRoot')->will($this->returnValue(true));
        $V02pvw3wfyzg->expects($this->any())->method('getName')->will($this->returnValue('main'));
        $V02pvw3wfyzg->expects($this->any())->method('getDuration')->will($this->returnValue(1));
        $V02pvw3wfyzg->expects($this->any())->method('getMemoryUsage')->will($this->returnValue(0));
        $V02pvw3wfyzg->expects($this->any())->method('getPeakMemoryUsage')->will($this->returnValue(0));

        $Vw11ydwcs2k4 = array(
            $this->getIndexProfile(
                array(
                    $this->getEmbeddedBlockProfile(),
                    $this->getEmbeddedTemplateProfile(
                        array(
                            $this->getIncludedTemplateProfile(),
                        )
                    ),
                    $this->getMacroProfile(),
                    $this->getEmbeddedTemplateProfile(
                        array(
                            $this->getIncludedTemplateProfile(),
                        )
                    ),
                )
            ),
        );

        $V02pvw3wfyzg->expects($this->any())->method('getProfiles')->will($this->returnValue($Vw11ydwcs2k4));
        $V02pvw3wfyzg->expects($this->any())->method('getIterator')->will($this->returnValue(new ArrayIterator($Vw11ydwcs2k4)));

        return $V02pvw3wfyzg;
    }

    private function getIndexProfile(array $Vw11ydwcs2k4 = array())
    {
        return $this->generateProfile('main', 1, true, 'template', 'index.twig', $Vw11ydwcs2k4);
    }

    private function getEmbeddedBlockProfile(array $Vw11ydwcs2k4 = array())
    {
        return $this->generateProfile('body', 0.0001, false, 'block', 'embedded.twig', $Vw11ydwcs2k4);
    }

    private function getEmbeddedTemplateProfile(array $Vw11ydwcs2k4 = array())
    {
        return $this->generateProfile('main', 0.0001, true, 'template', 'embedded.twig', $Vw11ydwcs2k4);
    }

    private function getIncludedTemplateProfile(array $Vw11ydwcs2k4 = array())
    {
        return $this->generateProfile('main', 0.0001, true, 'template', 'included.twig', $Vw11ydwcs2k4);
    }

    private function getMacroProfile(array $Vw11ydwcs2k4 = array())
    {
        return $this->generateProfile('foo', 0.0001, false, 'macro', 'index.twig', $Vw11ydwcs2k4);
    }

    
    private function generateProfile($Vkkm4e2vaxrv, $Vvyypljy5ij3, $Vlkuufdii43x, $Vtathfumoxhu, $Vx502p0rn0nk, array $Vw11ydwcs2k4 = array())
    {
        $V02pvw3wfyzg = $this->getMockBuilder('Twig_Profiler_Profile')->disableOriginalConstructor()->getMock();

        $V02pvw3wfyzg->expects($this->any())->method('isRoot')->will($this->returnValue(false));
        $V02pvw3wfyzg->expects($this->any())->method('getName')->will($this->returnValue($Vkkm4e2vaxrv));
        $V02pvw3wfyzg->expects($this->any())->method('getDuration')->will($this->returnValue($Vvyypljy5ij3));
        $V02pvw3wfyzg->expects($this->any())->method('getMemoryUsage')->will($this->returnValue(0));
        $V02pvw3wfyzg->expects($this->any())->method('getPeakMemoryUsage')->will($this->returnValue(0));
        $V02pvw3wfyzg->expects($this->any())->method('isTemplate')->will($this->returnValue($Vlkuufdii43x));
        $V02pvw3wfyzg->expects($this->any())->method('getType')->will($this->returnValue($Vtathfumoxhu));
        $V02pvw3wfyzg->expects($this->any())->method('getTemplate')->will($this->returnValue($Vx502p0rn0nk));
        $V02pvw3wfyzg->expects($this->any())->method('getProfiles')->will($this->returnValue($Vw11ydwcs2k4));
        $V02pvw3wfyzg->expects($this->any())->method('getIterator')->will($this->returnValue(new ArrayIterator($Vw11ydwcs2k4)));

        return $V02pvw3wfyzg;
    }
}
