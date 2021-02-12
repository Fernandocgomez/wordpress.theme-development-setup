<?php
/**
 * Custom Theme Assets.
 *
 * @package Custom Theme
 */

namespace CUSTOM_THEME\Inc;

use CUSTOM_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct(){
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
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
}