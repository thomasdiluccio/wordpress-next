<?php

if (!function_exists('env')) {
    function env(string $key, string|int|bool $defaultValue = null): mixed
    {
        return $_ENV[$key] ?? $defaultValue;
    }
}

if (!function_exists('define_from_env')) {
    function define_from_env(string $key, string|int|bool $defaultValue = null): void
    {
        define($key, env($key, $defaultValue));
    }
}
