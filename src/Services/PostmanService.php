<?php 

namespace Luisj\PostmanCollectionViewer;

class PostmanService
{
    /**
     * Obtener collecion de postman
     */
    public static function getCollection(string $path) : array
    {
        $collection = json_decode(file_get_contents($path), true);

        return $collection;
    }

    /**
     * Obtener elemento del sidebar para la documentacion
     */
    public static function getSidebarElements(array $collection) : array
    {
        //obtener elemntos del sidebar
        $cont = 0;
        $sidebars_elements = array();

        foreach($collection['item'] as $item){
            $modulo = [
                'text' => $item['name'],
                'icon' => 'fas fa-folder',
                'selectable' => false,
            ];

            $nodes = array();

            foreach($item['item'] as $service){
                array_push($nodes, [
                    'text' => $service['name'],
                    'href' => '#'.$cont += 1,
                    'method' => $service['request']['method'],
                ]);
            }

            $modulo['nodes'] = $nodes;
            array_push($sidebars_elements, $modulo);  
        }

        return $sidebars_elements;
    }
}