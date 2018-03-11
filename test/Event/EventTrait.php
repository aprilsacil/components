<?php

namespace Cradle\Event;

use StdClass;
use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:00.
 */
class Cradle_Event_EventTrait_Test extends TestCase
{
    /**
     * @var EventTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new EventTraitStub;
		$this->object->getEventHandler()->off();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Event\EventTrait::getEventHandler
     */
    public function testGetEventHandler()
    {
		$instance = $this->object->getEventHandler();
		$this->assertInstanceOf('Cradle\Event\EventHandler', $instance);
		
        $instance = $this->object
			->setEventHandler(new EventTraitEventHandlerStub)
			->getEventHandler();
		$this->assertInstanceOf('Cradle\Event\EventTraitEventHandlerStub', $instance);
    }

    /**
     * @covers Cradle\Event\EventTrait::on
     */
    public function testOn()
    {
        $trigger = new StdClass();
		$trigger->success = null;
		
        $callback = function() use ($trigger) {
			$trigger->success = true;
		};
		
		$instance = $this
			->object
			->on('foobar', $callback)
			->trigger('foobar');
		
		$this->assertInstanceOf('Cradle\Event\EventTraitStub', $instance);
		$this->assertTrue($trigger->success);
    }

    /**
     * @covers Cradle\Event\EventTrait::setEventHandler
     */
    public function testSetEventHandler()
    {
        $instance = $this->object->setEventHandler(new EventPipeEventHandlerStub);
		$this->assertInstanceOf('Cradle\Event\EventTraitStub', $instance);
		
        $instance = $this->object->setEventHandler(new EventPipeEventHandlerStub, true);
		$this->assertInstanceOf('Cradle\Event\EventTraitStub', $instance);
		
        $instance = $this->object->setEventHandler(new EventHandler, true);
    }

    /**
     * @covers Cradle\Event\EventTrait::trigger
     */
    public function testTrigger()
    {
		$trigger = new StdClass();
		$trigger->success = null;
		
        $callback = function() use ($trigger) {
			$trigger->success = true;
		};
		
		$instance = $this
			->object
			->on('foobar', $callback)
			->trigger('foobar');
		
		$this->assertInstanceOf('Cradle\Event\EventTraitStub', $instance);
		$this->assertTrue($trigger->success);
    }
	
    /**
     * @covers Cradle\Event\EventTrait::bindCallback
     */
    public function testBindCallback()
    {
        $trigger = new StdClass;
        $trigger->success = null;
		$trigger->test = $this;
		
		$callback = $this->object->bindCallback(function() use ($trigger) {
	    	$trigger->success = true;
			$trigger->test->assertInstanceOf('Cradle\Event\EventTraitStub', $this);
		});
		
		$callback();
		
		$this->assertTrue($trigger->success);
    }
}

if(!class_exists('Cradle\Event\EventTraitStub')) {
	class EventTraitStub
	{
		use EventTrait;
	}
}

if(!class_exists('Cradle\Event\EventTraitEventHandlerStub')) {
	class EventTraitEventHandlerStub extends EventHandler
	{
	}
}
