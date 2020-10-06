<?php

$miArray = [3, 4, 6];

function insertar(&$miArrsay, $elemento) {
    $miArrsay[] = $elemento;
}

insertar($miArray, 9);
var_dump($miArray);



