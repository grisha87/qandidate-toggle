<?php

/*
 * This file is part of the qandidate/toggle package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Qandidate\Toggle;

/**
 * Representation of a serializer
 *
 * This class provides common ground for concrete serializer implementations
 *
 * @TODO: serialize() and deserialize() should be part of abstract interface
 */
abstract class Serializer
{
    /**
     * Asserts that given $data array contains the key $key
     *
     * @param int|string $key
     * @param array      $data
     *
     * @throws \RuntimeException
     */
    protected function assertHasKey($key, array $data)
    {
        if (!array_key_exists($key, $data)) {
            throw new \RuntimeException(sprintf('Missing key "%s" in data.', $key));
        }
    }
}