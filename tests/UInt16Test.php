<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class UInt16Test extends \PHPUnit_Framework_TestCase
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

    public function testUInt16WithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt16(65535);
        $stream->setPosition(0);

        $this->assertEquals(65535, $stream->readUInt16());
    }

    public function testUInt16OutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt16(65536);
        $stream->setPosition(0);

        $this->assertEquals(0, $stream->readUInt16());
    }

    public function testUInt16BigEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt16BE(65535);
        $stream->setPosition(0);

        $this->assertEquals(65535, $stream->readUInt16BE());
    }

    public function testUInt16BigEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt16BE(65536);
        $stream->setPosition(0);

        $this->assertEquals(0, $stream->readUInt16BE());
    }

    public function testUInt16LittleEndianWithinBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt16LE(65535);
        $stream->setPosition(0);

        $this->assertEquals(65535, $stream->readUInt16LE());
    }

    public function testUInt16LittleEndianOutsideBuffer()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeUInt16LE(65536);
        $stream->setPosition(0);

        $this->assertEquals(0, $stream->readUInt16LE());
    }

}
