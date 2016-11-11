<?php
/**
 * This file is part of phpbinary/phpbinary. (https://github.com/phpbinary/phpbinary)
 *
 * @link https://github.com/phpbinary/phpbinary for the canonical source repository
 * @copyright Copyright (c) 2015-2016 phpbinary. (https://github.com/phpbinary/)
 * @license https://raw.githubusercontent.com/phpbinary/phpbinary/master/LICENSE.md MIT
 */

namespace PhpBinary;

use InvalidArgumentException;

/**
 * A basic stream reader and writer.
 */
class Stream implements StreamInterface, ReaderInterface, WriterInterface
{
    /**
     * The handle to the stream.
     *
     * @var resource
     */
    private $handle;

    /**
     * Initializes a new instance of this class.
     *
     * @param resource $handle The handle to the resource.
     */
    public function __construct($handle)
    {
        if (!is_resource($handle)) {
            throw new InvalidArgumentException('Invalid stream provided.');
        }

        $this->handle = $handle;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function getEndianness()
    {
        return Endianness::detect();
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function getSize()
    {
        $currPos = ftell($this->handle);

        fseek($this->handle, 0, SEEK_END);
        $length = ftell($this->handle);

        fseek($this->handle, $currPos, SEEK_SET);

        return $length;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function getPosition()
    {
        return ftell($this->handle);
    }

    /**
     * {@inheritdoc}
     *
     * @param int $position
     */
    public function setPosition($position)
    {
        fseek($this->handle, $position, SEEK_SET);
    }

    /**
     * {@inheritdoc}
     *
     * @param int $bytes
     * @return string
     */
    protected function read($bytes)
    {
        if ($bytes < 1) {
            return '';
        }

        return fread($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @return float
     */
    public function readFloat32()
    {
        $bytes = $this->read(4);

        $result = unpack('f', $bytes);

        return current($result);
    }

    /**
     * {@inheritdoc}
     *
     * @return float
     */
    public function readFloat32BE()
    {
        return $this->readFloat32();
    }

    /**
     * {@inheritdoc}
     *
     * @return float
     */
    public function readFloat32LE()
    {
        return $this->readFloat32();
    }

    /**
     * {@inheritdoc}
     *
     * @return float
     */
    public function readFloat64()
    {
        $bytes = $this->read(8);

        $result = unpack('d', $bytes);

        return current($result);
    }

    /**
     * {@inheritdoc}
     *
     * @return float
     */
    public function readFloat64BE()
    {
        return $this->readFloat64();
    }

    /**
     * {@inheritdoc}
     *
     * @return float
     */
    public function readFloat64LE()
    {
        return $this->readFloat64();
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt16()
    {
        $bytes = $this->read(2);

        $unpacked = unpack('s', $bytes);

        $value = current($unpacked);

        while ($value >= 0x8000) {
            $value -= 0x10000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt16BE()
    {
        $bytes = $this->read(2);

        $unpacked = unpack('n', $bytes);

        $value = current($unpacked);

        while ($value >= 0x8000) {
            $value -= 0x10000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt16LE()
    {
        $bytes = $this->read(2);

        $unpacked = unpack('v', $bytes);

        $value = current($unpacked);

        while ($value >= 0x8000) {
            $value -= 0x10000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt32()
    {
        $bytes = $this->read(4);

        $unpacked = unpack('L', $bytes);

        $value = current($unpacked);

        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt32BE()
    {
        $bytes = $this->read(4);

        $unpacked = unpack('N', $bytes);

        $value = current($unpacked);

        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt32LE()
    {
        $bytes = $this->read(4);

        $unpacked = unpack('V', $bytes);

        $value = current($unpacked);

        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt8()
    {
        $bytes = $this->read(1);

        $unpacked = unpack('c', $bytes);

        return current($unpacked);
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt8BE()
    {
        return $this->readInt8();
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readInt8LE()
    {
        return $this->readInt8();
    }

    /**
     * {@inheritdoc}
     *
     * @param int $length The length of the string to read.
     * @return string
     */
    public function readString($length)
    {
        $bytes = $this->read($length);

        $unpacked = unpack('a' . $length, $bytes);

        return current($unpacked);
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt16()
    {
        $bytes = $this->read(2);

        $unpacked = unpack('S', $bytes);

        $value = current($unpacked);

        while ($value > 0xffff) {
            $value -= 0x10000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt16BE()
    {
        $bytes = $this->read(2);

        $unpacked = unpack('n', $bytes);

        $value = current($unpacked);

        while ($value > 0xffff) {
            $value -= 0x10000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt16LE()
    {
        $bytes = $this->read(2);

        $unpacked = unpack('v', $bytes);

        $value = current($unpacked);

        while ($value > 0xffff) {
            $value -= 0x10000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt32()
    {
        $bytes = $this->read(4);

        $unpacked = unpack('L', $bytes);

        $value = current($unpacked);

        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt32BE()
    {
        $bytes = $this->read(4);

        $unpacked = unpack('N', $bytes);

        $value = current($unpacked);

        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt32LE()
    {
        $bytes = $this->read(4);

        $unpacked = unpack('V', $bytes);

        $value = current($unpacked);

        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt8()
    {
        $bytes = $this->read(1);

        $unpacked = unpack('C', $bytes);

        $result = current($unpacked);

        while ($result > 0xff) {
            $result -= 0x100;
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt8BE()
    {
        return $this->readUInt8();
    }

    /**
     * {@inheritdoc}
     *
     * @return int
     */
    public function readUInt8LE()
    {
        return $this->readUInt8();
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeFloat32($value)
    {
        $bytes = pack('f', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeFloat32BE($value)
    {
        $this->writeFloat32($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeFloat32LE($value)
    {
        $this->writeFloat32($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeFloat64($value)
    {
        $bytes = pack('d', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeFloat64BE($value)
    {
        $this->writeFloat64($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeFloat64LE($value)
    {
        $this->writeFloat64($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt16($value)
    {
        while ($value >= 0x8000) {
            $value -= 0x10000;
        }

        $bytes = pack('s', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt16BE($value)
    {
        while ($value >= 0x8000) {
            $value -= 0x10000;
        }

        $bytes = pack('n', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt16LE($value)
    {
        while ($value >= 0x8000) {
            $value -= 0x10000;
        }

        $bytes = pack('v', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt32($value)
    {
        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        $bytes = pack('l', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt32BE($value)
    {
        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        $bytes = pack('N', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt32LE($value)
    {
        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        $bytes = pack('V', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt8($value)
    {
        while ($value >= 0x80) {
            $value -= 0x100;
        }

        $bytes = pack('c', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt8BE($value)
    {
        $this->writeInt8($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeInt8LE($value)
    {
        $this->writeInt8($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeString($value)
    {
        $bytes = pack('a' . strlen($value), $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt16($value)
    {
        while ($value > 0xffff) {
            $value -= 0x10000;
        }

        $bytes = pack('S', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt16BE($value)
    {
        while ($value > 0xffff) {
            $value -= 0x10000;
        }

        $bytes = pack('n', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt16LE($value)
    {
        while ($value > 0xffff) {
            $value -= 0x10000;
        }

        $bytes = pack('v', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt32($value)
    {
        while ($value >= 0x80000000) {
            $value -= 0x100000000;
        }

        $bytes = pack('L', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt32BE($value)
    {
        $bytes = pack('N', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt32LE($value)
    {
        $bytes = pack('V', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt8($value)
    {
        while ($value > 0xff) {
            $value -= 0x100;
        }

        $bytes = pack('C', $value);

        fwrite($this->handle, $bytes);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt8BE($value)
    {
        $this->writeUInt8($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param float $value The value to write.
     */
    public function writeUInt8LE($value)
    {
        $this->writeUInt8($value);
    }
}
