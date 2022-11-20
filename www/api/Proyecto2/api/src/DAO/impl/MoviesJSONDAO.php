<?php
namespace App\DAO\impl;
 
use App\DTO\impl\MovieDTO;
use App\DAO\IMoviesDAO;
use Exception;

class MoviesJSONDAO implements IMoviesDAO {

    public $items;
    function __construct(){
        $data = @file_get_contents(BASE_DIR .'/src/data/peliculas.json');
        $this -> items = json_decode($data, true);
    }
    /**
     *
     * @param MovieDTO $movie
     *
     * @return bool
     */
    function create(MovieDTO $movie): bool {
        return false;
    }
     
    /**
     *
     * @return array
     */
    function read(): array {
        return $this -> items;
    }
     
    /**
     *
     * @param int $id
     *
     * @return MovieDTO
     */
    function findById(int $id): MovieDTO {
        //@TODO
        $resultado=null;
        $data = @file_get_contents(BASE_DIR .'/src/data/peliculas.json');
        $movies = json_decode($data, true);
        foreach ($movies as $movie) {
            if($movie['id']==$id){
                $resultado=new MovieDTO($movie['id'],$movie['titulo'],$movie['anyo'],$movie['duracion']);
            }
        }
        $resultado==null ? throw new Exception("El recurso no se ha encontrado") : "";
        return $resultado;
    }
     
    /**
     *
     * @param int $id
     * @param MovieDTO $movie
     *
     * @return bool
     */
    function update(int $id, MovieDTO $movie): bool {
        return false;
    }
     
    /**
     *
     * @param int $id
     *
     * @return bool
     */
    function delete(int $id): bool {
        return false;
    }
}