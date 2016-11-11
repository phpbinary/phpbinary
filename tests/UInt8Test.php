<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class UInt8Test extends \PHPUnit_Framework_TestCase
{
    private $resource;

    public function setUp()
    {
        parent::setUp();

        $this->resource = null;
    }

    public function tearDown()
    {
        if ($this->resource !== null) {
            fclose($this->resource);
        }

        parent::tearDown();
    }

    public function testUInt8WithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8(200);
        $stream->setPosition(0);

        $this->assertEquals(200, $stream->readUInt8());
    }

    public function testUInt8OutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8(257);
        $stream->setPosition(0);

        $this->assertEquals(1, $stream->readUInt8());
    }

    public function testUInt8OutsideBufferTwice()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8(513);
        $stream->setPosition(0);

        $this->assertEquals(1, $stream->readUInt8());
    }

    public function testUInt8BigEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8BE(200);
        $stream->setPosition(0);

        $this->assertEquals(200, $stream->readUInt8BE());
    }

    public function testUInt8LEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8BE(257);
        $stream->setPosition(0);

        $this->assertEquals(1, $stream->readUInt8BE());
    }

    public function testUInt8LEndianOutsideBufferTwice()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8BE(513);
        $stream->setPosition(0);

        $this->assertEquals(1, $stream->readUInt8BE());
    }

    public function testUInt8LittleEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8LE(200);
        $stream->setPosition(0);

        $this->assertEquals(200, $stream->readUInt8LE());
    }

    public function testUInt8LittleEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8LE(257);
        $stream->setPosition(0);

        $this->assertEquals(1, $stream->readUInt8LE());
    }

    public function testUInt8LittleEndianOutsideBufferTwice()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt8LE(513);
        $stream->setPosition(0);

        $this->assertEquals(1, $stream->readUInt8LE());
    }
}
