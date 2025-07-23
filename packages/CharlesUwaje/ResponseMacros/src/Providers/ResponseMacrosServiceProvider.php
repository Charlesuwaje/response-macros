<?php

namespace CharlesUwaje\ResponseMacros\Providers;


use Illuminate\Support\ServiceProvider;
use CharlesUwaje\ResponseMacros\Helpers\ResponseMacro;

class ResponseMacrosServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        ResponseMacro::register();
    }

    public function register(): void
    {
        //
    }
}
