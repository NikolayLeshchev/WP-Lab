<?php

namespace WpLab\Theme\Frontend;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Weather {
    public function register(): void {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    public function enqueue_scripts(): void {
        wp_enqueue_script( 'weather', get_template_directory_uri() . '/assets/js/weather.js', [], '1.0.0', true );
        wp_enqueue_style( 'weather', get_template_directory_uri() . '/assets/css/weather.css', [], '1.0.0' );
    }
}