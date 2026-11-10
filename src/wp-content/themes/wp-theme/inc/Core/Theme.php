<?php

namespace WpLab\Theme\Core;
use WpLab\Theme\Frontend\Navigation;

class Theme
{
    public function __construct(
        private Assets $assets,
        private Setup $setup,
        private Navigation $navigation
    ) {}
    
    public function run(): void
    {
        $this->assets->register();
        $this->setup->register();
        $this->navigation->register();
    }

}