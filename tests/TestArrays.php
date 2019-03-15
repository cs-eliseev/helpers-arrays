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

    /**
     * @param $data
     * @param array $expected
     *
     * @dataProvider providerObjectToArray
     */
    public function testObjectToArray($data, array $expected): void
    {
        $this->assertEquals($expected, Arrays::objectToArray($data));
    }

    /**
     * @return array
     */
    public function providerObjectToArray(): array
    {
        $object = new \stdClass();
        $object->test1 = 1;
        $object->test2 = 2;

        return [
            [
                $object,
                ['test1' => 1, 'test2' => 2]
            ]
        ];
    }

    /**
     * @param array $data
     * @param string $expected
     *
     * @dataProvider providerToTags
     */
    public function testToTags(array $data, string $expected): void
    {
        $this->assertEquals($expected, Arrays::toTags($data));
    }

    /**
     * @return array
     */
    public function providerToTags(): array
    {
        return [
            [
                ['test1', 'test2'],
                '<test1 />' . PHP_EOL . '<test2 />'
            ],
            [
                ['test1' => 1, 'test2' => 2],
                '<test1>1</test1>' . PHP_EOL . '<test2>2</test2>'
            ],
            [
                [
                    'test1' => [
                        1,
                        'attr1' => 1,
                        'attr2' => 2
                    ],
                    'test2' => 2
                ],
                '<test1 attr1="1" attr2="2">1</test1>' . PHP_EOL . '<test2>2</test2>'
            ],
        ];
    }

    /**
     * @param array $data
     * @param $ketGroup
     * @param $keyValue
     * @param array $expected
     *
     *  @dataProvider providerMap
     */
    public function testMap(array $data, $ketGroup, $keyValue, array $expected): void
    {
        $this->assertEquals($expected, Arrays::map($data, $ketGroup, $keyValue));
    }

    /**
     * @return array
     */
    public function providerMap(): array
    {
        $testArray = [
            [
                'keyGroup1' => 'value1',
                'keyGroup2' => 'value2',
                'keyGroup3' => 'value3'
            ], [
                'keyGroup2' => 'value2',
                'keyGroup3' => 'value3'
            ], [
                'keyGroup1' => 'value1',
                'keyGroup3' => 'value2'
            ]
        ];

        return [
            [
                $testArray,
                'keyGroup1',
                null,
                [
                    'value1' => [
                        'keyGroup1' => 'value1',
                        'keyGroup3' => 'value2'
                    ]

                ]
            ],
            [
                $testArray,
                'keyGroup2',
                null,
                [
                    'value2' => [
                        'keyGroup2' => 'value2',
                        'keyGroup3' => 'value3'
                    ]

                ]
            ],
            [
                $testArray,
                'keyGroup3',
                'keyGroup1',
                [
                    'value2' => 'value1',
                    'value3' => null
                ]
            ]
        ];
    }

    /**
     * @param array $data
     * @param $ketGroup
     * @param $keyValue
     * @param array $expected
     *
     *  @dataProvider providerGroup
     */
    public function testGroup(array $data, $ketGroup, $keyValue, array $expected): void
    {
        $this->assertEquals($expected, Arrays::group($data, $ketGroup, $keyValue));
    }

    /**
     * @return array
     */
    public function providerGroup(): array
    {
        $testArray = [
            [
                'keyGroup1' => 'value1',
                'keyGroup2' => 'value2',
                'keyGroup3' => 'value3'
            ], [
                'keyGroup2' => 'value2',
                'keyGroup3' => 'value3'
            ], [
                'keyGroup1' => 'value1',
                'keyGroup3' => 'value2'
            ]
        ];

        return [
            [
                $testArray,
                'keyGroup1',
                null,
                [
                    'value1' => [
                        [
                            'keyGroup1' => 'value1',
                            'keyGroup2' => 'value2',
                            'keyGroup3' => 'value3'
                        ],
                        [
                            'keyGroup1' => 'value1',
                            'keyGroup3' => 'value2'
                        ]
                    ]
                ]
            ],
            [
                $testArray,
                'keyGroup2',
                null,
                [
                    'value2' => [
                        [
                            'keyGroup1' => 'value1',
                            'keyGroup2' => 'value2',
                            'keyGroup3' => 'value3'
                        ],
                        [
                            'keyGroup2' => 'value2',
                            'keyGroup3' => 'value3'
                        ]
                    ]
                ]
            ],
            [
                $testArray,
                'keyGroup3',
                'keyGroup1',
                [
                    'value3' => ['value1', null],
                    'value2' => ['value1']
                ]
            ]
        ];
    }
}