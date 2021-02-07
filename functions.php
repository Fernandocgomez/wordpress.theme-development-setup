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
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/src/bootstrap/css/bootstrap.min.css', [], filemtime( get_template_directory() . '/assets/src/bootstrap/css/bootstrap.min.css' ), 'all');

    // Register JS
    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], filemtime( get_template_directory() . '/assets/js/main.js' ), true);
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/src/bootstrap/js/bootstrap.min.js', ['jquery'], filemtime( get_template_directory() . '/assets/src/bootstrap/js/bootstrap.min.js' ), 'all');

    // Enqueue Styles
    wp_enqueue_style('main');
    wp_enqueue_style('bootstrap');

    // Enqueue JS
    wp_enqueue_script('main');
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');