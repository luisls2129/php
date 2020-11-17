<?php
namespace core\db;

class DB {

    private function select($table, $fields = ['*'], $where = NULL, $params = NULL) {

        $sql = "SELECT ";
        foreach ($fields as $field) {
            $sql .= "$field, ";
        }
        $sql = substr($sql, 0, -2)." FROM $table";
        if (!empty($where)) {
            $sql .= " WHERE " . $where;
        }

        return $this->execute($sql, $params);
    }

    private function insert($table, $insertValues) {
        $fields = '(';
        $values = '(';
        $params = array();
        foreach ($insertValues as $key => $value) {
            $fields .= $key . ',';
            $param =  ':' . $key;
            $values .= $param . ',';
            $params[$param] = $value;
        }
        $fields = \substr($fields, 0, -1) . ')';
        $values = \substr($values, 0, -1) . ')';
        $sql = "INSERT INTO $table $fields VALUES $values";
        //return $this->execute($sql, $params);

        $pdo = Connection::getInstance()::getPDO();
        $ps = $pdo->prepare($sql);

        if ($ps-> execute($params)) {
            $lastInsertId = $pdo->lastInsertId();
        }else{
             $lastInsertId = 0;
        }   
    
        return  $lastInsertId;

        /*$ps->execute($params);
        $result = $ps->columnCount()>0? $ps->fetchAll(\PDO::FETCH_ASSOC): $ps->rowCount(); 
        return $result;*/ 
    }

    private function edit($table, $editValues, $pkName, $pkValue) {
        $fields = '';
        $params = array();
        foreach ($editValues as $key => $value) {
            if ($key !== '_method') {
                $fields .= "$key = :$key,";
                $param =  ':' . $key;
                $params[$param] = $value;
            }
        }
        $fields = \substr($fields, 0, -1);
        
        $where = "$pkName = :id";
        $params[":id"] = $pkValue;
        $sql = "UPDATE $table SET $fields WHERE $where";
        return $this->execute($sql, $params);
    }


    private function delete($table, $pkName, $pkValue) {
        $where = "$pkName = :id";
        $params = [
            ":id" => $pkValue
        ];
        $sql = "DELETE FROM $table WHERE $where";
        return $this->execute($sql, $params);
    }

    private function execute($sql, $params) {
        $pdo = Connection::getInstance()::getPDO();
        $ps = $pdo->prepare($sql);
        $ps->execute($params);
        $result = $ps->columnCount()>0? $ps->fetchAll(\PDO::FETCH_ASSOC): $ps->rowCount(); 
        return $result; 
    }

    public static function __callStatic($name, $arguments) {
        return (new static)->$name(...$arguments);
    }    

}