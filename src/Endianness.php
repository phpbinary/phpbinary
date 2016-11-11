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
 * Endianness is the order of the bytes that compose a digital word in computer memory. It also describes the
 * order of byte transmission over a digital link.
 */
final class Endianness
{
    /** Big-endian byte order (0x01 0x02 0x03 0x04). */
    const BIG = 0;

    /** Little-endian byte order (0x04 0x03 0x02 0x01). */
    const LITTLE = 1;

    /**
     * Detects the endianess of the current system.
     *
     * @return int
     */
    public static function detect()
    {
        // @codeCoverageIgnoreStart
        $value = 0x00FF;

        $packed = pack('S', $value);

        if ($value === current(unpack('v', $packed))) {
            return self::LITTLE;
        }

        return self::BIG;
        // @codeCoverageIgnoreEnd
    }
}
