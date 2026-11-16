<?php

use PHPUnit\Framework\TestCase;

class PostExcerptGeneratorTest extends TestCase {
    public function testGenerateReturnsExcerptOfSpecifiedLength(): void
    {
        $generator = new WpLab\Theme\Core\PostExcerptGenerator();
        $content = "This is a long text that should be cut";
        $length = 20;
        $expectedExcerpt = "This is a long text...";
        $this->assertEquals($expectedExcerpt, $generator->generate($content, $length));
    }

    public function testGenerateReturnsFullContentIfShorterThanLength(): void
    {
        $generator = new WpLab\Theme\Core\PostExcerptGenerator();
        $content = "Short content.";
        $length = 50;
        $this->assertEquals($content, $generator->generate($content, $length));
    }

    public function testHasExcerptReturnsTrue(): void
    {
        $generator = new WpLab\Theme\Core\PostExcerptGenerator();
        $content = "This is a long text that should be cut";
        $length = 20;
        $this->assertTrue($generator->hasExcerpt($content, $length));
    }

    public function testHasExcerptReturnsFalse(): void
    {
        $generator = new WpLab\Theme\Core\PostExcerptGenerator();
        $content = "Short content.";
        $length = 50;
        $this->assertFalse($generator->hasExcerpt($content, $length));
    }
}