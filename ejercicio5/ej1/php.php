<?php

$conectado = true;

try{
$pdo = new PDO("mysql:host=localhost;dbname=nba","root","");// o root

$pdo->exec("set names utf8");
$pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    $conectado = false;
    echo "error al entrar a la base de datos";
}

if ($conectado) {
    echo "Conexion exitosa";
}