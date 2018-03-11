<?php

namespace Cradle\Http\Middleware;

use PHPUnit\Framework\TestCase;
use Cradle\Http\Middleware;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:01.
 */
class Cradle_Http_ErrorProcessorTrait_Test extends TestCase
{
    /**
     * @var ErrorProcessorTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ErrorProcessorTraitStub;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * covers Cradle\Http\ErrorProcessorTrait::getErrorProcessor
     */
    public function testGetErrorProcessor()
    {
        $instance = $this->object->getErrorProcessor();
        $this->assertInstanceOf('Cradle\Http\Middleware', $instance);
    }

    /**
     * covers Cradle\Http\ErrorProcessorTrait::error
     */
    public function testError()
    {
        $instance = $this->object->error(function() {});
        $this->assertInstanceOf('Cradle\Http\Middleware\ErrorProcessorTraitStub', $instance);
    }

    /**
     * covers Cradle\Http\ErrorProcessorTrait::setErrorProcessor
     */
    public function testSetErrorProcessor()
    {
        $instance = $this->object->setErrorProcessor(new Middleware);
        $this->assertInstanceOf('Cradle\Http\Middleware\ErrorProcessorTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\Middleware\ErrorProcessorTrait')) {
    class ErrorProcessorTraitStub
    {
        use ErrorProcessorTrait;
    }
}
