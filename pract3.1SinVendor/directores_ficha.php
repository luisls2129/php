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

                $directores = include("bbdd/directores.php");
                $director;
                $idDirector = $_GET['id'];

                $expresion = '[?contains(`["'.$idDirector.'"]`, id)].{id: id,nombre: nombre,anyo: anyo, pais: pais}';

                $resultado = JmesPath\search($expresion,$directores);

                $director = $resultado[0];
                
            ?>
            <!-- Código PHP -->
            <b>Nombre: </b><?= $director['nombre']?><br />
            <b>Año: </b> <?= $director['anyo']?> <br />
            <b>País: </b><?= $director['pais']?><br />
            <!-- Fin código PHP -->

        </div>
    </body>
</html>