<?php

namespace PhpBinaryTest\Asset;

use PhpBinary\Stream;

class TestStream extends Stream
{
    public function readZeroBytes()
    {
        return $this->read(0);
    }

    public function readMinusBytes()
    {
        return $this->read(-1);
    }
}
