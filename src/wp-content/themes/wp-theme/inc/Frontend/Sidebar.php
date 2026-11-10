<?php

namespace WpLab\Theme\Frontend;

class Sidebar {
    public function register(): void {
        add_action('widgets_init', [$this, 'registerSidebar']);
    }

    public function registerSidebar(): void {
        register_sidebar([
            'name'          => __('Main Sidebar', 'wp-theme'),
            'id'            => 'sidebar-1',
            'description'   => __('Add widgets here.', 'wp-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]);
    }
}