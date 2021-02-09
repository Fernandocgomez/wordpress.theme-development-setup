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
        $this->set_hooks();
    }

    protected function set_hooks() {
        // actions and filters
    }
}