<?php

namespace Cradle\Http\Request;

use PHPUnit\Framework\TestCase;
use Cradle\Data\Registry;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-07-28 at 11:36:34.
 */
class Cradle_Http_Request_FileTrait_Test extends TestCase
{
    /**
     * @var FileTrait
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new FileTraitStub;
        
        $this->object->set('files', array(
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
     * covers Cradle\Http\Request\FileTrait::getFiles
     */
    public function testGetFiles()
    {
        $this->assertEquals('bar', $this->object->getFiles('foo'));
    }

    /**
     * covers Cradle\Http\Request\FileTrait::hasFiles
     */
    public function testHasFiles()
    {
        $this->assertTrue($this->object->hasFiles('foo'));
        $this->assertFalse($this->object->hasFiles('zoo'));
    }

    /**
     * covers Cradle\Http\Request\FileTrait::removeFiles
     */
    public function testRemoveFiles()
    {
        $this->object->removeFiles('foo');
        $this->assertFalse($this->object->hasFiles('foo'));
    }

    /**
     * covers Cradle\Http\Request\FileTrait::setFiles
     */
    public function testSetFiles()
    {
        $instance = $this->object->setFiles(array(
            'foo' => 'bar',
            'bar' => 'foo'
        ));
        
        $this->assertInstanceOf('Cradle\Http\Request\FileTraitStub', $instance);
		
		$instance = $this->object->setFiles('zoo');
        $this->assertInstanceOf('Cradle\Http\Request\FileTraitStub', $instance);

        $instance = $this->object->setFiles('zoo', 'foo', 'bar');
        $this->assertInstanceOf('Cradle\Http\Request\FileTraitStub', $instance);
    }
}

if(!class_exists('Cradle\Http\Request\FileTraitStub')) {
    class FileTraitStub extends Registry
    {
        use FileTrait;
    }
}
