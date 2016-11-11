<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class Int16Test extends \PHPUnit_Framework_TestCase
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

    public function testInt16WithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt16(32767);
        $stream->setPosition(0);

        $this->assertEquals(32767, $stream->readInt16());
    }

    public function testInt16OutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt16(32768);
        $stream->setPosition(0);

        $this->assertEquals(-32768, $stream->readInt16());
    }

    public function testInt16BigEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt16BE(32767);
        $stream->setPosition(0);

        $this->assertEquals(32767, $stream->readInt16BE());
    }

    public function testInt16BigEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt16BE(32768);
        $stream->setPosition(0);

        $this->assertEquals(-32768, $stream->readInt16BE());
    }

    public function testInt16LittleEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt16LE(32767);
        $stream->setPosition(0);

        $this->assertEquals(32767, $stream->readInt16LE());
    }

    public function testInt16LittleEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeInt16LE(32768);
        $stream->setPosition(0);

        $this->assertEquals(-32768, $stream->readInt16LE());
    }
}
