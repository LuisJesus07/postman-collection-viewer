<?php

namespace Luisj\PostmanCollectionViewer\Facades;

use Illuminate\Support\Facades\Facade;

class PostmanCollectionViewerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'postman-collection-viewer';
    }
}
