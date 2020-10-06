<?php

$tamañoArray = rand(5,15);

$array = [];

for ($i = 0; $i < $tamañoArray; $i++) { 
    array_push($array,rand(0,10));
}

echo "<h1>Datos del array:</h1><br>
        <li>Tamaño del array: $tamañoArray </li>
        <li>Valores aleatorios entre 0 y 10</li><br>
        <h1>Array generado:</h1><br>";

var_dump($array);