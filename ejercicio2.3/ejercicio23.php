<?php

function multiplicar(...$numero){
    $resultado = 1;
    foreach ($numero as $n) {
        $resultado *=  $n;
    }
    return $resultado;
}

echo multiplicar(2,5,6,8);