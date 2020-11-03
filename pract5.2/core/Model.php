<?php

namespace core;

use function \JmesPath\search;
use core\db\Db;

class Model
{
    protected $table;

    protected $primaryKey = "id";

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
            JOIN $tJ pa ON a.$pk_t2 = pa.$pk_tJ2
            JOIN peliculas p ON p.$pk_t2 = pa.$pk_tJ1 AND p.id = :id_pelicula";
        $params = [
            ":id_pelicula" => $pk
        ];

        return Db::execute($sql,$params);
        
    }

    protected function hasMany($t2,$fk_t2,$pk){

        $sql = "SELECT t2.* FROM $t2 t2
        JOIN $this->table t1 ON t1.$this->primaryKey = t2.$fk_t2
        AND t1.$this->primaryKey = :id";

        
        
        $params = [
            ":id" => $pk
        ];

        return Db::execute($sql, $params);
    }

    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }
}
