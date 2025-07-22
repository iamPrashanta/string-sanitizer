<?php

namespace Prashanta\StringSanitizer;

use Illuminate\Support\ServiceProvider;

class StringSanitizerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('string-sanitizer', function () {
            $sanitizer = new StringSanitizer();

            // Optional: Allow dynamic configuration via config file
            if (config()->has('string_sanitizer.excluded_tags')) {
                $sanitizer->setExcludedTags(config('string_sanitizer.excluded_tags'));
            }

            return $sanitizer;
        });
    }

    public function boot()
    {
        //
    }
}
