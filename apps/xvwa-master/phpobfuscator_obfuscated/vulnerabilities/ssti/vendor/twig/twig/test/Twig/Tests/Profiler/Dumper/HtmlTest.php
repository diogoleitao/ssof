<?php
class Twig_Tests_Profiler_Dumper_HtmlTest extends Twig_Tests_Profiler_Dumper_AbstractTest { public function testDump() { $spded125 = new Twig_Profiler_Dumper_Html(); $this->assertStringMatchesFormat('<pre>main <span style="color: #d44">%d.%dms/%d%</span>
└ <span style="background-color: #ffd">index.twig</span> <span style="color: #d44">%d.%dms/%d%</span>
  └ embedded.twig::block(<span style="background-color: #dfd">body</span>)
  └ <span style="background-color: #ffd">embedded.twig</span>
  │ └ <span style="background-color: #ffd">included.twig</span>
  └ index.twig::macro(<span style="background-color: #ddf">foo</span>)
  └ <span style="background-color: #ffd">embedded.twig</span>
    └ <span style="background-color: #ffd">included.twig</span>
</pre>', $spded125->dump($this->getProfile())); } }