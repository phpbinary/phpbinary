<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class Int8Test extends \PHPUnit_Framework_TestCase
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

    public function testInt8WithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt8(100);
        $stream->setPosition(0);

        $this->assertEquals(100, $stream->readInt8());
    }

    public function testInt8OutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt8(128);
        $stream->setPosition(0);

        $this->assertEquals(-128, $stream->readInt8());
    }

    public function testInt8BigEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt8BE(100);
        $stream->setPosition(0);

        $this->assertEquals(100, $stream->readInt8BE());
    }

    public function testInt8LEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt8BE(128);
        $stream->setPosition(0);

        $this->assertEquals(-128, $stream->readInt8BE());
    }

    public function testInt8LittleEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt8LE(100);
        $stream->setPosition(0);

        $this->assertEquals(100, $stream->readInt8LE());
    }

    public function testInt8LittleEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt8LE(128);
        $stream->setPosition(0);

        $this->assertEquals(-128, $stream->readInt8LE());
    }
}
