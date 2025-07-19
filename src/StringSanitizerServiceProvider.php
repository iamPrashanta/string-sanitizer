<?php

namespace Prashanta\StringSanitizer;

use Illuminate\Support\ServiceProvider;

class StringSanitizerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('string-sanitizer', function () {
            return new StringSanitizer();
        });
    }

    public function boot()
    {
        //
    }
}
