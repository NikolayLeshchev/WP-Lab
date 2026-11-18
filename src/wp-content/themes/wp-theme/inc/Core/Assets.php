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

        wp_enqueue_script(
            'main-theme-script',
            get_template_directory_uri() . '/assets/js/main.js',
            [],
            '1.0.0',
            true
        );

        wp_localize_script('main-theme-script', 'wpApiSettings', [
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
        ]);

    }
}