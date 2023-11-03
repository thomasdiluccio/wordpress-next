<?php

// wp-config-ddev.php not needed

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


define_from_env('DB_NAME');
define_from_env('DB_USER');
define_from_env('DB_PASSWORD');
define_from_env('DB_CHARSET');
define_from_env('DB_COLLATE');

if (env('IS_DDEV_PROJECT', false)) {
    define_env('DB_HOST', 'ddev-' . env('DDEV_SITENAME') . '-db');
    define_env('WP_HOME', env('DDEV_PRIMARY_URL'));
    define_env('WP_SITEURL', env('DDEV_PRIMARY_URL') . '/');
} else {
    define_from_env('DB_HOST');
    define_from_env('WP_HOME');
    define_from_env('WP_SITEURL');
}

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
