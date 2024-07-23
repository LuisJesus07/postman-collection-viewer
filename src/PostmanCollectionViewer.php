<?php

namespace Luisj\PostmanCollectionViewer;

use Luisj\PostmanCollectionViewer\Services\PostmanService;

class PostmanCollectionViewer
{
    private $collection;
    private $enviroment;

    /**
     * Cargar collecion de postman
     */
    public function loadCollection(string $path) : PostmanCollectionViewer
    {
        $this->collection = PostmanService::getArrayFromJsonFile($path);

        return $this;
    }

    /**
     * Cargar json de enviroment
     */
    public function loadEnviroment(string $path) : PostmanCollectionViewer
    {
        $this->enviroment = PostmanService::getArrayFromJsonFile($path);

        return $this;
    }

    /**
     * Renderizar vista a partir de una coleccion de postman
     */
    public function renderView()
    {
        $sidebarElements = PostmanService::getSidebarElements($this->collection);

        return view('postman-collection-viewer::api-documentation', [
            'collection' => $this->collection,
            'enviroment' => $this->enviroment,
            'sidebarElements' => $sidebarElements,
        ]);
    }
}