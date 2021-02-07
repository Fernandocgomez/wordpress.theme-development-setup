<?php
/**
 * Theme Functions.
 *
 * @package Custom Theme
 */

/**
 * Enqueue scripts(stylesheet and JS) on the head
 *
 * @return void
 */
function theme_enqueue_scripts() {
    // Register styles here
    wp_register_style('main', get_template_directory_uri() . '/assets/css/main.css', [], filemtime( get_template_directory() . '/assets/css/main.css' ), 'all');

    // Register JS
    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], filemtime( get_template_directory() . '/assets/js/main.js' ), true);

    // Enqueue Styles
    wp_enqueue_style('main');

    // Enqueue JS
    wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');