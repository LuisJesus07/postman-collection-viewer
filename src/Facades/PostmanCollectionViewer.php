<?php

namespace Luisj\PostmanCollectionViewer\Facades;

use Illuminate\Support\Facades\Facade;

class PostmanCollectionViewer extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return 'postman-collection-viewer';
    }
}
