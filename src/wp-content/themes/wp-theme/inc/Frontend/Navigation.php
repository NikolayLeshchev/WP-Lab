<?php

namespace WpLab\Theme\Frontend;

class Navigation {
    public function register(): void {
        add_action('after_setup_theme', [$this, 'register_navigation']);
    }

    public function register_navigation(): void {
        register_nav_menus([
            'primary' => __('Main Menu', 'wp-theme'),
        ]);
    }
}