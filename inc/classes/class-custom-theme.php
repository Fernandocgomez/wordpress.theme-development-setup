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
        Menus::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
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