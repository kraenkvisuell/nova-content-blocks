<?php

namespace Kraenkvisuell\NovaContentBlocks\Facades;

use Illuminate\Support\Facades\Facade;

class ContentBlockLayout extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'content-block-layout';
    }
}
