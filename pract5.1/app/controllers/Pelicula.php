<?php

namespace app\controllers;

use core\Controller;
use app\models\Pelicula as modelPelicula;

class Pelicula extends Controller
{
    function getAll()
    {
        $peliculas = modelPelicula::all();
        echo $this->templates->render('peliculas_listado', ['peliculas' =>
        $peliculas]);
    }

    function getById($vars)
    {
        $pelicula = modelPelicula::find($vars['id']);
        var_dump($pelicula);
        //$directores = modelPelicula::sacarDiretores($vars['id']);
        //$actores = modelPelicula::sacarActores($vars['id']);
        $directores = NULL;
        $actores = NULL;
        echo $this->templates->render('peliculas_ficha',
         ['pelicula' => $pelicula ,'peliDirector' => $directores, 'peliActor' => $actores]);
    }
//esto en model pelicula
    

}
