<?php
class Twig_Tests_Profiler_Dumper_TextTest extends Twig_Tests_Profiler_Dumper_AbstractTest { public function testDump() { $spded125 = new Twig_Profiler_Dumper_Text(); $this->assertStringMatchesFormat('main %d.%dms/%d%
└ index.twig %d.%dms/%d%
  └ embedded.twig::block(body)
  └ embedded.twig
  │ └ included.twig
  └ index.twig::macro(foo)
  └ embedded.twig
    └ included.twig
', $spded125->dump($this->getProfile())); } }