<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="equipos">
        <option> A </option>
    </select>
    <?php

    try{
    $pdo = new PDO("mysql:host=localhost;dbname=nba","root","");// o root
    
    $pdo->exec("set names utf8");
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $e){
        $conectado = false;
        echo "error al entrar a la base de datos";
    }

    $selectEquipos = "SELECT Nombre from equipos";
    $return = $pdo->query($selectEquipos);
    $contador = 0;
    foreach ($return as $value) {
        //echo "<option value='"+$contador+"'>"+$value[0]+"</option>";
        echo $value[0];
    }

    ?>
    
</body>
</html>