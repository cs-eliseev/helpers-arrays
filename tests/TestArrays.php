<?php

use cse\helpers\Arrays;
use PHPUnit\Framework\TestCase;

class TestArrays extends TestCase
{
    /**
     * @param array $data
     * @param string $key
     * @param $default
     * @param $expected
     *
     * @dataProvider providerDefaultData
     */
    public function testGet(array $data, $key, $default, $expected): void
    {
        $this->assertEquals($expected, Arrays::get($data, $key, $default));
    }

    /**
     * @param array $data
     * @param string $key
     * @param $default
     * @param $expected
     *
     * @dataProvider providerDefaultData
     */
    public function testPullKey(array $data, $key, $default, $expected): void
    {
        $this->assertEquals($expected, Arrays::pullKey($data, $key, $default));

        $this->assertFalse(array_key_exists($key, $data));
    }

    /**
     * @return array
     */
    public function providerDefaultData(): array
    {
        return [
            [
                [
                    'key1' => 'value1',
                    'key2' => 'value2',
                    'key3' => 'value3'
                ],
                'key1',
                null,
                'value1'
            ],
            [
                [
                    'key1' => 'value1',
                    'key2' => 'value2',
                    'key3' => 'value3'
                ],
                'key4',
                'default1',
                'default1'
            ]
        ];
    }
}