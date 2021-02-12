<?php
/**
 * Custom Theme Menus.
 *
 * @package Custom Theme
 */

namespace CUSTOM_THEME\Inc;

use CUSTOM_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct(){
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus() {
        register_nav_menus([
            'theme-header-menu' => esc_html__('Header Menu', 'Custom Theme'),
            'theme-footer-menu' => esc_html__('Footer Menu', 'Custom Theme'),
        ]);
    }
}