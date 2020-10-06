<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Películas | Ficha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">


        <?php

use function JmesPath\search;

require __DIR__ . '/vendor/autoload.php';

        $idPelicula = $_GET['id'];
        $peliculas = include('bbdd/peliculas.php');

        $expresionPeli = '[?contains(`["'.$idPelicula.'"]`, id)].{id: id,titulo: titulo,anyo: anyo, duracion: duracion}';

        $resultadoPeli = JmesPath\search($expresionPeli,$peliculas);

        $resultadoPeli = $resultadoPeli[0];


        function sacarDiretores($idPeli){
            $arrayPeliDirector = [];
            $pelicula_director = include('bbdd/pelicula_director.php');
            $directores = include('bbdd/directores.php');

            $expresionPeliDire = '[?contains(`["'.$idPeli.'"]`, id_pelicula)].{id_director:id_director}';
            
            $resultado = JmesPath\search($expresionPeliDire,$pelicula_director);

            $expresionDire = '[?contains(`[';
            
            foreach ($resultado as $value) {
                $idValue = $value["id_director"];
                $expresionDire .= '"'.$idValue.'"'.",";
            }

            $expresionDire = substr($expresionDire,0,-1);
            $expresionDire .= ']`, id)].{id: id, nombre: nombre}';

            $resultadoDire = JmesPath\search($expresionDire,$directores);
            
            foreach ($resultadoDire as $value) {
                array_push($arrayPeliDirector,$value);
            }

            return $arrayPeliDirector;

            
        }

        $directoresPeli = sacarDiretores($idPelicula);

        function sacarActores($idPeli){
            $arrayPeliActor = [];
            $pelicula_actor = include('bbdd/pelicula_actor.php');
            $actores = include('bbdd/actores.php');

            $expresionPeliAct = '[?contains(`["'.$idPeli.'"]`, id_pelicula)].{id_actor:id_actor}';

            $resultadoPeliAct = JmesPath\search($expresionPeliAct,$pelicula_actor);

            $expresionAct = '[?contains(`[';
            
            foreach ($resultadoPeliAct as $value) {
                $idValue = $value["id_actor"];
                $expresionAct .= '"'.$idValue.'"'.",";
            }
            $expresionAct = substr($expresionAct,0,-1);
            $expresionAct .= ']`, id)].{id: id, nombre: nombre}';
            $resultadoAct = JmesPath\search($expresionAct,$actores);
            
            foreach ($resultadoAct as $value) {
                array_push($arrayPeliActor, $value);
            }

            return $arrayPeliActor;
        }

        $actoresPeli = sacarActores($idPelicula);
        ?>

        <!-- Código PHP -->
        <b>Título: </b> <?= $resultadoPeli['titulo']; ?> <br />
        <b>Año: </b><?= $resultadoPeli['anyo']; ?><br />
        <b>Duración: </b><?= $resultadoPeli['duracion']; ?><br />
        <?php
        foreach ($directoresPeli as $value) {
        ?>
            <b>Director: </b>
            <a href='./directores_ficha.php?id=<?= $value['id'] ?>'>
                <li><?= $value['nombre'] ?></li>
            </a>
        <?php
        
        }
        ?>
        <b>Actores: </b>
        <?php
        foreach ($actoresPeli as $value) {
        ?>
            
            <a href='./actores_ficha.php?id=<?= $value['id'] ?>'>
                <li><?=$value['nombre']?></li>
            </a>
        <?php
        }
        ?>
        <!-- Fin código PHP -->

    </div>
</body>

</html>