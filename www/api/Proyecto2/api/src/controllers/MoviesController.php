<?php
namespace App\controllers;
 
use App\services\impl\MoviesService;
use App\services\IMoviesService;
use App\factories\MoviesFactory;
use App\response\HTTPResponse;
use App\DTO\MovieDTO;
use Exception;

class MoviesController {

    public function all(){
        HTTPResponse::json(200,MoviesFactory::getService() -> all());
    }
 
    public function find($id){
        try{
            HTTPResponse::json(200,MoviesFactory::getService() -> find($id));
            //echo json_encode($this->factories-> getService() -> find($id));
        }catch(Exception $e){
            HTTPResponse::json(404,$e -> getMessage());
        }
        
    }

    public function insert() {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $movie = new MovieDTO($data['id'], $data['titulo'], $data['anyo'], $data['duracion']);
            MoviesFactory::getService() -> insert($movie);
            HTTPResponse::json(201, "Recurso creado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
}