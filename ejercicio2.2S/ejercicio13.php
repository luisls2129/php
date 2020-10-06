<?php
    $tablas = [];
    for($i=1; $i<10; $i++) {
        for($j=1; $j<10; $j++) {
            $tablas[$i][$j] = $i*$j;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 13</title>
</head>
<body>
    <table border=1 cellpadding=3>
        <th colspan="10">Tablas de multiplicar</th>
        <tr><td></td>
        <?php
            for($i=1; $i < 10; $i++) {
                echo "<td><b>$i</b></td>";
            }
            echo "</tr>";
            foreach ($tablas as $key => $value) {
                $numero = $key++;
                echo "<tr><td><b>$numero</b></td>";
                $tabla = $value;
                foreach ($tabla as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>