<?php

namespace app\controllers;

use core\Controller;
use app\models\Pelicula as modelPelicula;

class Pelicula extends Controller
{
    function getAll()
    {
        $peliculas = modelPelicula::all();
        foreach ($peliculas as $pelicula) {
            $datos[] = [
                "id" => $pelicula["id"],
                "titulo" => $pelicula["titulo"],
                "links"=> [
                    "self"=> $_ENV['APP_URL'] . "/peliculas/" . $pelicula["id"]
                ]
            ];
        }
        

        Controller::respuestaJson(false,"200",$datos);
    }

    function getById($vars)
    {
        $pelicula = modelPelicula::find($vars['id']);
        $directores = modelPelicula::getDirect($vars['id']);
        $actores = modelPelicula::getAct($vars['id']);
        $criticas = modelPelicula::getCriticas($vars['id']);
        
        $datPeli = [
            "titulo" => $pelicula["titulo"],
            "links"=> [
                "self"=> $_ENV['APP_URL'] . "/peliculas/" . $pelicula["id"]
            ]
        ];
    }

    function getActores($actores){
        
        $datAct = [];
        foreach ($actores as $actor) {
            
        }

    }
    
    function Criticas($vars){
        $criticas = modelPelicula::getCriticas($vars['id']);
        echo$this->templates->render('peliculas_criticas', [
            'id_pelicula' => $vars['id'], 'criticas' => $criticas
            ]);
    }

}
