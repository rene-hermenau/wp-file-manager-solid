<?php
/**
 * Plugin Name: WP File Manager Solid
 * Plugin URI: https://wordpress.org/plugins/wp-file-manager-solid
 * Description: WP File Manager Solid | by WP STAGING
 * Version: 1.0.0
 * Author: WP-STAGING
 * Author URI: https://profiles.wordpress.org/wp-staging/
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * License: GPLv3
 * Text Domain: wpfmsolid
 * Domain Path: /languages/
 *
 * @package  wpfmsolid
 * @category Development
 * @author   WP-STAGING
 */

namespace WpFileManagerSolid;

if (!defined("WPINC")) {
    die;
}

/**
 * Welcome to WP File Manager Solid by WP STAGING.
 *
 * If you're reading this, you are a curious person that likes
 * to understand how things works, and that's awesome!
 *
 * The philosophy of this file is to work on all PHP versions.
 *
 * Before PHP can understand conditionals such as "if, else",
 * it has to parse this file and split it into "tokens". This
 * process is called "lexical analysis", and exists in almost
 * all programming languages.
 *
 * This file uses only syntax that works with all PHP versions,
 * so that any PHP version can parse it and run our version check
 * conditional.
 *
 * Then we include other PHP files to be parsed, this time, certain
 * to be executing in a PHP version that is capable of parsing the
 * syntax we are using.
 */

if (!defined('WPFMSOLID_VERSION')) {
    define('WPFMSOLID_VERSION', '1.0.0');
}

if (!defined('WPFMSOLID_COMPATIBLE_MIN_PHP_VERSION')) {
    define('WPFMSOLID_COMPATIBLE_MIN_PHP_VERSION', '5.6.0');
}

if (!defined('WPFMSOLID_PLUGIN_DIR')) {
    define('WPFMSOLID_PLUGIN_DIR', dirname(__FILE__));
}

if (!defined('WPFMSOLID_INCLUDES_DIR')) {
    define('WPFMSOLID_INCLUDES_DIR', WPFMSOLID_PLUGIN_DIR . '/includes/');
}

if (!defined('WPFMSOLID_VENDOR_DIR')) {
    define('WPFMSOLID_VENDOR_DIR', WPFMSOLID_PLUGIN_DIR . '/vendor/');
}

if (!defined('WPFMSOLID_ASSETS_DIR')) {
    define('WPFMSOLID_ASSETS_DIR', WPFMSOLID_PLUGIN_DIR . '/assets/');
}

if (!defined('WPFMSOLID_VIEWS_DIR')) {
    define('WPFMSOLID_VIEWS_DIR', WPFMSOLID_PLUGIN_DIR . '/views/');
}

if (version_compare(phpversion(), WPFMSOLID_COMPATIBLE_MIN_PHP_VERSION, '>=')) {
    require_once(WPFMSOLID_INCLUDES_DIR . 'bootstrap.php');
} else {
    function notice_unsupported_php_version()
    {
        echo '<div class="notice-warning notice is-dismissible">';
        echo '<p style="font-weight: bold;">' . esc_html__('PHP Version not supported') . '</p>';
        echo '<p>' . esc_html__(sprintf('WP File Manager Solid by WP STAGING requires PHP %s or higher. Your site is running an outdated version of PHP (%s), which requires an update.', WPFMSOLID_COMPATIBLE_MIN_PHP_VERSION, phpversion()), 'wpfmsolid') . '</p>';
        echo '</div>';
    }

    add_action('admin_notices', 'WpFileManagerSolid\notice_unsupported_php_version');
}
