<?php

namespace Luisj\PostmanCollectionViewer;

use Luisj\PostmanCollectionViewer\Services\PostmanService;

class PostmanCollectionViewer
{
    /**
     * Renderizar vista a partir de una coleccion de postman
     */
    public function renderCollection(string $path)
    {
        $collection = PostmanService::getCollection($path);
        $sidebarElements = PostmanService::getSidebarElements($collection);

        return view('postman-collection-viewer::api-documentation', compact('collection','sidebarElements'));
    }
}