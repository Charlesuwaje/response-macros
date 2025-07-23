<?php

namespace CharlesUwaje\ResponseMacros\Providers;

use Illuminate\Support\ServiceProvider;
use CharlesUwaje\ResponseMacros\Helpers\ResponseMacro;
use Illuminate\Support\Facades\Response;

class ResponseMacrosServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        ResponseMacro::register();
    }


    protected function registerMacros(): void
    {
        ResponseMacro::register();
    }
    // public function boot(): void
    // {
    //     $this->registerMacros();
    // }
}
