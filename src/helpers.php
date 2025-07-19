<?php

use Prashanta\StringSanitizer\StringSanitizer;

if (!function_exists('sanitize_string')) {
    function sanitize_string(string $value): string
    {
        return app('string-sanitizer')->clean($value);
    }
}
