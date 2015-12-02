<?php
abstract class Twig_Tests_Profiler_Dumper_AbstractTest extends PHPUnit_Framework_TestCase { protected function getProfile() { $sp6e7f73 = $this->getMockBuilder('Twig_Profiler_Profile')->disableOriginalConstructor()->getMock(); $sp6e7f73->expects($this->any())->method('isRoot')->will($this->returnValue(true)); $sp6e7f73->expects($this->any())->method('getName')->will($this->returnValue('main')); $sp6e7f73->expects($this->any())->method('getDuration')->will($this->returnValue(1)); $sp6e7f73->expects($this->any())->method('getMemoryUsage')->will($this->returnValue(0)); $sp6e7f73->expects($this->any())->method('getPeakMemoryUsage')->will($this->returnValue(0)); $sp79dc9b = array($this->sp138a4e(array($this->spcf835f(), $this->spc1c1cb(array($this->spf0f3b7())), $this->spfb2e96(), $this->spc1c1cb(array($this->spf0f3b7()))))); $sp6e7f73->expects($this->any())->method('getProfiles')->will($this->returnValue($sp79dc9b)); $sp6e7f73->expects($this->any())->method('getIterator')->will($this->returnValue(new ArrayIterator($sp79dc9b))); return $sp6e7f73; } private function sp138a4e(array $sp79dc9b = array()) { return $this->sp4c32d0('main', 1, true, 'template', 'index.twig', $sp79dc9b); } private function spcf835f(array $sp79dc9b = array()) { return $this->sp4c32d0('body', 0.0001, false, 'block', 'embedded.twig', $sp79dc9b); } private function spc1c1cb(array $sp79dc9b = array()) { return $this->sp4c32d0('main', 0.0001, true, 'template', 'embedded.twig', $sp79dc9b); } private function spf0f3b7(array $sp79dc9b = array()) { return $this->sp4c32d0('main', 0.0001, true, 'template', 'included.twig', $sp79dc9b); } private function spfb2e96(array $sp79dc9b = array()) { return $this->sp4c32d0('foo', 0.0001, false, 'macro', 'index.twig', $sp79dc9b); } private function sp4c32d0($sp3eec35, $spcdba88, $sp58c6e5, $sp32ff7e, $sp97c142, array $sp79dc9b = array()) { $sp6e7f73 = $this->getMockBuilder('Twig_Profiler_Profile')->disableOriginalConstructor()->getMock(); $sp6e7f73->expects($this->any())->method('isRoot')->will($this->returnValue(false)); $sp6e7f73->expects($this->any())->method('getName')->will($this->returnValue($sp3eec35)); $sp6e7f73->expects($this->any())->method('getDuration')->will($this->returnValue($spcdba88)); $sp6e7f73->expects($this->any())->method('getMemoryUsage')->will($this->returnValue(0)); $sp6e7f73->expects($this->any())->method('getPeakMemoryUsage')->will($this->returnValue(0)); $sp6e7f73->expects($this->any())->method('isTemplate')->will($this->returnValue($sp58c6e5)); $sp6e7f73->expects($this->any())->method('getType')->will($this->returnValue($sp32ff7e)); $sp6e7f73->expects($this->any())->method('getTemplate')->will($this->returnValue($sp97c142)); $sp6e7f73->expects($this->any())->method('getProfiles')->will($this->returnValue($sp79dc9b)); $sp6e7f73->expects($this->any())->method('getIterator')->will($this->returnValue(new ArrayIterator($sp79dc9b))); return $sp6e7f73; } }