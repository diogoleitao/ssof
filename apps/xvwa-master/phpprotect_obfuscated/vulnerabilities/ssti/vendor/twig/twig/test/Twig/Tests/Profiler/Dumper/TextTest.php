<?php



class Twig_Tests_Profiler_Dumper_TextTest extends Twig_Tests_Profiler_Dumper_AbstractTest
{
    public function testDump()
    {
        $Vhozl5tyref3 = new Twig_Profiler_Dumper_Text();
        $this->assertStringMatchesFormat(<<<EOF
main %d.%dms/%d%
└ index.twig %d.%dms/%d%
  └ embedded.twig::block(body)
  └ embedded.twig
  │ └ included.twig
  └ index.twig::macro(foo)
  └ embedded.twig
    └ included.twig

EOF
        , $Vhozl5tyref3->dump($this->getProfile()));
    }
}
