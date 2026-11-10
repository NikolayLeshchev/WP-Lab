<?php

namespace WpLab\Theme\Core;

class Theme
{
    public function __construct(
        private Assets $assets,
        private Setup $setup
    ) {}
    
    public function run(): void
    {
        $this->assets->register();
        $this->setup->register();
    }

}