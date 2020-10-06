<?php

$a = 5;

function suma($b) {
    global $a;
    return $a + $b;
}

echo "El resultado es " . suma(3);