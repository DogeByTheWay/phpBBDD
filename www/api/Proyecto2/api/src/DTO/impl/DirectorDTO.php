<?php
namespace App\DTO\impl;
use App\DTO\IDTOCheckFields;
use JsonSerializable;
 
class DirectorDTO implements JsonSerializable{
 
    /**
     * @param $id int 
     * @param $nombre string 
     * @param $apellidos string 
     */
    function __construct(private ?int $id, private string $nombre, private string $apellidos) 
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }
 
 
    /**
     * @return int
     */
    public function id(): int {
        return $this->id;
    }
 
    /**
     * @return string
     */
    public function nombre(): string {
        return $this->nombre;
    }
 
    /**
     * @return int
     */
    public function apellidos(): string {
        return $this->apellidos;
    }
 
    /**
     * @return int
     */
    public function duracion(): int {
        return $this->duracion;
    }
    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value of any type other than a resource .
     */
    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos
        ];      
    }

    public static function checkFields(?int $id,array $data):DirectorDTO{
        if(isset($data["nombre"]) && isset($data["apellidos"])){
            $director=new DirectorDTO($id,$data["nombre"],$data["apellidos"]);
            return $director;
        }else{
            throw new \Exception("Los campos son incorrectos o estan vacios",400);
        }   
    }
}