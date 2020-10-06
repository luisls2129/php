<?php
    $num1 = 10;
    $num2 = 10;

    switch ($num1 <=> $num2) {
        case -1:
            echo "El mayor es $num2";
            break;
        case 0:
            echo "Los números son iguales";
            break;
        case 1:
            echo "El mayor es $num1";
            break;
    }
