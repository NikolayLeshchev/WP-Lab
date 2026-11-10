<?php

namespace WpLab\Theme\Core;

class Theme
{
    public function run(): void
    {
        (new Assets())->register();
        (new Setup())->register();
    }

}