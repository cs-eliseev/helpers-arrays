<?php

declare(strict_types=1);

namespace cse\helpers;

/**
 * Class Arrays
 *
 * @package cse\helpers
 */
class Arrays
{
    /**
     * Get array value by key
     *
     * @param array $data
     * @param $key
     * @param $default
     *
     * @return mixed|null
     */
    public static function get(array $data, $key, $default = null)
    {
        return array_key_exists($key, $data) ? $data[$key] : $default;
    }

    /**
     * Pull array key
     *
     * @param array $data
     * @param $key
     * @param $default
     *
     * @return mixed|null
     */
    public static function pullKey(array &$data, $key, $default = null)
    {
        $result = self::get($data, $key, $default);
        unset($data[$key]);

        return $result;
    }

    /**
     * Object to array
     *
     * @param $data
     *
     * @return array
     */
    public static function objectToArray($data): array
    {
        return json_decode(json_encode($data), true);
    }

    /**
     * To string key and value
     *
     * @param array $data
     * @param string $preFix
     * @param string $postFix
     *
     * @return string
     */
    public static function toString(array $data, string $preFix = ':', $postFix = ';'): string
    {
        $string = '';

        foreach ($data as $key => $option) {
            $string .= $key . $preFix . $option . $postFix;
        }

        return $string;
    }

    /**
     * Array to html
     *
     * @param array $data
     *
     * @return string
     */
    public static function toTags(array $data): string
    {
        $string = '';

        foreach ($data as $key => $item) {
            $info = [];
            if (is_int($key)) {
                $info['tag'] = $item;
            } elseif (is_array($item)) {
                $info = self::replaceTagInfo($item);
                $info['tag'] = $key;
            } else {
                $info['content'] = $item;
                $info['tag'] = $key;
            }

            $string .= '<' . $info['tag'] . (empty($info['attr']) ? '' : $info['attr']) . (empty($info['content']) ? ' />' : '>' . $info['content'] . '</' . $info['tag'] . '>');
        }

        return $string;
    }

    /**
     * Building Maps
     *
     * @param $data
     * @param $keyGroup
     * @param $keyValue
     *
     * @return array
     */
    public static function map(array $data, $keyGroup, $keyValue = null): array
    {
        $result = [];

        foreach ($data as $item) {
            if (array_key_exists($keyGroup, $item)) {
                $result[$item[$keyGroup]] = self::getValueCheckParam($item, $keyValue);
            }
        }

        return $result;
    }

    /**
     * Group array
     *
     * @param array $data
     * @param $keyGroup
     * @param $keyValue
     *
     * @return array
     */
    public static function group(array $data, $keyGroup, $keyValue = null): array
    {
        $result = [];

        foreach ($data as $item) {
            if (array_key_exists($keyGroup, $item)) {
                $key = $item[$keyGroup];

                if (empty($result[$key])) $result[$key] = [];

                $result[$key][] = self::getValueCheckParam($item, $keyValue);
            }
        }

        return $result;
    }
    /**
     * Index group array
     *
     * @param array $data
     * @param $keyGroup
     * @param $keyValue
     *
     * @return array
     */
    public static function index(array $data, $keyGroup, $keyValue = null): array
    {
        $result = [];

        foreach ($data as $item) {
            if (array_key_exists($keyGroup, $item)) {
                $result[$item[$keyGroup]][] = self::getValueCheckParam($item, $keyValue);
            }
        }

        return $result;
    }

    /**
     * Append not empty array data
     *
     * @param array $first
     * @param array $second
     *
     * @return array
     */
    public static function appendNotEmptyData(array $first, array $second): array
    {
        $result = null;

        switch (true) {
            case empty($first) && empty($second):
                $result = [];
                break;
            case empty($second):
                $result = $first;
                break;
            case empty($first):
                $result = self::removeEmpty($second);
                break;
            default:
                $result = self::appendNotEmpty($first, $second);
                break;
        }

        return $result;
    }

