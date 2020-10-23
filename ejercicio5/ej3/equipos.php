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

$select = "SELECT * FROM equipos";

$return = $pdo->query($select);

foreach ($return as $value) {
    echo "Nombre: " . "<a href='./jugadores.php?nombre=" . $value["Nombre"] . "'> ". $value["Nombre"] ."</a><br>";
    echo "Ciudad: " . $value["Ciudad"] ."<br>"; 
    echo "Conferencia: " . $value["Conferencia"] ."<br>";
    echo "Division: " . $value["Division"] ."<br><br><br>";
}
