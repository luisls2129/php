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
        $directores = modelPelicula::getDirect($vars['id']);
        $actores = modelPelicula::getAct($vars['id']);
        $criticas = modelPelicula::getCriticas($vars['id']);
        echo $this->templates->render('peliculas_ficha',
         ['pelicula' => $pelicula ,'peliDirector' => $directores, 'peliActor' => $actores,'criticas' => $criticas]);
    }
    
    function Criticas($vars){
        $criticas = modelPelicula::getCriticas($vars['id']);
        echo$this->templates->render('peliculas_criticas', [
            'id_pelicula' => $vars['id'], 'criticas' => $criticas
            ]);
    }

}
