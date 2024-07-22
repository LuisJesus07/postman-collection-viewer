<?php

namespace Luisj\PostmanCollectionViewer;

use Luisj\PostmanCollectionViewer\PostmanCollectionViewer;
use Illuminate\Support\ServiceProvider;

class PostmanCollectionViewerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registra el binding en el contenedor de servicio
        $this->app->singleton('postman-collection-viewer', function ($app) {
            return new PostmanCollectionViewer();
        });
    }

    public function boot()
    {
        //cargar la vista blade
        $this->loadViewsFrom(__DIR__.'/resources/views', 'postman-collection-viewer');

        //definir directorio en el cual publicar la vista
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/api-documentation'),
        ], 'views');

        //publicar assets (JS y CSS)
        $this->publishes([
            __DIR__.'/public' => public_path('/postman-collection-viewer-assets'),
        ], 'public');
    }
}
