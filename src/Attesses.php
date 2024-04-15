<?php

/**
 * Export for the Laravel application.
 *
 * Autor: Jorge Usuga
 */

namespace Atsu\Attesses;

class Attesses {
    protected static $config;

    public static function setConfig($config)
    {
        self::$config = $config;
    }

    public static function atteses($key, $default = 'Not found.')
    {
        $path = self::$config['atteses_path'] ?? null;
        $exports = file_exists($path) ? require $path : [];

        $keys = explode('.', $key);

        if (count($keys) <= 1) {
            return 'You must select a value.';
        }

        if (count($keys) > 2) {
            return 'Many values.';
        }

        return $exports[$keys[0]][$keys[1]] ?? $default;
    }
}