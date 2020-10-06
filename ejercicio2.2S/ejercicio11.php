<?php

$longitud = rand(5, 15);
$miArray = [];

for ($i = 0; $i < $longitud; $i++) {
    $miArray[] = rand(0, 10);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 11</title>
</head>
<body>
    <b>Datos del array:</b>
    <ul>
        <li>Tamaño del array: <?=$longitud?></li>
        <li>Valores aleatorios entre 0 y 10</li>
    </ul>
    <b>Array generado:</b>
    <?php
        var_dump($miArray);
    ?>
</body>
</html>