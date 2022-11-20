<?php

$router = new \Bramus\Router\Router();
 
 
$router->setNamespace('\App');
 
/**
 * Definimos nuestras rutas
 */
$router->get('/', function() { echo "Bienvenido a la API de películas"; });
$router->get('/peliculas', 'controllers\MoviesController@all');
$router->post('/peliculas', 'controllers\MoviesController@insert');
$router->get('/peliculas/(\d+)', 'controllers\MoviesController@find');
$router->put('/peliculas/(\d+)','controllers\MoviesController@update');
$router->delete('/peliculas/(\d+)','controllers\MoviesController@delete');
$router->set404('(/.*)?', function() {
    echo "Error 404, no se ha encontrado el recurso o a sido eliminado";
});
 
$router->run();