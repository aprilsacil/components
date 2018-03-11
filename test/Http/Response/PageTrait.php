<?php

namespace Cradle\Http\Response;

use PHPUnit\Framework\TestCase;
use Cradle\Data\Registry;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-28 at 11:36:34.
 */
class Cradle_Http_Response_PageTrait_Test extends TestCase
{
    /**
     * @var PageTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new PageTraitStub(array(
            'page' => array(
                'title' => 'foobar',
                'flash' => array(
                    'message' => 'bar',
                    'type' => 'foo'
                ),
                'meta' => array(
                    'foo' => 'bar',
                    'bar' => 'foo'
                )
            )
        ));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * covers Cradle\Http\Response\PageTrait::addMeta
     */
    public function testAddMeta()
    {
        $instance = $this->object->addMeta('zoo', 'foo');
        $this->assertInstanceOf('Cradle\Http\Response\PageTraitStub', $instance);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::getFlash
     */
    public function testGetFlash()
    {
        $actual = $this->object->getFlash();
        $this->assertArrayHasKey('message', $actual);
        $this->assertEquals('foo', $actual['type']);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::getMeta
     */
    public function testGetMeta()
    {
        $actual = $this->object->getMeta();
        $this->assertArrayHasKey('foo', $actual);
        $actual = $this->object->getMeta('foo');
        $this->assertEquals('bar', $actual);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::getPage
     */
    public function testGetPage()
    {
        $actual = $this->object->getPage();
        $this->assertArrayHasKey('title', $actual);
        $actual = $this->object->getPage('flash', 'message');
        $this->assertEquals('bar', $actual);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::hasPage
     */
    public function testHasPage()
    {
        $this->assertTrue($this->object->hasPage());
        $this->assertTrue($this->object->hasPage('title'));
    }

    /**
     * covers Cradle\Http\Response\PageTrait::removePage
     */
    public function testRemovePage()
    {
        $instance = $this->object->removePage('meta');
        $this->assertInstanceOf('Cradle\Http\Response\PageTraitStub', $instance);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::setFlash
     */
    public function testSetFlash()
    {
        $instance = $this->object->setFlash('foo', 'bar');
        $this->assertInstanceOf('Cradle\Http\Response\PageTraitStub', $instance);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::setPage
     */
    public function testSetPage()
    {
        $instance = $this->object->setPage('foo', 'bar');
        $this->assertInstanceOf('Cradle\Http\Response\PageTraitStub', $instance);
        $instance = $this->object->setPage();
        $this->assertInstanceOf('Cradle\Http\Response\PageTraitStub', $instance);
    }

    /**
     * covers Cradle\Http\Response\PageTrait::setTitle
     */
    public function testSetTitle()
    {
        $instance = $this->object->setTitle('foo');
        $this->assertInstanceOf('Cradle\Http\Response\PageTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\Response\PageTraitStub')) {
    class PageTraitStub extends Registry
    {
        use PageTrait;
    }
}