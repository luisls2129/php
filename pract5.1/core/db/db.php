<?php

namespace core\db;

class Db{

private function execute($sql, $params) {
    $pdo = Connection::getInstance()::getPDO();
    $ps = $pdo->prepare($sql);
    $ps->execute($params);
    $result = $ps->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
}

private function select($tabla,  $campos = ["*"], $condiciones = NULL, $parametros=NULL){

    $stringCampos = "";

    foreach ($campos as $value) {
        $stringCampos .= $value . ", ";
    }

    $stringCampos = substr($stringCampos,0,-2);
    
    $stringCondiciones = "";

    if ($condiciones != NULL) {
        
        $stringCondiciones = " WHERE " . $condiciones;

    }

    $sql = "SELECT " . $stringCampos . " FROM " . $tabla . $stringCondiciones;

    return $this->execute($sql,$parametros);

}

public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }

}