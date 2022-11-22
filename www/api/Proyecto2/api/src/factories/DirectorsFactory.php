<?php
namespace App\factories;
use App\services\impl\DirectorsService;
use App\DAO\impl\DirectorDBDAO;

class DirectorsFactory{


 public static function getService() {
    return new DirectorsService();
}

 public static function getDAO(){
    return new DirectorDBDAO();
}


}