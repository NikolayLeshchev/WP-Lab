<?php

namespace WpLab\Theme\Core;

class Theme
{
    public function run(): void
    {
        add_action('after_setup_theme', [$this, 'setup']);

        (new Assets())->register();
        (new Setup())->register();
    }

}