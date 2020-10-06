<?php

$miArray = [3, 4, 6];

function añadirAlArray(&$array,$elemento){
    array_push($array,$elemento);
}

añadirAlArray($miArray,52);

var_dump($miArray);