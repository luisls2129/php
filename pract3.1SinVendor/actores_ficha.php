<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Directores | Ficha</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <link rel="stylesheet" href="./css/estilos.css">    
    </head>
    <body>

        <div class="alert alert-secondary d-flex">
            <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
        </div>
        <div class="container">

        <?php
            require __DIR__ . '/vendor/autoload.php';

            $actores = include("bbdd/actores.php");
            $idActor = $_GET['id'];
            $actor;

            $expresion = '[?contains(`["'.$idActor.'"]`, id)].{id: id,nombre: nombre,anyo: anyo, pais: pais}';

            $resultado = JmesPath\search($expresion,$actores);

            $actor = $resultado[0];

        ?>

            <!-- Código PHP -->
            <b>Nombre: </b><?= $actor['nombre'] ?><br />
            <b>Año: </b><?= $actor['anyo'] ?><br />
            <b>País: </b><?= $actor['pais'] ?><br />
            <!-- Fin código PHP -->
        
        </div>
    </body>
</html>