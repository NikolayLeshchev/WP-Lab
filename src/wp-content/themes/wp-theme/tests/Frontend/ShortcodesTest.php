<?php

use PHPUnit\Framework\TestCase;

class ShortcodesTest extends TestCase {
    public function testCurrentYearReturnsCurrentYear(): void
    {
        $shortcodes = new \WpLab\Theme\Frontend\Shortcodes();
        $this->assertEquals(date('Y'), $shortcodes->currentYear());
    }
}