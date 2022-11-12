<?php
namespace App\DAO\impl;
use App\DAO\IMoviesDAO;
use App\DTO\MovieDTO;
use App\db\orm\DB;
class MoviesDBDAO implements IMoviesDAO {
 
  function create(MovieDTO $movie): bool {
    return DB::table('peliculas')->insert(['titulo' => $movie->titulo(), 'anyo' => $movie->anyo(), 'duracion' => $movie->duracion()]);
 }
  
  function read(): array {
     $result = array();
     $db_data = DB::table('peliculas')->select('*')->get();
     foreach ($db_data as $movie) {
         $result[] = new MovieDTO(
             $movie->id, 
             $movie->titulo, 
             $movie->anyo, 
             $movie->duracion
         );            
     }
 return $result;
 }
  
  function findById(int $id): MovieDTO {
     $params = [
         "id" => $id
     ];
     $db_data = DB::table('peliculas')->find($id);
     $result = new MovieDTO(
             $db_data->id, 
             $db_data->titulo, 
             $db_data->anyo, 
             $db_data->duracion
         );            
 return $result; 
 }
 
  function update(int $id, MovieDTO $movie): bool {
    return DB::table('peliculas')->update($id, ['titulo' => $movie->titulo(), 'anyo' => $movie->anyo(), 'duracion' => $movie->duracion()]);
 }
  
  function delete(int $id): bool {
    return DB::table('peliculas')->delete($id);
 }


}