<?php

namespace core\db;

class Db
{

    private function execute($sql, $params)
    {
        $pdo = Connection::getInstance()::getPDO();
        $ps = $pdo->prepare($sql);
        $ps->execute($params);

        $result = $ps->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    private function select($tabla,  $campos = ["*"], $condiciones = NULL, $parametros = NULL)
    {

        $stringCampos = "";

        foreach ($campos as $value) {
            $stringCampos .= $value . ", ";
        }

        $stringCampos = substr($stringCampos, 0, -2);

        $stringCondiciones = "";

        if ($condiciones != NULL) {

            $stringCondiciones = " WHERE " . $condiciones;
        }

        $sql = "SELECT " . $stringCampos . " FROM " . $tabla . $stringCondiciones;

        return $this->execute($sql, $parametros);
    }

    protected function insert($table, $insertValues)
    {
        $fields = '(';
        $values = '(';
        $params = array();
        foreach ($insertValues as $key => $value) {
            $fields .= $key . ',';
            $param = ':' . $key;
            $values .= $param . ',';
            $params[$param] = $value;
        }
        $fields = \substr($fields, 0, -1) . ')';
        $values = \substr($values, 0, -1) . ')';
        $sql = "INSERT INTO $table $fields VALUES $values";
        return DB::execute($sql, $params);
    }

    protected function edit($table, $editValues, $pkName, $pkValue)
    {
        $fields = '';
        $params = array();
        foreach ($editValues as $key => $value) {
            if ($key !== '_method') {
                $fields .= "$key = :$key,";
                $param = ':' . $key;
                $params[$param] = $value;
            }
        }
        $fields = \substr($fields, 0, -1);
        $where = "$pkName = :id";
        $params[":id"] = $pkValue;
        $sql = "UPDATE $table SET $fields WHERE $where";
        return $this->execute($sql, $params);
    }

    protected function delete($table, $pk){

        $where = "$pk = :id";
        $params[":id"] = $pk;
        $sql = "DELETE * FROM $table WHERE $where";
        return $this->execute($sql,$params);

    }

    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }
}
