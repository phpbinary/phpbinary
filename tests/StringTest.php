<?php

namespace PhpBinaryTest;

use PhpBinary\Stream;

class StringTest extends \PHPUnit_Framework_TestCase
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

    public function testString()
    {
        $this->resource = fopen(tempnam(sys_get_temp_dir(), 'binary'), 'a+');

        $stream = new Stream($this->resource);
        $stream->writeString('Hello World');
        $stream->setPosition(0);

        $this->assertEquals('Hello World', $stream->readString(11));
    }
}
