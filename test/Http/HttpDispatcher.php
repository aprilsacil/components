<?php

namespace Cradle\Http;

use PHPUnit\Framework\TestCase;
use Cradle\Http\Response;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:11:01.
 */
class Cradle_Http_HttpDispatcher_Test extends TestCase
{
    /**
     * @var HttpDispatcher
     */
    protected $object;

    /**
     * @var Response
     */
    protected $response;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @covers Cradle\Http\HttpDispatcher::__construct
     */
    protected function setUp()
    {
        $this->object = new HttpDispatcher;
        $this->response = new Response;

        $this->response
            ->load()
            ->addHeader('foo', 'bar')
            ->setContent('foobar');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Http\HttpDispatcher::__construct
     */
    public function test__construct()
    {
        $this->object->__construct(
            function() {},
            function() {}
        );

        $this->assertFalse($this->object->isSuccessful());
    }

    /**
     * @covers Cradle\Http\HttpDispatcher::output
     */
    public function testOutput()
    {
        $actual = $this->object->output($this->response, true);
        $this->assertEquals('foobar', $actual);

        $this->object = new HttpDispatcher(
            function() {},
            function() {}
        );

        $instance = $this->object->output($this->response);
        $this->assertInstanceOf('Cradle\Http\HttpDispatcher', $instance);
    }

    /**
     * @covers Cradle\Http\HttpDispatcher::dispatch
     */
    public function testDispatch()
    {
        $actual = $this->object->dispatch($this->response, true);
        $this->assertEquals('foobar', $actual);

        $this->response->addHeader('Location', '/foo/bar');
        $actual = $this->object->dispatch($this->response, true);
        $this->assertEquals('/foo/bar', $actual);

        $this->response = new Response;
        $trigger = false;
        try {
            $this->object->dispatch($this->response, true);
        } catch(HttpException $e) {
            $trigger = true;
        }

        $this->assertTrue($trigger);

        $this->response = new Response;

        $this->response
            ->load()
            ->addHeader('Content-Type', false)
            ->setError(true, 'Foobar');

        $this->object->__construct(
            function() {},
            function() {}
        );

        $actual = $this->object->dispatch($this->response);
        $this->assertInstanceOf('Cradle\Http\HttpDispatcher', $actual);
    }

    /**
     * @covers Cradle\Http\HttpDispatcher::redirect
     */
    public function testRedirect()
    {
        $actual = $this->object->redirect('/foo/bar', false, true);
        $this->assertEquals('/foo/bar', $actual);

        $this->object = new HttpDispatcher(
            function() {},
            function() {}
        );

        $instance = $this->object->redirect('/foo/bar');
        $this->assertInstanceOf('Cradle\Http\HttpDispatcher', $instance);
    }

    /**
     * @covers Cradle\Http\HttpDispatcher::isSuccessful
     */
    public function testIsSuccessful()
    {
        $this->assertFalse($this->object->isSuccessful());
        $actual = $this->object->dispatch($this->response, true);
        $this->assertTrue($this->object->isSuccessful());
    }
}
