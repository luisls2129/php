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
        $idPelicula = $_GET;
        $idPelicula = $idPelicula['id'];
        $peliculas = include('bbdd/peliculas.php');
        $pelicula = [];
        foreach ($peliculas as $key => $value) {
            if ($value['id'] == $idPelicula) {
                $pelicula = $value;
            }
        }




        function sacarDiretores($idPeli)
        {
            $arrayPeliDirector = [];
            $pelicula_director = include('bbdd/pelicula_director.php');
            $directores = include('bbdd/directores.php');

            foreach ($pelicula_director as $key => $value) {
                if ($value['id_pelicula'] == $idPeli) {
                    foreach ($directores as $key => $director) {
                        if ($director['id'] == $value['id_director']) {
                            array_push($arrayPeliDirector, $director);
                        }
                    }
                }
            }

            return $arrayPeliDirector;
        }

        $directoresPeli = sacarDiretores($idPelicula);

        function sacarActores($idPeli)
        {
            $arrayPeliActor = [];
            $pelicula_actor = include('bbdd/pelicula_actor.php');
            $actores = include('bbdd/actores.php');

            foreach ($pelicula_actor as $key => $value) {
                if ($value['id_pelicula'] == $idPeli) {
                    foreach ($actores as $key => $actor) {
                        if ($actor['id'] == $value['id_actor']) {
                            array_push($arrayPeliActor, $actor);
                        }
                    }
                }
            }

            return $arrayPeliActor;
        }

        $actoresPeli = sacarActores($idPelicula);
        ?>

        <!-- Código PHP -->
        <b>Título: </b> <?= $pelicula['titulo']; ?> <br />
        <b>Año: </b><?= $pelicula['anyo']; ?><br />
        <b>Duración: </b><?= $pelicula['duracion']; ?><br />
        <?php
        foreach ($directoresPeli as $key => $value) {

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
        foreach ($actoresPeli as $key => $value) {
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