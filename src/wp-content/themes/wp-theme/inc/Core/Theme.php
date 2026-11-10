<?php

namespace WpLab\Theme\Core;
use WpLab\Theme\Frontend\Navigation;
use WpLab\Theme\Frontend\Sidebar;
use WpLab\Theme\Frontend\Shortcodes;

class Theme
{
    public function __construct(
        private Assets $assets,
        private Setup $setup,
        private Navigation $navigation, 
        private Sidebar $sidebar, 
        private Shortcodes $shortcodes
    ) {}
    
    public function run(): void
    {
        $this->assets->register();
        $this->setup->register();
        $this->navigation->register();
        $this->sidebar->register();
        $this->shortcodes->register();
    }

}