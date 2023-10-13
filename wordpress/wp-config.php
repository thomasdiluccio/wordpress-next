<?php

// wp-config-ddev.php not needed

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// function env(string $key, $defaultValue = null): mixed
// {
//     return $_ENV[$key] ?? $defaultValue;
// }

// function define_from_env(string $key, $defaultValue = null): void
// {
//     define($key, env($key, $defaultValue));
// }

define_from_env('DB_NAME');

/** Database username */
define_from_env('DB_USER');

/** Database password */
define_from_env('DB_PASSWORD');

/** Database hostname */
define_from_env('DB_HOST');

/** Database charset to use in creating database tables. */
define_from_env('DB_CHARSET');

/** The database collate type. Don't change this if in doubt. */
define_from_env('DB_COLLATE');

/**
 * Set WordPress Database Table prefix if not already set.
 *
 * @global string $table_prefix
 */
if (!isset($table_prefix) || empty($table_prefix)) {
    // phpcs:disable WordPress.WP.GlobalVariablesOverride.Prohibited
    $table_prefix = 'wp_';
    // phpcs:enable
}

/** Authentication Unique Keys and Salts. */
# https://api.wordpress.org/secret-key/1.1/salt/
define_from_env('AUTH_KEY');
define_from_env('SECURE_AUTH_KEY');
define_from_env('LOGGED_IN_KEY');
define_from_env('NONCE_KEY');
define_from_env('AUTH_SALT');
define_from_env('SECURE_AUTH_SALT');
define_from_env('LOGGED_IN_SALT');
define_from_env('NONCE_SALT');

/** Absolute path to the WordPress directory. */
defined('ABSPATH') || define('ABSPATH', dirname(__FILE__) . '/');

/** Include wp-settings.php */
if (file_exists(ABSPATH . '/wp-settings.php')) {
    require_once ABSPATH . '/wp-settings.php';
}