<?php

namespace Cradle\Http\Request;

use PHPUnit\Framework\TestCase;
use Cradle\Data\Registry;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-28 at 11:36:34.
 */
class Cradle_Http_Request_PostTrait_Test extends TestCase
{
    /**
     * @var PostTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new PostTraitStub;
        
        $this->object->set('post', array(
            'foo' => 'bar',
            'bar' => 'foo'
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
     * covers Cradle\Http\Request\PostTrait::getPost
     */
    public function testGetPost()
    {    
        $this->assertEquals('bar', $this->object->getPost('foo'));
    }

    /**
     * covers Cradle\Http\Request\PostTrait::hasPost
     */
    public function testHasPost()
    {    
        $this->assertTrue($this->object->hasPost('foo'));
        $this->assertFalse($this->object->hasPost('zoo'));
    }

    /**
     * covers Cradle\Http\Request\PostTrait::removePost
     */
    public function testRemovePost()
    {
        $this->object->removePost('foo');
        $this->assertFalse($this->object->hasPost('foo'));
    }

    /**
     * covers Cradle\Http\Request\PostTrait::setPost
     */
    public function testSetPost()
    {
        $instance = $this->object->setPost(array(
            'foo' => 'bar',
            'bar' => 'foo'
        ));
        
        $this->assertInstanceOf('Cradle\Http\Request\PostTraitStub', $instance);
		
		$instance = $this->object->setPost('zoo');
        $this->assertInstanceOf('Cradle\Http\Request\PostTraitStub', $instance);

        $instance = $this->object->setPost('zoo', 'foo', 'bar');
        $this->assertInstanceOf('Cradle\Http\Request\PostTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\Request\PostTraitStub')) {
    class PostTraitStub extends Registry
    {
        use PostTrait;
    }
}
