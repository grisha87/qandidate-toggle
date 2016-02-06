<?php

/*
 * This file is part of the qandidate/toggle package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Qandidate\Toggle\Serializer;

use Qandidate\Toggle\Serializer;
use Qandidate\Toggle\ToggleCollection\InMemoryCollection;

class InMemoryCollectionSerializer extends Serializer
{
    /**
     * @param array $data
     * @return InMemoryCollection
     */
    public function deserialize(array $data)
    {
        $collection = new InMemoryCollection();
        $serializer = new ToggleSerializer(new OperatorConditionSerializer(new OperatorSerializer()));

        foreach ($data as $name => $serializedToggle) {
            $toggle = $serializer->deserialize($serializedToggle);
            $collection->set($name, $toggle);
        }

        return $collection;
    }

    /**
     * @param InMemoryCollection $toggleCollection
     * @return array
     */
    public function serialize(InMemoryCollection $toggleCollection)
    {
        $serializer = new ToggleSerializer(new OperatorConditionSerializer(new OperatorSerializer()));
        $ret = array();
        foreach ($toggleCollection->all() as $key => $toggle) {
            $ret[$key] = $serializer->serialize($toggle);
        }

        return $ret;
    }
}
