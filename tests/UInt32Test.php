<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class UInt32Test extends \PHPUnit_Framework_TestCase
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

    public function testUInt32WithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt32(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readUInt32());
    }

    public function testUInt32OutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt32(2147483648);
        $stream->setPosition(0);

        $this->assertEquals(-2147483648, $stream->readUInt32());
    }

    public function testUInt32BigEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt32BE(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readUInt32BE());
    }

    public function testUInt32LEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt32BE(2147483648);
        $stream->setPosition(0);

        $this->assertEquals(-2147483648, $stream->readUInt32BE());
    }

    public function testUInt32LittleEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt32LE(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readUInt32LE());
    }

    public function testUInt32LittleEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt32LE(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readUInt32LE());
    }

}
