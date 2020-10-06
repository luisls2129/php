<?php


$num2 = 5;

function suma(int $num1){
    global $num2;
    return $num1 + $num2;
}

echo "la suma de 2 y $num2 es: " . suma(2);