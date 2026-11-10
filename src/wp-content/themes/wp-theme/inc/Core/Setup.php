<?php

namespace WpLab\Theme\Core;

class Setup {
    public function register(): void {
        add_action('after_setup_theme', [$this, 'setup']);
    }
    public function setup(): void {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
}