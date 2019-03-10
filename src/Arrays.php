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
}
