<?php
    $nomina = 950;
    if ($nomina<800) {
        $nomina += $nomina*0.2;
    } elseif ($nomina>1200) {
            $nomina -= $nomina*0.15;
    }
    echo "La nómina es $nomina";