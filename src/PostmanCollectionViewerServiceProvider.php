<?php

namespace Luisj\PostmanCollectionViewer;

use Illuminate\Support\ServiceProvider;

class PostmanCollectionViewerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // 
    }

    public function boot()
    {
        //cargar la vista blade
        $this->loadViewsFrom(__DIR__.'/resources/views', 'postman-collection-viewer');

        //definir directorio en el cual publicar la vista
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/api-documentation'),
        ], 'views');
    }
}
