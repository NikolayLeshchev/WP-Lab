<?php

namespace WpLab\Theme\Core;

class Assets
{
    public function register(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue(): void
    {
        wp_enqueue_style(
            'wp-theme-style',
            get_stylesheet_uri(),
            [],
            '1.0.0'
        );

    }
}