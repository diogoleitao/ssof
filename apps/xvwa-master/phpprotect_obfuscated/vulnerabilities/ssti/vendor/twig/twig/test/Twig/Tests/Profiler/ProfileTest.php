<?php



class Twig_Tests_Profiler_ProfileTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', 'type', 'name');

        $this->assertEquals('template', $V02pvw3wfyzg->getTemplate());
        $this->assertEquals('type', $V02pvw3wfyzg->getType());
        $this->assertEquals('name', $V02pvw3wfyzg->getName());
    }

    public function testIsRoot()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::ROOT);
        $this->assertTrue($V02pvw3wfyzg->isRoot());

        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::TEMPLATE);
        $this->assertFalse($V02pvw3wfyzg->isRoot());
    }

    public function testIsTemplate()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::TEMPLATE);
        $this->assertTrue($V02pvw3wfyzg->isTemplate());

        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::ROOT);
        $this->assertFalse($V02pvw3wfyzg->isTemplate());
    }

    public function testIsBlock()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::BLOCK);
        $this->assertTrue($V02pvw3wfyzg->isBlock());

        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::ROOT);
        $this->assertFalse($V02pvw3wfyzg->isBlock());
    }

    public function testIsMacro()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::MACRO);
        $this->assertTrue($V02pvw3wfyzg->isMacro());

        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', Twig_Profiler_Profile::ROOT);
        $this->assertFalse($V02pvw3wfyzg->isMacro());
    }

    public function testGetAddProfile()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile();
        $V02pvw3wfyzg->addProfile($Vk5gde0byujz = new Twig_Profiler_Profile());
        $V02pvw3wfyzg->addProfile($Vkxzhjkxbjvx = new Twig_Profiler_Profile());

        $this->assertSame(array($Vk5gde0byujz, $Vkxzhjkxbjvx), $V02pvw3wfyzg->getProfiles());
        $this->assertSame(array($Vk5gde0byujz, $Vkxzhjkxbjvx), iterator_to_array($V02pvw3wfyzg));
    }

    public function testGetDuration()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile();
        usleep(1);
        $V02pvw3wfyzg->leave();

        $this->assertTrue($V02pvw3wfyzg->getDuration() > 0, sprintf('Expected duration > 0, got: %f', $V02pvw3wfyzg->getDuration()));
    }

    public function testSerialize()
    {
        $V02pvw3wfyzg = new Twig_Profiler_Profile('template', 'type', 'name');
        $V02pvw3wfyzg1 = new Twig_Profiler_Profile('template1', 'type1', 'name1');
        $V02pvw3wfyzg->addProfile($V02pvw3wfyzg1);
        $V02pvw3wfyzg->leave();
        $V02pvw3wfyzg1->leave();

        $V02pvw3wfyzg2 = unserialize(serialize($V02pvw3wfyzg));
        $V02pvw3wfyzgs = $V02pvw3wfyzg->getProfiles();
        $this->assertCount(1, $V02pvw3wfyzgs);
        $V02pvw3wfyzg3 = $V02pvw3wfyzgs[0];

        $this->assertEquals($V02pvw3wfyzg->getTemplate(), $V02pvw3wfyzg2->getTemplate());
        $this->assertEquals($V02pvw3wfyzg->getType(), $V02pvw3wfyzg2->getType());
        $this->assertEquals($V02pvw3wfyzg->getName(), $V02pvw3wfyzg2->getName());
        $this->assertEquals($V02pvw3wfyzg->getDuration(), $V02pvw3wfyzg2->getDuration());

        $this->assertEquals($V02pvw3wfyzg1->getTemplate(), $V02pvw3wfyzg3->getTemplate());
        $this->assertEquals($V02pvw3wfyzg1->getType(), $V02pvw3wfyzg3->getType());
        $this->assertEquals($V02pvw3wfyzg1->getName(), $V02pvw3wfyzg3->getName());
    }
}
