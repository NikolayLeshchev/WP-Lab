<?php
/**
 * WP Theme functions and definitions.
 */

require_once __DIR__ . '/vendor/autoload.php';

$theme = new \WpLab\Theme\Core\Theme(
    new \WpLab\Theme\Core\Assets(),
    new \WpLab\Theme\Core\Setup(),
    new \WpLab\Theme\Frontend\Navigation(),
    new \WpLab\Theme\Frontend\Sidebar(),
    new \WpLab\Theme\Frontend\Shortcodes()
);
$theme->run();