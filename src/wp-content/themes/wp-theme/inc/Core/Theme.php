<?php

namespace WpLab\Theme\Core;
use WpLab\Theme\Frontend\Navigation;
use WpLab\Theme\Frontend\Sidebar;

class Theme
{
    public function __construct(
        private Assets $assets,
        private Setup $setup,
        private Navigation $navigation, 
        private Sidebar $sidebar
    ) {}
    
    public function run(): void
    {
        $this->assets->register();
        $this->setup->register();
        $this->navigation->register();
        $this->sidebar->register();
    }

}