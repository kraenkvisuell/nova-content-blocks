<?php

namespace Kraenkvisuell\NovaContentBlocks;

use Illuminate\Support\ServiceProvider;

class NovaContentBlocksServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-content-blocks');
    }

    public function register()
    {
        $this->app->bind('content-block', function () {
            return new ContentBlock();
        });
    }
}
