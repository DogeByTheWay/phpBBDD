<?php
namespace App\services\impl;
 
use App\services\IMoviesService;
use App\DTO\impl\MovieDTO;
use App\DAO\impl\MoviesStaticDAO;
use App\DAO\impl\MoviesJSONDAO;
use App\factories\MoviesFactory;
use Exception;
 
class MoviesService implements IMoviesService {

private MoviesFactory $factories;

function __construct(){
    $this -> factories =new MoviesFactory();
}
    public function all(): array {
        return $this -> factories -> getDAO() -> read();
    }
 
    /**
     *
     * @param mixed $id
     *
     * @return \App\DTO\impl\MovieDTO
    */
    function find($id): MovieDTO {
        //@TODO
        return $this -> factories -> getDAO() -> findbyId($id);
    }
    function insert($movie): bool{
        return $this -> factories -> getDAO() -> create($movie);
    }

    function update($id,$movie):bool{
        return $this -> factories -> getDAO() -> update($id,$movie);
    }
    function delete($id):bool{
        return $this -> factories -> getDAO() -> delete($id);
    }
}