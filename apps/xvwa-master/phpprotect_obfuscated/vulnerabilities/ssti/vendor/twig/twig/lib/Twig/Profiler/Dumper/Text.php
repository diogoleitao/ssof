<?php




class Twig_Profiler_Dumper_Text
{
    private $Vovuqdsh24ps;

    public function dump(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        return $this->dumpProfile($V02pvw3wfyzg);
    }

    protected function formatTemplate(Twig_Profiler_Profile $V02pvw3wfyzg, $V3w1lkk3bwtz)
    {
        return sprintf('%s└ %s', $V3w1lkk3bwtz, $V02pvw3wfyzg->getTemplate());
    }

    protected function formatNonTemplate(Twig_Profiler_Profile $V02pvw3wfyzg, $V3w1lkk3bwtz)
    {
        return sprintf('%s└ %s::%s(%s)', $V3w1lkk3bwtz, $V02pvw3wfyzg->getTemplate(), $V02pvw3wfyzg->getType(), $V02pvw3wfyzg->getName());
    }

    protected function formatTime(Twig_Profiler_Profile $V02pvw3wfyzg, $Vbjc5fzbpdb0)
    {
        return sprintf('%.2fms/%.0f%%', $V02pvw3wfyzg->getDuration() * 1000, $Vbjc5fzbpdb0);
    }

    private function dumpProfile(Twig_Profiler_Profile $V02pvw3wfyzg, $V3w1lkk3bwtz = '', $Vdpnvey3sfrg = false)
    {
        if ($V02pvw3wfyzg->isRoot()) {
            $this->root = $V02pvw3wfyzg->getDuration();
            $V0kirhf1h1sd = $V02pvw3wfyzg->getName();
        } else {
            if ($V02pvw3wfyzg->isTemplate()) {
                $V0kirhf1h1sd = $this->formatTemplate($V02pvw3wfyzg, $V3w1lkk3bwtz);
            } else {
                $V0kirhf1h1sd = $this->formatNonTemplate($V02pvw3wfyzg, $V3w1lkk3bwtz);
            }
            $V3w1lkk3bwtz .= $Vdpnvey3sfrg ? '│ ' : '  ';
        }

        $Vbjc5fzbpdb0 = $this->root ? $V02pvw3wfyzg->getDuration() / $this->root * 100 : 0;

        if ($V02pvw3wfyzg->getDuration() * 1000 < 1) {
            $Vwra1z4uhffo = $V0kirhf1h1sd."\n";
        } else {
            $Vwra1z4uhffo = sprintf("%s %s\n", $V0kirhf1h1sd, $this->formatTime($V02pvw3wfyzg, $Vbjc5fzbpdb0));
        }

        $Vjretvrb4tbf = count($V02pvw3wfyzg->getProfiles());
        foreach ($V02pvw3wfyzg as $Vh3cz3bzejsf => $Vqj3wwguatxw) {
            $Vwra1z4uhffo .= $this->dumpProfile($Vqj3wwguatxw, $V3w1lkk3bwtz, $Vh3cz3bzejsf + 1 !== $Vjretvrb4tbf);
        }

        return $Vwra1z4uhffo;
    }
}
