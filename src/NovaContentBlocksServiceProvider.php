<?php

namespace Kraenkvisuell\NovaContentBlocks;

use Illuminate\Support\ServiceProvider;

class NovaContentBlocksServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-content-blocks');

        $this->publishes([
            __DIR__ . '/../config/nova-content-blocks.php' => config_path('nova-content-blocks.php'),
        ], 'nova-content-blocks');
    }

    public function register()
    {
        $this->app->bind('content-block', function () {
            return new ContentBlock();
        });

        $this->app->bind('content-block-layout', function () {
            return new ContentBlockLayout();
        });
    }
}
