<?php

namespace app\controllers;

use core\Controller;
use app\models\Pelicula as modelPelicula;
use app\models\Critica as modelCritica;

class Critica extends Controller{
    public function getAll(){
        $peliculas = modelPelicula::all();
        echo$this->templates->render('criticas', ['peliculas' => $peliculas]);
    }

    public function getById($vars){

        $critica = modelCritica::find($vars['id']);
        echo $this->templates->render('criticas_ficha',['critica' => $critica]);

    }

    public function insertForm($vars){
        echo $this->templates->render('criticas_insertar',['id_pelicula' => $vars['id']]);
    }

    public function insert ($vars) {
        modelCritica::insert();
        header('Location: ' . $_ENV['APP_URL'] . '/peliculas/' . $vars['id'] . '/criticas'); 
    }
}