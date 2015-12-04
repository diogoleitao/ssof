<?php




class Twig_Profiler_Dumper_Html extends Twig_Profiler_Dumper_Text
{
    private static $Vdepqgld5qm0 = array(
        'block' => '#dfd',
        'macro' => '#ddf',
        'template' => '#ffd',
        'big' => '#d44',
    );

    public function dump(Twig_Profiler_Profile $V02pvw3wfyzg)
    {
        return '<pre>'.parent::dump($V02pvw3wfyzg).'</pre>';
    }

    protected function formatTemplate(Twig_Profiler_Profile $V02pvw3wfyzg, $V3w1lkk3bwtz)
    {
        return sprintf('%s└ <span style="background-color: %s">%s</span>', $V3w1lkk3bwtz, self::$Vdepqgld5qm0['template'], $V02pvw3wfyzg->getTemplate());
    }

    protected function formatNonTemplate(Twig_Profiler_Profile $V02pvw3wfyzg, $V3w1lkk3bwtz)
    {
        return sprintf('%s└ %s::%s(<span style="background-color: %s">%s</span>)', $V3w1lkk3bwtz, $V02pvw3wfyzg->getTemplate(), $V02pvw3wfyzg->getType(), isset(self::$Vdepqgld5qm0[$V02pvw3wfyzg->getType()]) ? self::$Vdepqgld5qm0[$V02pvw3wfyzg->getType()] : 'auto', $V02pvw3wfyzg->getName());
    }

    protected function formatTime(Twig_Profiler_Profile $V02pvw3wfyzg, $Vbjc5fzbpdb0)
    {
        return sprintf('<span style="color: %s">%.2fms/%.0f%%</span>', $Vbjc5fzbpdb0 > 20 ? self::$Vdepqgld5qm0['big'] : 'auto', $V02pvw3wfyzg->getDuration() * 1000, $Vbjc5fzbpdb0);
    }
}
