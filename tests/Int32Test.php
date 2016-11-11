<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class Int32Test extends \PHPUnit_Framework_TestCase
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

    public function testInt32WithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt32(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readInt32());
    }

    public function testInt32OutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt32(2147483648);
        $stream->setPosition(0);

        $this->assertEquals(-2147483648, $stream->readInt32());
    }

    public function testInt32BigEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt32BE(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readInt32BE());
    }

    public function testInt32BigEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt32BE(2147483648);
        $stream->setPosition(0);

        $this->assertEquals(-2147483648, $stream->readInt32BE());
    }

    public function testInt32LittleEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt32LE(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readInt32LE());
    }

    public function testInt32LittleEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt32LE(2147483647);
        $stream->setPosition(0);

        $this->assertEquals(2147483647, $stream->readInt32LE());
    }

}
