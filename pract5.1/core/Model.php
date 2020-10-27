<?php

namespace core;

use function \JmesPath\search;
use core\db\Db;

class Model
{
    protected $table;

    protected $primaryKey = "id";

    protected function getAll()
    {
        $result = include('./bbdd/' . $this->table);
        return $result;
    }
    protected function getById($id)
    {
        $result = array();
        $rows = include('./bbdd/' . $this->table);
        $expression = "[?id == `" . $id . "`]";
        $result = \JmesPath\search($expression, $rows)[0];
        return $result;
    }

    protected function all(){
        return Db::select($this->table);
    }

    protected function find($pk){

        $campos = ["*"];
        $where = $this->primaryKey . " = :id";
        $params = [
            ":id" => $pk
        ];

        return Db::select($this->table,$campos,$where,$params)[0];
    }

    protected function belongsToMany($t2, $tJ, $pk_tJ1, $pk_tJ2, $pk, $pk_t2){
     
        $sql ="SELECT a.id, a.nombre FROM $t2 a 
            JOIN $tJ pa ON a.$pk_t2 = pa.$pk_tJ1
            JOIN peliculas p ON p.id = pa.$pk_tJ1 AND p.id = $pk";
        $params = [
            ":id" => $pk
        ];

        Db::execute($sql,$params);
        
    }

    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }
}
