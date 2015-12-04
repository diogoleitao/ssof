<?php



class Twig_Tests_Profiler_Dumper_BlackfireTest extends Twig_Tests_Profiler_Dumper_AbstractTest
{
    public function testDump()
    {
        $Vhozl5tyref3 = new Twig_Profiler_Dumper_Blackfire();

        $this->assertStringMatchesFormat(<<<EOF
file-format: BlackfireProbe
cost-dimensions: wt mu pmu
request-start: %d.%d

main()
main()==>index.twig
index.twig==>embedded.twig::block(body)
index.twig==>embedded.twig
embedded.twig==>included.twig
index.twig==>index.twig::macro(foo)
EOF
        , $Vhozl5tyref3->dump($this->getProfile()));
    }
}
