<?php
/**
 * Theme Functions.
 *
 * @package Custom Theme
 */

if (!defined('CUSTOM_THEME_DIR_PATH')) {
    define('CUSTOM_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('CUSTOM_THEME_DIR_URI')) {
    define('CUSTOM_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once CUSTOM_THEME_DIR_PATH . '/inc/helpers/autoloader.php';


function custom_theme_get_theme_instance() {
    \CUSTOM_THEME\Inc\CUSTOM_THEME::get_instance();
}

custom_theme_get_theme_instance();