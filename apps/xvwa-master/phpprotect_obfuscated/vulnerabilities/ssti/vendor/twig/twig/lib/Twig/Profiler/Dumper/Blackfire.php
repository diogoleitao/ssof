<?php




class Twig_Profiler_Dumper_Blackfire
{
    public function dump(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        $V5ttrtwbrnmr = array();
        $this->dumpProfile('main()', $V02pvw3wfyzg, $V5ttrtwbrnmr);
        $this->dumpChildren('main()', $V02pvw3wfyzg, $V5ttrtwbrnmr);

        $V0kirhf1h1sd = microtime(true);
        $Vwra1z4uhffo = <<<EOF
file-format: BlackfireProbe
cost-dimensions: wt mu pmu
request-start: {$V0kirhf1h1sd}


EOF;

        foreach ($V5ttrtwbrnmr as $Vkkm4e2vaxrv => $Vpek50boolgn) {
            $Vwra1z4uhffo .= "{$Vkkm4e2vaxrv}//{$Vpek50boolgn['ct']} {$Vpek50boolgn['wt']} {$Vpek50boolgn['mu']} {$Vpek50boolgn['pmu']}\n";
        }

        return $Vwra1z4uhffo;
    }

    private function dumpChildren($Vvlgul2pgukx, Twig_Profiler_Profile $V02pvw3wfyzg, &$V5ttrtwbrnmr)
    {
        foreach ($V02pvw3wfyzg as $Vqj3wwguatxw) {
            if ($Vqj3wwguatxw->isTemplate()) {
                $Vkkm4e2vaxrv = $Vqj3wwguatxw->getTemplate();
            } else {
                $Vkkm4e2vaxrv = sprintf('%s::%s(%s)', $Vqj3wwguatxw->getTemplate(), $Vqj3wwguatxw->getType(), $Vqj3wwguatxw->getName());
            }
            $this->dumpProfile(sprintf('%s==>%s', $Vvlgul2pgukx, $Vkkm4e2vaxrv), $Vqj3wwguatxw, $V5ttrtwbrnmr);
            $this->dumpChildren($Vkkm4e2vaxrv, $Vqj3wwguatxw, $V5ttrtwbrnmr);
        }
    }

    private function dumpProfile($Vnx5ahnulkwa, Twig_Profiler_Profile $V02pvw3wfyzg, &$V5ttrtwbrnmr)
    {
        if (isset($V5ttrtwbrnmr[$Vnx5ahnulkwa])) {
            $V5ttrtwbrnmr[$Vnx5ahnulkwa]['ct'] += 1;
            $V5ttrtwbrnmr[$Vnx5ahnulkwa]['wt'] += floor($V02pvw3wfyzg->getDuration() * 1000000);
            $V5ttrtwbrnmr[$Vnx5ahnulkwa]['mu'] += $V02pvw3wfyzg->getMemoryUsage();
            $V5ttrtwbrnmr[$Vnx5ahnulkwa]['pmu'] += $V02pvw3wfyzg->getPeakMemoryUsage();
        } else {
            $V5ttrtwbrnmr[$Vnx5ahnulkwa] = array(
                'ct' => 1,
                'wt' => floor($V02pvw3wfyzg->getDuration() * 1000000),
                'mu' => $V02pvw3wfyzg->getMemoryUsage(),
                'pmu' => $V02pvw3wfyzg->getPeakMemoryUsage(),
            );
        }
    }
}
