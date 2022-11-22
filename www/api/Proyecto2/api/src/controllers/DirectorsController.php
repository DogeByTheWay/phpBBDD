<?php
namespace App\controllers;
 
use App\services\impl\DirectorsService;
use App\services\IDirectorsService;
use App\factories\DirectorsFactory;
use App\response\HTTPResponse;
use App\DTO\impl\DirectorDTO;
use Exception;

class DirectorsController {

    public function all(){
        HTTPResponse::json(200,DirectorsFactory::getService() -> all());
    }
 
    public function find($id){
        try{
            HTTPResponse::json(200,DirectorsFactory::getService() -> find($id));
        }catch(Exception $e){
            HTTPResponse::json(404,$e -> getMessage());
        }
        
    }

    public function insert() {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $director = DirectorDTO::checkFields(null,$data);
            DirectorsFactory::getService() -> insert($director);
            HTTPResponse::json(201, "Recurso creado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }

    public function update($id){
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $movie = DirectorDTO::checkFields($id,$data);
            DirectorsFactory::getService() -> update($id , $movie);
            HTTPResponse::json(203, "Recurso actualizado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
    public function delete($id){
        try {
            DirectorsFactory::getService() -> delete($id);
            HTTPResponse::json(203, "Recurso eliminado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }

    public function join($id){
        try {
            HTTPResponse::json(200,DirectorsFactory::getService() -> allJoin($id));
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
}