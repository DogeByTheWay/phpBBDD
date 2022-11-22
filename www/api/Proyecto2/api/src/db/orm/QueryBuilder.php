<?php

namespace App\db\orm;

class QueryBuilder {
 
    private string $fields = '*';

    private string $where = "";

    private string $join="";

    private ?array $params = null;

    private string $sql;
  
    function __construct(private string $table) {
        $this->table = $table;
    }

    public function select(?string $fields = null) {
        $this->fields = (is_null($fields))? '*': $fields;
        return $this;
    }

    public function where(string $field, string $condition, ?string $value) {
        if (is_null($value)) {
            $value = $condition;
            $condition = '=';
        }
        $this->where = "WHERE $field $condition :$field";
        $this->params[":$field"] = $value;
        return $this;
    }

    public function join(string $table1,string $campo1, string $table2 ,string $campo2){
        $this->join ="JOIN $table2 ON $table1.$campo1=$table2.$campo2";
    }

    public function get():array {
        $this->sql = "SELECT $this->fields FROM $this->table $this->where";
        return DB::select($this->sql, $this->params);
    }
         
    public function getOne():\stdClass {
        $this->sql = "SELECT $this->fields FROM $this->table $this->where LIMIT 1";
        return DB::selectOne($this->sql, $this->params);
    }

    public function find(int $id) {
        $this->where('id', '=', $id);
        return $this->getOne();
    }
    private function toSql() {
        dd($this->sql);
    }
    
    public function insert(array $data):int {
        $fieldsParams = "";
        foreach ($data as $key => $value) {
            $fieldsParams .= ":$key,";
            $this->params[":$key"] = $value;
        }
        $fieldsParams = rtrim($fieldsParams, ',');
        $fieldsName = implode(",", array_keys($data));
        $this->sql = "INSERT INTO $this->table($fieldsName) VALUES ($fieldsParams)";
        return DB::insert($this->sql, $this->params);
    }

    public function update(int $id,array $data):int{
        $this->where('id', '=', $id);
        $fieldsParams = "";
        foreach ($data as $key => $value) {
            $fieldsParams .= "$key=:$key,";
            $this->params[":$key"] =  $value;
        }
        $fieldsParams = rtrim($fieldsParams, ',');
        $this->sql= "UPDATE $this->table SET $fieldsParams $this->where";
        return DB::update($this->sql,$this->params);
    }

    public function delete(int $id):int{
        $this->where('id', '=', $id);
        $this->sql="DELETE FROM $this->table $this->where";
        return DB::delete($this->sql,$this->params);
    }

    public function getMany(int $id,string $table1,string $table2){
        $this->join($table1,"id_director",$table2,"id");
        $this->where('id_director', '=', $id);
        $this->sql = "SELECT $this->fields FROM $table1 $this->join $this->where";
        return DB::select($this->sql, $this->params);
    }
}