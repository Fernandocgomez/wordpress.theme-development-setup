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
    }
}