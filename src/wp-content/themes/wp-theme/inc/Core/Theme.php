<?php

namespace WpLab\Theme\Core;

class Theme
{
    public function run(): void
    {
        add_action('after_setup_theme', [$this, 'setup']);

        (new Assets())->register();
    }

    public function setup(): void
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
}