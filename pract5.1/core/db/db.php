
private function execute($sql, $params) {
    $pdo = Connection::getInstance()::getPDO();
    $ps = $pdo->prepare($sql);
    $ps->execute($params);
    return $ps->fetchAll(\PDO::FETCH_ASSOC);
}

private function select($tabla, Array ..$campos = "*", String ..$condiciones = "NULL", Array ..$parametros="NULL"){

    //! terminar aqui 

}

public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }