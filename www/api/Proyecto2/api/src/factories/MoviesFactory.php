<?php
namespace App\factories;
use App\services\impl\MoviesService;
use App\DAO\impl\MoviesStaticDAO;
use App\DAO\impl\MoviesDBDAO;

class MoviesFactory{


 public static function getService() {
    return new MoviesService();
}

 public static function getDAO(){
    return new MoviesDBDAO();
}


}