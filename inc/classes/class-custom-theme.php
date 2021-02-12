<?php
/**
 * Bootstraps the Theme.
 *
 * @package Custom Theme
 */

namespace CUSTOM_THEME\Inc;

use CUSTOM_THEME\Inc\Traits\Singleton;

class CUSTOM_THEME {
    use Singleton;

    protected function __construct(){
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function register_styles() {
        // Register styles here
        wp_register_style('main', CUSTOM_THEME_DIR_URI . '/assets/css/main.css', [], filemtime( CUSTOM_THEME_DIR_PATH . '/assets/css/main.css' ), 'all');
        wp_register_style('bootstrap', CUSTOM_THEME_DIR_URI . '/assets/src/bootstrap/css/bootstrap.min.css', [], filemtime( CUSTOM_THEME_DIR_PATH . '/assets/src/bootstrap/css/bootstrap.min.css' ), 'all');
        
        // Enqueue Styles
        wp_enqueue_style('main');
        wp_enqueue_style('bootstrap');
    }

    public function register_scripts() {
        // Register JS
        wp_register_script('main', CUSTOM_THEME_DIR_URI . '/assets/js/main.js', ['jquery'], filemtime( CUSTOM_THEME_DIR_PATH . '/assets/js/main.js' ), true);
        wp_register_script('bootstrap', CUSTOM_THEME_DIR_URI . '/assets/src/bootstrap/js/bootstrap.min.js', ['jquery'], filemtime( CUSTOM_THEME_DIR_PATH . '/assets/src/bootstrap/js/bootstrap.min.js' ), 'all');

        // Enqueue JS
        wp_enqueue_script('main');
        wp_enqueue_script('bootstrap');
    }

    public function setup_theme() {
        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
            'header-test' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true
        ]);

        add_theme_support('custom-background', [
            'default-color' => '#fff',
            'default-img' => '',
            'default-repeat' => 'no-repeat'
        ]);

        add_theme_support('post-thumbnails');

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support('wp-block-style');

        add_theme_support('align-wide');
    }


}