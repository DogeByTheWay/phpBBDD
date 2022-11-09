<?php

namespace App\response;

class HTTPResponse
{
    static function json(int $codigo, $datos): void{
        $result=array();
        switch(gettype($datos)){
            case "array":
                foreach($datos as $movie){
                    $result[]=$movie -> jsonSerialize();
                }
                
            break;
            case "object":
                $result[]=$datos ->jsonSerialize();
            break;
            case "string":
                $result=[
                    "Codigo" => $codigo,
                    "Mensaje" => $datos
                ];
            break;
        }
        echo json_encode($result);
    }
}