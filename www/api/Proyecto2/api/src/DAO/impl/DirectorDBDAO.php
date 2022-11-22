<?php
namespace App\DAO\impl;
use App\DAO\IDirectorsDAO;
use App\DTO\impl\DirectorDTO;
use App\DTO\impl\MovieDTO;
use App\db\orm\DB;
class DirectorDBDAO implements IDirectorsDAO {
 
  function create(DirectorDTO $director): bool {
    return DB::table('directores')->insert(['nombre' => $director->nombre(), 'apellidos' => $director->apellidos()]);
 }
  
  function read(): array {
     $result = array();
     $db_data = DB::table('directores')->select('*')->get();
     foreach ($db_data as $director) {
         $result[] = new DirectorDTO(
             $director->id, 
             $director->nombre, 
             $director->apellidos
         );            
     }
    return $result;
 }
  
  function findById(int $id): DirectorDTO {
     $params = [
         "id" => $id
     ];
     $db_data = DB::table('directores')->find($id);
     $result = new DirectorDTO(
             $db_data->id, 
             $db_data->nombre, 
             $db_data->apellidos
         );            
    return $result; 
 }
 
  function update(int $id, DirectorDTO $director): bool {
    return DB::table('directores')->update($id, ['nombre' => $director->nombre(), 'apellidos' => $director->apellidos()]);
 }
  
  function delete(int $id): bool {
    return DB::table('directores')->delete($id);
 }
 function readJoin(int $id):array{
   $result=array();
    $db_data = DB::table('peliculas')->select('peliculas.*')->getMany($id,"peliculas","directores");
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
}