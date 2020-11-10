<?php 

namespace core\db;

class Connection {

static private $instance;
private $pdo;

public function __construct() {
    try{
        $this->pdo = new \PDO("mysql:host=localhost;dbname=cine","root","");// o root

        $this->pdo->exec("set names utf8");
        //$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }catch(\PDOException $e){
        echo "error al entrar a la base de datos";
    }
}


protected function getPdo(){
    return $this->pdo;
}

protected function getInstance() {

    if(self::$instance == null) {
        self::$instance = new Connection();
    }

    return self::$instance;

}

public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }

}