<?php

$numero = 7;
$tabla = [];

for ($i = 1; $i < 10; $i++) {
    $tabla[] = $i * $numero;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 12</title>
</head>
<body>
    <table border=1>
        <th colspan="10">Tabla de multiplicar del 7</th>
        <tr>
            <?php
                for($i = 1; $i < 10; $i++) {
                    echo "<td>x$i</td>";
                }
            ?>
        </tr>
        <tr>
            <?php
                foreach($tabla as $value) {
                    echo "<td>$value</td>";
                }
            ?>
        </tr>
    </table>
</body>
</html>