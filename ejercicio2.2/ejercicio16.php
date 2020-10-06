<?php

$array1 = [34, 56, 78, 8, 98, 33, 45];
$array2 = [56, 76, 2, 68, 77, 25, 15];

$arrayCombinado = array_merge($array1, $array2);
rsort($arrayCombinado);// descendente
var_dump($arrayCombinado);