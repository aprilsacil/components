<?php

namespace Cradle\Http\Dispatcher;

use Cradle\Resolver\ResolverTrait;
use Cradle\Http\HttpDispatcher;

use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:01.
 */
class Cradle_Http_DispatcherTrait_Test extends TestCase
{
    /**
     * @var DispatcherTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new DispatcherTraitStub;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * covers Cradle\Http\DispatcherTrait::getDispatcher
     */
    public function testGetDispatcher()
    {
        $instance = $this->object->getDispatcher();
        $this->assertInstanceOf('Cradle\Http\HttpDispatcher', $instance);
    }

    /**
     * covers Cradle\Http\DispatcherTrait::setDispatcher
     */
    public function testSetDispatcher()
    {
        $instance = $this->object->setDispatcher(new HttpDispatcher);
        $this->assertInstanceOf('Cradle\Http\Dispatcher\DispatcherTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\Dispatcher\DispatcherTraitStub')) {
    class DispatcherTraitStub
    {
        use DispatcherTrait, ResolverTrait;
    }
}
