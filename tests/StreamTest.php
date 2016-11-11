<?php

namespace PhpBinaryTest;

use PhpBinary\Endianness;
use PhpBinary\Stream;
use PhpBinaryTest\Asset\TestStream;
use PHPUnit_Framework_TestCase;

class StreamTest extends PHPUnit_Framework_TestCase
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

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid stream provided
     */
    public function testInvalidStream()
    {
        new TestStream('test');
    }

    public function testReadZeroBytes()
    {
        $this->resource = fopen(__FILE__, 'r');

        $stream = new TestStream($this->resource);

        $this->assertEquals('', $stream->readZeroBytes());
    }

    public function testReadMinusBytes()
    {
        $this->resource = fopen(__FILE__, 'r');

        $stream = new TestStream($this->resource);

        $this->assertEquals('', $stream->readMinusBytes());
    }

    public function testGetEndianness()
    {
        $this->resource = fopen(__FILE__, 'r');

        $stream = new Stream($this->resource);

        $value = 0x00FF;
        $packed = pack('S', $value);
        if ($value === current(unpack('v', $packed))) {
            $this->assertEquals(Endianness::LITTLE, $stream->getEndianness());
        } else {
            $this->assertEquals(Endianness::BIG, $stream->getEndianness());
        }
    }

    public function testGetSize()
    {
        $this->resource = fopen('tests/assets/howdy.txt', 'r');

        $stream = new Stream($this->resource);

        $this->assertEquals(5, $stream->getSize());
    }

    public function testGetPosition()
    {
        $this->resource = fopen(__FILE__, 'r');

        $stream = new Stream($this->resource);
        $stream->setPosition(1);

        $this->assertEquals(1, $stream->getPosition());
    }

    public function testSetPosition()
    {
        $this->resource = fopen(__FILE__, 'r');

        $stream = new Stream($this->resource);
        $stream->setPosition(1);

        $this->assertEquals(1, $stream->getPosition());
    }
}
