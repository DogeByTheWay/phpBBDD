<?php

namespace App\db\impl;
use App\db\IPDOConnection;
use PDO;

class MysqlPDO implements IPDOConnection{

    public static function connect():PDO{
        try {
            $pdo = new PDO($_ENV['DB_HOST_DB'],$_ENV['DB_USER'],$_ENV['DB_PASSWD']);
            $pdo->exec("set names utf8");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            echo  $e ->getMessage();
        }
        
    }
}
