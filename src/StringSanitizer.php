<?php

namespace Prashanta\StringSanitizer;

class StringSanitizer
{
    protected array $excludedTags = ['PidData', 'FingerData'];

    public function clean(string $value): string
    {
        foreach ($this->excludedTags as $tag) {
            if (stripos($value, "<$tag>") !== false && stripos($value, "</$tag>") !== false) {
                // Skip sanitization if excluded XML block is found
                return $value;
            }
        }

        // Sanitize: remove javascript: and all HTML tags
        $value = preg_replace('/javascript\s*:[^;\s]+;?/i', '', $value);
        return strip_tags($value);
    }

    public function setExcludedTags(array $tags): void
    {
        $this->excludedTags = $tags;
    }
}