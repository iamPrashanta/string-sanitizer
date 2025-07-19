<?php

namespace Prashanta\StringSanitizer;

class StringSanitizer
{
    public function clean(string $value): string
    {
        // Remove dangerous JS URI and all tags
        $value = preg_replace('/javascript\s*:[^;\s]+;?/i', '', $value);
        return strip_tags($value);
    }
}