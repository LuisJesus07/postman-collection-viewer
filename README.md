# Postman Collection Viewer
Postman Collection Viewer es un paquete PHP que se integra perfectamente con Laravel para renderizar la documentación de una API. Carga una colección JSON exportada desde Postman y la muestra en una vista blade.

# Instalación
Instalacion del paquete con composer:
```bash
composer require luisj/postman-collection-viewer
```
Publicar los archivos css y js de la vista blade:
```bash
php artisan vendor:publish --provider="Luisj\PostmanCollectionViewer\PostmanCollectionViewerServiceProvider" --tag=public
```

# Instrucciones de uso
Primero debes de exportar la collecion de postman dentro de alguna carpeta en tu proyecto, para poder renderizarla de la siguente forma:
```php
use \Luisj\PostmanCollectionViewer\PostmanCollectionViewer;

$path = base_path() . "/resources/postman/postman_collection.json";
return (new PostmanCollectionViewer)->renderCollection($path);
```
