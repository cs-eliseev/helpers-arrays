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
                '<test1 /><test2 />'
            ],
            [
                ['test1' => 1, 'test2' => 2],
                '<test1>1</test1><test2>2</test2>'
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
                '<test1 attr1="1" attr2="2">1</test1><test2>2</test2>'
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

    /**
     * @param array $data
     * @param $ketGroup
     * @param $keyValue
     * @param array $expected
     *
     *  @dataProvider providerIndex
     */
    public function testIndex(array $data, $ketGroup, $keyValue, array $expected): void
    {
        $this->assertEquals($expected, Arrays::group($data, $ketGroup, $keyValue));
    }

    /**
     * @return array
     */
    public function providerIndex(): array
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

    /**
     * @param array $first
     * @param array $second
     * @param array $expected
     *
     * @dataProvider providerAppendNotEmptyData
     */
    public function testAppendNotEmptyData(array $first, array $second, array $expected): void
    {
        $this->assertEquals($expected, Arrays::appendNotEmptyData($first, $second));
    }

    /**
     * @return array
     */
    public function providerAppendNotEmptyData(): array
    {
        return [
            [
                [],
                [],
                []
            ],
            [
                [],
                [1 => 'second1', 2 => 'second2'],
                [1 => 'second1', 2 => 'second2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [1 => 'second1', 2 => 'second2'],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [3 => 'second3'],
                [1 => 'first1', 2 => 'first2', 3 => 'second3']
            ],
            [
                [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7'],
                [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => '', 6 => '0', 7 => null, 8 => 'second8'],
                [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => 'second8'],
            ],
        ];
    }

    /**
     * @param array $first
     * @param array $second
     * @param array $expected
     *
     * @dataProvider providerReplaceEmptyNotEmptyData
     */
    public function testReplaceEmptyNotEmptyData(array $first, array $second, array $expected): void
    {
        $this->assertEquals($expected, Arrays::replaceEmptyNotEmptyData($first, $second));
    }

    /**
     * @return array
     */
    public function providerReplaceEmptyNotEmptyData(): array
    {
        return [
            [
                [],
                [],
                []
            ],
            [
                [],
                [1 => 'second1', 2 => 'second2'],
                []
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [1 => 'second1', 2 => 'second2'],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [3 => 'second3'],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7'],
                [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => '', 6 => '0', 7 => null, 8 => 'second8'],
                [1 => 'first1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => 'first5', 6 => 'first6', 7 => 'first7'],
            ],
        ];
    }

    /**
     * @param array $first
     * @param array $second
     * @param array $expected
     *
     * @dataProvider providerReplaceNotEmptyData
     */
    public function testReplaceNotEmptyData(array $first, array $second, array $expected): void
    {
        $this->assertEquals($expected, Arrays::replaceNotEmptyData($first, $second));
    }

    /**
     * @return array
     */
    public function providerReplaceNotEmptyData(): array
    {
        return [
            [
                [],
                [],
                []
            ],
            [
                [],
                [1 => 'second1', 2 => 'second2'],
                []
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [1 => 'second1', 2 => 'second2'],
                [1 => 'second1', 2 => 'second2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [3 => 'second3'],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7'],
                [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => '', 6 => '0', 7 => null, 8 => 'second8'],
                [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => 'first5', 6 => 'first6', 7 => 'first7'],
            ],
        ];
    }

    /**
     * @param array $first
     * @param array $second
     * @param array $expected
     *
     * @dataProvider providerMergeNotEmptyData
     */
    public function testMergeNotEmptyData(array $first, array $second, array $expected): void
    {
        $this->assertEquals($expected, Arrays::mergeNotEmptyData($first, $second));
    }

    /**
     * @return array
     */
    public function providerMergeNotEmptyData(): array
    {
        return [
            [
                [],
                [],
                []
            ],
            [
                [],
                [1 => 'second1', 2 => 'second2'],
                [1 => 'second1', 2 => 'second2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [],
                [1 => 'first1', 2 => 'first2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [1 => 'second1', 2 => 'second2'],
                [1 => 'second1', 2 => 'second2']
            ],
            [
                [1 => 'first1', 2 => 'first2'],
                [3 => 'second3'],
                [1 => 'first1', 2 => 'first2', 3 => 'second3']
            ],
            [
                [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7'],
                [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => '', 6 => '0', 7 => null, 8 => 'second8'],
                [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => 'second8'],
            ],
        ];
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @param array $expected
     *
     * @dataProvider providerEmptyToNull
     */
    public function testEmptyToNull(array $data, bool $recursive, array $expected): void
    {
        $this->assertEquals($expected, Arrays::emptyToNull($data, $recursive));
    }

    /**
     * @return array
     */
    public function providerEmptyToNull(): array
    {
        return [
            [
                [],
                true,
                []
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                false,
                [' first 1 ', 'key1' => null, null, null, 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, null, 'key8' => 'first 2 '],
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                true,
                [' first 1 ', 'key1' => null, null, null, 'key4' => null, [' first 3', null, 'key2' => null, null, 'key5' => null, 'key6' => 12, null, 'first 4 '], true, null, 'key8' => 'first 2 '],
            ],
        ];
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @param array $expected
     *
     * @dataProvider providerRemoveEmpty
     */
    public function testRemoveEmpty(array $data, bool $recursive, array $expected): void
    {
        $this->assertEquals($expected, Arrays::removeEmpty($data, $recursive));
    }

    /**
     * @return array
     */
    public function providerRemoveEmpty(): array
    {
        return [
            [
                [],
                true,
                []
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                false,
                [' first 1 ', 3 => [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], 4 => true, 'key8' => 'first 2 ']
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                true,
                [' first 1 ', 3 => [' first 3', 'key6' => 12, 4 => 'first 4 '], 4 => true, 'key8' => 'first 2 ']
            ],
        ];
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @param array $expected
     *
     * @dataProvider providerRemoveNull
     */
    public function testRemoveNull(array $data, bool $recursive, array $expected): void
    {
        $this->assertEquals($expected, Arrays::removeNull($data, $recursive));
    }

    /**
     * @return array
     */
    public function providerRemoveNull(): array
    {
        return [
            [
                [],
                true,
                []
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                false,
                [' first 1 ', 'key1' => false, '', '0', [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                true,
                [' first 1 ', 'key1' => false, '', '0', [' first 3', false, 'key2' => '', '0', 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
            ],
        ];
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @param array $expected
     *
     * @dataProvider providerTrim
     */
    public function testTrim(array $data, bool $recursive, array $expected): void
    {
        $this->assertEquals($expected, Arrays::trim($data, $recursive));
    }

    /**
     * @return array
     */
    public function providerTrim(): array
    {
        return [
            [
                [],
                true,
                []
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                false,
                ['first 1', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2'],
            ],
            [
                [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
                true,
                ['first 1', 'key1' => false, '', '0', 'key4' => null, ['first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4'], true, [], 'key8' => 'first 2'],
            ],
        ];
    }
}