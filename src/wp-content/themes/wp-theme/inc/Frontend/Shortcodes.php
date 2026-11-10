<?php

namespace WpLab\Theme\Frontend;

class Shortcodes {
    public function register(): void {
        add_action('init', [$this, 'registerShortcodes']);
    }

    public function registerShortcodes(): void {
        add_shortcode('current_year', [$this, 'currentYear']);
    }

    public function currentYear(): string {
        return date('Y');
    }
}