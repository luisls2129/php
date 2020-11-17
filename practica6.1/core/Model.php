<?php
namespace core;

class Model
{
    protected $table;
    protected $primary_key = 'id';

    protected function all() {
        $result = db\DB::select($this->table);
        return $result;
    } 

    protected function find($pk) {
        $fields = ['*'];
        $where = $this->primary_key . " = :id";
        $params = [
            ":id" => $pk
        ];
        $result = db\DB::select($this->table, $fields, $where, $params);
        $result = count($result) > 0 ? $result[0] : NULL;
        return $result;
    }

    public function belongsToMany($t2, $tJ, $pk_tJ1, $pk_tJ2, $pk, $pk_t2 = 'id') {
        $sql = "SELECT t2.* FROM $t2 t2" .
            " JOIN $tJ tJ ON t2.$pk_t2 = tJ.$pk_tJ2" . 
            " JOIN $this->table t1 ON t1.$this->primary_key = tJ.$pk_tJ1
            AND t1.$this->primary_key = :id";
        $params = [
            ":id" => $pk
        ];
        return db\DB::execute($sql, $params);
    }

    protected function hasMany($t2, $fk_t2, $pk) {
        $sql = "SELECT t2.* FROM $t2 t2
            JOIN $this->table t1 ON t1.$this->primary_key = t2.$fk_t2
            AND t1.$this->primary_key = :id";
        $params = [
            ":id" => $pk
        ];
        return db\DB::execute($sql, $params);
    }

    protected function insert($data) {
        $result = db\DB::insert($this->table, $data);
        return $result;        
    }

    protected function update($pk, $data) {
        $result = db\DB::edit($this->table, $data, $this->primary_key, $pk);
        return $result;        
    }


    protected function delete ($pk) {
        $result = db\DB::delete($this->table, $this->primary_key, $pk);
        return $result;
    }

    public static function __callStatic($name, $arguments) {
        return (new static)->$name(...$arguments);
    }

}
