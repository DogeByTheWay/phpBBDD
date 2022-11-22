<?php
namespace App\services\impl;
 
use App\services\IDirectorsService;
use App\DTO\impl\DirectorDTO;
use App\factories\DirectorsFactory;
use Exception;
 
class DirectorsService implements IDirectorsService {

private DirectorsFactory $factories;

function __construct(){
    $this -> factories =new DirectorsFactory();
}
    public function all(): array {
        return $this -> factories -> getDAO() -> read();
    }
 
    /**
     *
     * @param mixed $id
     *
     * @return \App\DTO\impl\DirectorDTO
    */
    function find($id): DirectorDTO {
        //@TODO
        return $this -> factories -> getDAO() -> findbyId($id);
    }
    function insert($director): bool{
        return $this -> factories -> getDAO() -> create($director);
    }

    function update($id,$director):bool{
        return $this -> factories -> getDAO() -> update($id,$director);
    }
    function delete($id):bool{
        return $this -> factories -> getDAO() -> delete($id);
    }
    function allJoin($id):array{
        return $this -> factories -> getDAO() -> readJoin($id);
    }
}