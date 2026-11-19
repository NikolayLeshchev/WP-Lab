<?php

namespace WpLab\Theme\Core;
use WpLab\Theme\Frontend\Navigation;
use WpLab\Theme\Frontend\Sidebar;
use WpLab\Theme\Frontend\Shortcodes;
use WpLab\Theme\Frontend\Weather;
use WpLab\Theme\API\PostsEndpoints;
use WpLab\Theme\API\Api;

class Theme
{
    public function __construct(
        private Assets $assets,
        private Setup $setup,
        private Navigation $navigation, 
        private Sidebar $sidebar, 
        private Shortcodes $shortcodes,
        private Weather $weather,
        private PostsEndpoints $postsEndpoints,
        private Api $api
    ) {}
    
    public function run(): void
    {
        $this->assets->register();
        $this->setup->register();
        $this->navigation->register();
        $this->sidebar->register();
        $this->shortcodes->register();
        $this->weather->register();
        $this->postsEndpoints->register();
        $this->api->register();
    }

}