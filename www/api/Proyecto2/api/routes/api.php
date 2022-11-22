<?php

$router = new \Bramus\Router\Router();
 
 
$router->setNamespace('\App');
 
/**
 * Definimos nuestras rutas
 */
$router->get('/', function() { echo "Bienvenido a la API de películas"; });
$router->get('/peliculas', 'controllers\MoviesController@all');
$router->get('/directores', 'controllers\DirectorsController@all');
$router->get('/directores/(\d+)', 'controllers\DirectorsController@find');
$router->post('/peliculas', 'controllers\MoviesController@insert');
$router->post('/directores', 'controllers\DirectorsController@insert');
$router->get('/peliculas/(\d+)', 'controllers\MoviesController@find');
$router->get('/director_peliculas/(\d+)', 'controllers\DirectorsController@join');
$router->put('/peliculas/(\d+)','controllers\MoviesController@update');
$router->put('/directores/(\d+)','controllers\DirectorsController@update');
$router->delete('/peliculas/(\d+)','controllers\MoviesController@delete');
$router->delete('/directores/(\d+)','controllers\DirectorsController@delete');
$router->set404('(/.*)?', function() {
    echo "Error 404, no se ha encontrado el recurso o a sido eliminado";
});
 
$router->run();