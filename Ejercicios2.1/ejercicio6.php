<?php
    $nomina = 1201;

    if ($nomina < 800) {
        $nomina = $nomina * 1.20;
    }elseif ($nomina > 1200) {
        $nomina = $nomina * 0.85;
    }

    echo "$nomina";
