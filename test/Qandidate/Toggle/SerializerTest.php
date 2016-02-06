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

class SpySerializer extends Serializer
{
    /** @inheritdoc */
    public function assertHasKey($key, array $data)
    {
        parent::assertHasKey($key, $data);
    }
}

class SerializerTest extends TestCase
{
    /** @var SpySerializer */
    protected $obj;

    protected function setUp()
    {
        $this->obj = new SpySerializer();
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Missing key "foo" in data
     */
    public function array_has_key_throws_runtime_exceptions()
    {
        $arr = [];

        $this->obj->assertHasKey('foo', $arr);
    }

    /**
     * @test
     */
    public function array_has_key_does_not_throw_runtime_exceptions()
    {
        $arr = [
            'foo' => ':)'
        ];

        $this->obj->assertHasKey('foo', $arr);
    }
}