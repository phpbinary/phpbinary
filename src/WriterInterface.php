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
 * The interface that defines all methods that are able to write binary data.
 */
interface WriterInterface
{
    /**
     * Writes a 32-bits floating point number in machine byte order.
     *
     * @param float $value The value to write.
     */
    public function writeFloat32($value);

    /**
     * Writes a 32-bits floating point number in big endian byte order.
     *
     * @param float $value The value to write.
     */
    public function writeFloat32BE($value);

    /**
     * Writes a 32-bits floating point number in little endian byte order.
     *
     * @param float The value to write.
     */
    public function writeFloat32LE($value);

    /**
     * Writes a 64-bits floating point number in machine byte order.
     *
     * @param float $value The value to write.
     */
    public function writeFloat64($value);

    /**
     * Writes a 64-bits floating point number in big endian byte order.
     *
     * @param float $value The value to write.
     */
    public function writeFloat64BE($value);

    /**
     * Writes an 64-bits floating point number in little endian byte order.
     *
     * @param float The value to write.
     */
    public function writeFloat64LE($value);

    /**
     * Writes an 8-bit integer in machine byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt8($value);

    /**
     * Writes an 8-bit integer in big endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt8BE($value);

    /**
     * Writes an 8-bit integer in little endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt8LE($value);

    /**
     * Writes an 16-bit integer in machine byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt16($value);

    /**
     * Writes an 16-bit integer in big endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt16BE($value);

    /**
     * Writes an 16-bit integer in little endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt16LE($value);

    /**
     * Writes an 32-bit integer in machine byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt32($value);

    /**
     * Writes an 32-bit integer in big endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt32BE($value);

    /**
     * Writes an 32-bit integer in little endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeInt32LE($value);

    /**
     * Writes a string.
     *
     * @param string $value The value to write.
     */
    public function writeString($value);

    /**
     * Writes an 8-bit unsigned integer in machine byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt8($value);

    /**
     * Writes an 8-bit unsigned integer in big endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt8BE($value);

    /**
     * Writes an 8-bit unsigned integer in little endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt8LE($value);

    /**
     * Writes an 16-bit unsigned integer in machine byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt16($value);

    /**
     * Writes an 16-bit unsigned integer in big endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt16BE($value);

    /**
     * Writes an 16-bit unsigned integer in little endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt16LE($value);

    /**
     * Writes an 32-bit unsigned integer in machine byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt32($value);

    /**
     * Writes an 32-bit unsigned integer in big endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt32BE($value);

    /**
     * Writes an 32-bit unsigned integer in little endian byte order.
     *
     * @param int $value The value to write.
     */
    public function writeUInt32LE($value);
}
