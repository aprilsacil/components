<?php

namespace Cradle\Profiler;

use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:02.
 */
class Cradle_Profiler_InspectorTrait_Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var InspectorTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new InspectorTraitStub;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Profiler\InspectorTrait::getInspectorHandler
     */
    public function testGetInspectorHandler()
    {
        $instance = $this->object->getInspectorHandler();
        $this->assertInstanceOf('Cradle\Profiler\InspectorInterface', $instance);
    }

    /**
     * @covers Cradle\Profiler\InspectorTrait::inspect
     */
    public function testInspect()
    {
        ob_start();
        $this->object->inspect('foobar');
        $contents = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            '<pre>INSPECTING Variable:</pre><pre>foobar</pre>',
            $contents
        );

        ob_start();
        $this->object->inspect('x');
        $contents = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            '<pre>INSPECTING Cradle\Profiler\InspectorTraitStub->x:</pre><pre>4</pre>',
            $contents
        );

        ob_start();
        $this->object->inspect();
        $contents = ob_get_contents();
        ob_end_clean();

        $this->assertContains(
            '<pre>INSPECTING Cradle\Profiler\InspectorTraitStub:',
            $contents
        );

        ob_start();
        $this->object->inspect(true)->getX();
        $contents = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            '<pre>INSPECTING Cradle\Profiler\InspectorTraitStub->:</pre><pre>4</pre>',
            $contents
        );

        ob_start();
        $this->object->inspect([1, 2, 3]);
        $contents = ob_get_contents();
        ob_end_clean();

        $this->assertContains('[0] => 1', $contents);
        $this->assertContains('[1] => 2', $contents);
        $this->assertContains('[2] => 3', $contents);
    }

    /**
     * @covers Cradle\Profiler\InspectorTrait::setInspectorHandler
     */
    public function testSetInspectorHandler()
    {
        $instance = $this->object->setInspectorHandler(new InspectorHandlerStub);
        $this->assertInstanceOf('Cradle\Profiler\InspectorTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Profiler\InspectorTraitStub')) {
    class InspectorTraitStub
    {
        use InspectorTrait;

        public $x = 4;

        public function getX()
        {
            return $this->x;
        }
    }
}

if(!class_exists('Cradle\Profiler\InspectorHandlerStub')) {
    class InspectorHandlerStub extends InspectorHandler
    {
    }
}
