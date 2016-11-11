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
 * The interfaces that defines a stream.
 */
interface StreamInterface
{
    /**
     * Gets the endianness of the current machine.
     *
     * @return int
     */
    public function getEndianness();

    /**
     * Gets the size of the stream.
     *
     * @return int
     */
    public function getSize();

    /**
     * Gets the size of the stream.
     *
     * @return int
     */
    public function getPosition();

    /**
     * Sets the position within the stream.
     *
     * @param int $position The position to set.
     */
    public function setPosition($position);
}
