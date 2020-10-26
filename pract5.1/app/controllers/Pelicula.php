<?php

namespace app\controllers;

use core\Controller;
use app\models\Pelicula as modelPelicula;

class Pelicula extends Controller
{
    function getAll()
    {
        $peliculas = modelPelicula::getAll();
        echo $this->templates->render('peliculas_listado', ['peliculas' =>
        $peliculas]);
    }

    function getById($vars)
    {
        $pelicula = modelPelicula::getById($vars['id']);
        $directores = modelPelicula::sacarDiretores($vars['id']);
        $actores = modelPelicula::sacarActores($vars['id']);
        echo $this->templates->render('peliculas_ficha',
         ['pelicula' => $pelicula ,'peliDirector' => $directores, 'peliActor' => $actores]);
    }
//esto en model pelicula
    

}
