<?php
/**
 * This file is part of phpbinary/phpbinary. (https://github.com/phpbinary/phpbinary)
 *
 * @link https://github.com/phpbinary/phpbinary for the canonical source repository
 * @copyright Copyright (c) 2015-2016 phpbinary. (https://github.com/phpbinary/)
 * @license https://raw.githubusercontent.com/phpbinary/phpbinary/master/LICENSE.md MIT
 */

namespace PhpBinary;

/**
 * The interface that defines all methods that are able to read binary data.
 */
interface ReaderInterface
{
    /**
     * Reads a 32-bits floating point number in machine byte order.
     *
     * @return float
     */
    public function readFloat32();

    /**
     * Reads a 32-bits floating point number in big endian byte order.
     *
     * @return float
     */
    public function readFloat32BE();

    /**
     * Reads a 32-bits floating point number in little endian byte order.
     *
     * @return float
     */
    public function readFloat32LE();

    /**
     * Reads a 64-bits floating point number in machine byte order.
     *
     * @return float
     */
    public function readFloat64();

    /**
     * Reads a 64-bits floating point number in big endian byte order.
     *
     * @return float
     */
    public function readFloat64BE();

    /**
     * Reads a 64-bits floating point number in little endian byte order.
     *
     * @return float
     */
    public function readFloat64LE();

    /**
     * Reads an 8-bit integer in machine byte order.
     *
     * @return int
     */
    public function readInt8();

    /**
     * Reads an 8-bit integer in big endian byte order.
     *
     * @return int
     */
    public function readInt8BE();

    /**
     * Reads an 8-bit integer in little endian byte order.
     *
     * @return int
     */
    public function readInt8LE();

    /**
     * Reads an 16-bit integer in machine byte order.
     *
     * @return int
     */
    public function readInt16();

    /**
     * Reads an 16-bit integer in big endian byte order.
     *
     * @return int
     */
    public function readInt16BE();

    /**
     * Reads an 16-bit integer in little endian byte order.
     *
     * @return int
     */
    public function readInt16LE();

    /**
     * Reads an 32-bit integer in machine byte order.
     *
     * @return int
     */
    public function readInt32();

    /**
     * Reads an 32-bit integer in big endian byte order.
     *
     * @return int
     */
    public function readInt32BE();

    /**
     * Reads an 32-bit integer in little endian byte order.
     *
     * @return int
     */
    public function readInt32LE();

    /**
     * Reads a string.
     *
     * @param int $length The length of the string to read.
     * @return string
     */
    public function readString($length);

    /**
     * Reads an 8-bit unsigned integer in machine byte order.
     *
     * @return int
     */
    public function readUInt8();

    /**
     * Reads an 8-bit unsigned integer in big endian byte order.
     *
     * @return int
     */
    public function readUInt8BE();

    /**
     * Reads an 8-bit unsigned integer in little endian byte order.
     *
     * @return int
     */
    public function readUInt8LE();

    /**
     * Reads an 16-bit unsigned integer in machine byte order.
     *
     * @return int
     */
    public function readUInt16();

    /**
     * Reads an 16-bit unsigned integer in big endian byte order.
     *
     * @return int
     */
    public function readUInt16BE();

    /**
     * Reads an 16-bit unsigned integer in little endian byte order.
     *
     * @return int
     */
    public function readUInt16LE();

    /**
     * Reads an 32-bit unsigned integer in machine byte order.
     *
     * @return int
     */
    public function readUInt32();

    /**
     * Reads an 32-bit unsigned integer in big endian byte order.
     *
     * @return int
     */
    public function readUInt32BE();

    /**
     * Reads an 32-bit unsigned integer in little endian byte order.
     *
     * @return int
     */
    public function readUInt32LE();
}
