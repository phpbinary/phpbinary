<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class FloatTest extends \PHPUnit_Framework_TestCase
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

    public function testFloat32()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeFloat32(12.34);
        $stream->setPosition(0);

        $this->assertEquals(12.34, $stream->readFloat32(), '', 0.00001);
    }

    public function testFloat32BE()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeFloat32BE(12.34);
        $stream->setPosition(0);

        $this->assertEquals(12.34, $stream->readFloat32BE(), '', 0.00001);
    }

    public function testFloat32LE()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeFloat32LE(12.34);
        $stream->setPosition(0);

        $this->assertEquals(12.34, $stream->readFloat32LE(), '', 0.00001);
    }

    public function testFloat64()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeFloat64(12.34);
        $stream->setPosition(0);

        $this->assertEquals(12.34, $stream->readFloat64(), '', 0.00001);
    }

    public function testFloat64BE()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeFloat64BE(12.34);
        $stream->setPosition(0);

        $this->assertEquals(12.34, $stream->readFloat64BE(), '', 0.00001);
    }

    public function testFloat64LE()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeFloat64LE(12.34);
        $stream->setPosition(0);

        $this->assertEquals(12.34, $stream->readFloat64LE(), '', 0.00001);
    }
}
