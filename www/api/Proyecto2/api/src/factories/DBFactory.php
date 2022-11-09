<?php
namespace App\factories;
use App\db\impl\MysqlPDO;
class DBFactory{

    static function getConnection() {
        return new MysqlPDO();
    }
}