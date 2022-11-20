<?php
namespace App\controllers;
 
use App\services\impl\MoviesService;
use App\services\IMoviesService;
use App\factories\MoviesFactory;
use App\response\HTTPResponse;
use App\DTO\impl\MovieDTO;
use Exception;

class MoviesController {

    public function all(){
        HTTPResponse::json(200,MoviesFactory::getService() -> all());
    }
 
    public function find($id){
        try{
            HTTPResponse::json(200,MoviesFactory::getService() -> find($id));
        }catch(Exception $e){
            HTTPResponse::json(404,$e -> getMessage());
        }
        
    }

    public function insert() {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $movie = MovieDTO::checkFields(null,$data);
            MoviesFactory::getService() -> insert($movie);
            HTTPResponse::json(201, "Recurso creado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }

    public function update($id){
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $movie = MovieDTO::checkFields($id,$data);
            MoviesFactory::getService() -> update($id , $movie);
            HTTPResponse::json(203, "Recurso actualizado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
    public function delete($id){
        try {
            MoviesFactory::getService() -> delete($id);
            HTTPResponse::json(203, "Recurso eliminado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
}