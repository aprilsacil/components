<?php

namespace Cradle\Http;

use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-28 at 11:36:33.
 */
class Cradle_Http_HttpException_Test extends TestCase
{
    /**
     * @var HttpException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new HttpException;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Http\HttpException::forResponseNotFound
     */
    public function testForResponseNotFound()
    {
        $message = null;
        try {
            throw HttpException::forResponseNotFound();
        } catch(HttpException $e) {
            $message = $e->getMessage();
        }

        $this->assertEquals('Not Found.', $message);
    }
}
