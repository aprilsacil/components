<?php

namespace Cradle\Curl;

use StdClass;
use PHPUnit\Framework\TestCase;
use Cradle\Resolver\ResolverHandler;
use Cradle\Profiler\InspectorHandler;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-27 at 02:10:59.
 */
class Cradle_Curl_Rest_Test extends TestCase
{
    /**
     * @var CurlHandler
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Rest('http://foobar.com', function($options) {
            $options['response'] = json_encode($options);
            return $options;
        });
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Cradle\Curl\Rest::__construct
     */
    public function test__construct()
    {
        $actual = Rest::i('http://foobar.com');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);
    }

    /**
     * @covers Cradle\Curl\Rest::__call
     * @covers Cradle\Curl\Rest::getPath
     * @covers Cradle\Curl\Rest::getKey
     * @covers Cradle\Curl\Rest::send
     */
    public function test__call()
    {
        $actual = $this->object->friends()->getCommentsLike(1, 2);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);

        $actual = $this->object->friends()->createCommentsLike(1, 2);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);

        $actual = $this->object->friends()->postCommentsLike(1, 2);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);

        $actual = $this->object->friends()->updateCommentsLike(1, 2);
        $this->assertEquals('PUT', $actual[CURLOPT_CUSTOMREQUEST]);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);

        $actual = $this->object->friends()->putCommentsLike(1, 2);
        $this->assertEquals('PUT', $actual[CURLOPT_CUSTOMREQUEST]);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);

        $actual = $this->object->friends()->removeCommentsLike(1, 2);
        $this->assertEquals('DELETE', $actual[CURLOPT_CUSTOMREQUEST]);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);

        $actual = $this->object->friends()->deleteCommentsLike(1, 2);
        $this->assertEquals('DELETE', $actual[CURLOPT_CUSTOMREQUEST]);
        $this->assertEquals('http://foobar.com/friends/comments/like/1/2', $actual[CURLOPT_URL]);
    }

    /**
     * @covers Cradle\Curl\Rest::addHeader
     */
    public function testAddHeader()
    {
        $actual = $this->object->addHeader('Expect');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);

        $actual = $this->object->addHeader(['Expect']);
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);

        $actual = $this->object->addHeader('Authorization', 'foobar');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);
    }

    /**
     * @covers Cradle\Curl\Rest::addQuery
     */
    public function testAddQuery()
    {
        $actual = $this->object->addQuery(['foo' => 'bar']);
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);

        $actual = $this->object->addQuery('foo', 'bar');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);
    }

    /**
     * @covers Cradle\Curl\Rest::setUserAgent
     */
    public function testSetUserAgent()
    {
        $actual = $this->object->setUserAgent('Mozilla');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);
    }

    /**
     * @covers Cradle\Curl\Rest::setRequestFormat
     */
    public function testSetRequestFormat()
    {
        $actual = $this->object->setRequestFormat('query');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);
    }

    /**
     * @covers Cradle\Curl\Rest::setResponseFormat
     */
    public function testSetResponseFormat()
    {
        $actual = $this->object->setResponseFormat('json');
        $this->assertInstanceOf('\Cradle\Curl\Rest', $actual);
    }

    /**
     * @covers Cradle\Curl\Rest::send
     */
    public function testSend()
    {
        $actual = $this->object
            ->setUserAgent('Mozilla')
            ->setRequestFormat('query')
            ->setResponseFormat('json')
            ->addHeader('Expect')
            ->addQuery('foo', 'bar')
            ->setBar('zoo')
            ->send('DELETE', '/friends/comments');

        $this->assertEquals('DELETE', $actual[CURLOPT_CUSTOMREQUEST]);
        $this->assertEquals('http://foobar.com/friends/comments?bar=zoo&foo=bar', $actual[CURLOPT_URL]);

        $actual = $this->object
            ->setUserAgent('Mozilla')
            ->setRequestFormat('query')
            ->setResponseFormat('json')
            ->addHeader('Expect')
            ->addQuery('foo', 'bar')
            ->setBar('zoo')
            ->send('PUT', '/friends/comments');

        $this->assertEquals('PUT', $actual[CURLOPT_CUSTOMREQUEST]);
        $this->assertEquals('http://foobar.com/friends/comments?foo=bar', $actual[CURLOPT_URL]);
        $this->assertEquals('bar=zoo', $actual[CURLOPT_POSTFIELDS]);
    }
}