    /**
     * Replace empty array data to not empty array data
     *
     * @param array $first
     * @param array $second
     *
     * @return array
     */
    public static function replaceEmptyNotEmptyData(array $first = [], array $second = []): array
    {
        if (!empty($first) && !empty($second)) {
            foreach ($first as $key => &$value) {
                if (empty($value) && array_key_exists($key, $second)) $value = $second[$key];
            }
        }
        return $first;
    }

    /**
     * Replace not empty array data
     *
     * @param array $first
     * @param array $second
     *
     * @return array
     */
    public static function replaceNotEmptyData(array $first = [], array $second = []): array
    {
        if (!empty($first) && !empty($second)) {
            foreach ($first as $key => &$value) {
                if (!empty($second[$key])) $value = $second[$key];
            }
        }
        return $first;
    }

    /**
     * Merge not empty array data
     *
     * @param array $first
     * @param array $second
     *
     * @return array
     */
    public static function mergeNotEmptyData(array $first = [], array $second = []): array
    {
        if (!empty($first) && !empty($second)) {
            foreach ($second as $key => $value) {
                if (!empty($value)) $first[$key] = $value;
            }
        }
        return $first;
    }

    /**
     * Convert empty to null
     *
     * @param array $data
     * @param bool $recursive
     *
     * @return array
     */
    public static function emptyToNull(array $data, bool $recursive = false): array
    {
        foreach ($data as $key => &$value) {
            if (empty($value)) {
                $value = null;
            } elseif ($recursive && is_array($value)) {
                $value = self::emptyToNull($value, $recursive);
            }
        }
        return $data;
    }

    /**
     * Remove empty data to array
     *
     * @param array $data
     * @param bool $recursive
     *
     * @return array
     */
    public static function removeEmpty(array $data, bool $recursive = false): array
    {
        foreach ($data as $key => &$value) {
            if (empty($value)) {
                unset($data[$key]);
            } elseif ($recursive && is_array($value)) {
                $value = self::removeEmpty($value, $recursive);
            }
        }
        return $data;
    }

    /**
     * Remove null data to array
     *
     * @param array $data
     * @param bool $recursive
     *
     * @return array
     */
    public static function removeNull(array $data, bool $recursive = false): array
    {
        foreach ($data as $key => &$value) {
            if (is_null($value)) {
                unset($data[$key]);
            } elseif ($recursive && is_array($value)) {
                $value = self::removeNull($value, $recursive);
            }
        }
        return $data;
    }

    /**
     * Trim value to array
     *
     * @param array $data
     * @param bool $recursive
     *
     * @return array
     */
    public static function trim(array $data, bool $recursive = true): array
    {
        foreach ($data as $key => &$value) {
            if (is_string($value)) {
                $value = trim($value);
            } elseif ($recursive && is_array($value)) {
                $value = self::trim($value);
            }
        }
        return $data;
    }

    /**
     * Append not empty
     *
     * @param array $first
     * @param array $second
     *
     * @return array
     */
    protected static function appendNotEmpty(array $first, array $second): array
    {
        foreach ($second as $key => $value) {
            if (!empty($value) && !array_key_exists($key, $first)) $first[$key] = $value;
        }
        return $first;
    }

    /**
     * Replace tag info
     *
     * @param array $info
     *
     * @return array
     */
    protected static function replaceTagInfo(array $info): array
    {
        $result = ['attr' => '', 'content' => ''];

        foreach ($info as $key => $item) {
            if (is_int($key) && is_array($item)) {
                $result['attr'] .= ' ' . trim(self::toString($item, '="', '" '));
            } elseif (is_int($key)) {
                $result['content'] = $item;
            } else {
                $result['attr'] .= ' ' . $key .'="' . $item . '"';
            }
        }

        return $result;
    }

    /**
     * Get value check param
     *
     * @param array $data
     * @param $keyValue
     *
     * @return mixed
     */
    protected static function getValueCheckParam(array $data, $keyValue)
    {
        return is_null($keyValue) ? $data : (array_key_exists($keyValue, $data) ? $data[$keyValue] : null);
    }
}
