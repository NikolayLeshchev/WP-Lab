<?php
/**
 * WP Theme functions and definitions.
 */

require_once __DIR__ . '/vendor/autoload.php';

$theme = new \WpLab\Theme\Core\Theme(
    new \WpLab\Theme\Core\Assets(),
    new \WpLab\Theme\Core\Setup()
);
$theme->run();