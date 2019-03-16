<?php

declare(strict_types = 1);

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
     * @param null $default
     *
     * @return mixed|null
     */
    public static function get(array $data, string $key, $default = null)
    {
        if (!array_key_exists($key, $data)) return $default;

        return $data[$key];
    }

    /**
     * Pull array key
     *
     * @param array $data
     * @param $key
     * @param null $default
     *
     * @return mixed|null
     */
    public static function pullKey(array &$data, string $key, $default = null)
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
     * Array to html
     *
     * @param array $data
     *
     * @return string
     */
    public static function toTags(array $data): string
    {
        $result = [];

        foreach ($data as $key => $item) {
            if (is_int($key)) {
                $tag = $item;
            } else {
                $tag = $key;

                if (is_array($item)) {
                    $options = '';
                    $content = '';

                    foreach ($item as $key2 => $item2) {
                        if (is_int($key2) && is_array($item2)) {
                            foreach ($item2 as $name => $value) {
                                $options .= ' ' . $name .'="' . $value . '"';
                            }
                        } elseif (is_int($key2)) {
                            $content = $item2;
                        } else {
                            $options .= ' ' . $key2 .'="' . $item2 . '"';
                        }
                    }

                } else {
                    $content = $item;
                }
            }

            $result[] = '<' . $tag . (empty($options) ? '' : $options) . (empty($content) ? ' />' : '>' . $content . '</' . $tag . '>');
            unset($options, $content, $tag);
        }

        return implode(PHP_EOL, $result);
    }

    /**
     * Building Maps
     *
     * @param $data
     * @param $keyGroup
     * @param null $keyValue
     *
     * @return array
     */
    public static function map(array $data, $keyGroup, $keyValue = null): array
    {
        $result = [];

        foreach ($data as $item) {
            if (array_key_exists($keyGroup, $item)) {
                $result[$item[$keyGroup]] = is_null($keyValue) ? $item : (array_key_exists($keyValue, $item) ? $item[$keyValue] : null);
            }
        }

        unset($item);

        return $result;
    }

    /**
     * Group array
     *
     * @param array $data
     * @param $keyGroup
     * @param null $keyValue
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

                $result[$key][] = is_null($keyValue) ? $item : (array_key_exists($keyValue, $item) ? $item[$keyValue] : null);
            }
        }

        unset($item, $key);

        return $result;
    }
    /**
     * Index group array
     *
     * @param array $data
     * @param $keyGroup
     * @param null $keyValue
     *
     * @return array
     */
    public static function index(array $data, $keyGroup, $keyValue = null): array
    {
        $result = [];

        foreach ($data as $item) {
            if (array_key_exists($keyGroup, $item)) {
                $result[$item[$keyGroup]][] = is_null($keyValue) ? $item : (array_key_exists($keyValue, $item) ? $item[$keyValue] : null);
            }
        }

        unset($item);

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

                foreach ($second as $key => $value) {
                    if (!empty($value)) $result[$key] = $value;
                }

                unset($value, $key, $second);
                break;

            default:
                foreach ($second as $key => $value) {
                    if (!empty($value) && !array_key_exists($key, $first)) $first[$key] = $value;
                }

                $result = $first;
                unset($value, $key, $second, $first);
                break;
        }

        return $result;
    }
}
