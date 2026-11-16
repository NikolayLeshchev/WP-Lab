<?php

namespace WPLab\Theme\Core;

class PostExcerptGenerator {
    public function generate(string $content, int $length = 100): string {
        if (strlen($content) <= $length) {
            return $content;
        }

        $excerpt = substr($content, 0, $length);
        $lastSpace = strrpos($excerpt, ' ');

        if ($lastSpace !== false) {
            $excerpt = substr($excerpt, 0, $lastSpace);
        }

        return $excerpt . '...';
    }
    public function hasExcerpt(string $content, int $length = 100): bool {
        return strlen($content) > $length;
    }
}