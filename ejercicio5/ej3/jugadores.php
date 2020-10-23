<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <button > <- </button>
    <br>

    <?php

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=nba", "root", ""); // o root

        $pdo->exec("set names utf8");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $conectado = false;
        echo "error al entrar a la base de datos";
    }

    $equipo = $_GET["nombre"];

    $select = "SELECT * FROM jugadores WHERE Nombre_equipo = '$equipo'";

    $return = $pdo->query($select);

    foreach ($return as $value) {
        echo "Nombre: " . $value["Nombre"] . "<br>";
        echo "Procedencia: " . $value["Procedencia"] . "<br>";
        echo "Altura: " . $value["Altura"] . "<br>";
        echo "Peso: " . $value["Peso"] . "<br>";
        echo "Posicion: " . $value["Posicion"] . "<br><br><br>";
    }
    ?>
</body>

</html>