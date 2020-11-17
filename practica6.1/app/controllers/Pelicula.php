<?php
namespace app\controllers;

use core\Controller;
use app\models\Pelicula as modelPelicula;


class Pelicula extends Controller{

    public function getAll(){
        $data = NULL;
        $peliculas = modelPelicula::all();
        foreach ($peliculas as $pelicula) {
            $data[] = [
                'id' => $pelicula['id'],
                'titulo' => $pelicula['titulo'],
                'links' => [
                    'self' => $_ENV['APP_URL'] . '/peliculas/' . $pelicula['id']
                ]
            ];
        }
        $this->echoResponse(false, 200, $data);
    }

    public function getById($vars){
        $data = NULL;
        $pelicula = modelPelicula::find($vars['id']);
        if ($pelicula !== NULL) {
            $directores = $this->getDirectores($vars['id']);
            $actores = $this->getActores($vars['id']);
            $criticas = $this->getCriticas($vars['id']);
            $data[] = [
                'titulo' => $pelicula['titulo'],
                'anyo' => $pelicula['anyo'],
                'duracion' => $pelicula['duracion'],
                '_links' => [
                    'self' => $_ENV['APP_URL'] . '/peliculas/' . $pelicula['id']
                ],
                '_embedded' => [
                    'directores' => $directores,
                    'actores' => $actores,
                    'criticas' => $criticas
                ]
            ];    
            $this->echoResponse(false, 200, $data);
        } else {
            $this->echoResponse(true, 404, $data);
        }
    }

    private function getDirectores($id){
        $data = array();
        $directores = modelPelicula::getDirectores($id);
        foreach ($directores as $director) {
            $data[] = [
                'nombre' => $director['nombre'],
                'links' => [
                    'self' => $_ENV['APP_URL'] . '/directores/' . $director['id']
                ]
            ];
        };
        return $data;
    }
    
    private function getActores($id){
        $data = array();
        $actores = modelPelicula::getActores($id);
        foreach ($actores as $actor) {
            $data[] = [
                'nombre' => $actor['nombre'],
                'links' => [
                    'self' => $_ENV['APP_URL'] . '/actores/' . $actor['id']
                ]
            ];
        };
        return $data;
    }

    private function getCriticas($id) {
        $data = array();
        $criticas = modelPelicula::getCriticas($id);
        foreach ($criticas as $critica) {
            $data[] = [
                'medio' => $critica['medio'],
                'puntuacion' => $critica['puntuacion'],
                'links' => [
                    'self' => $_ENV['APP_URL'] . '/criticas/' . $critica['id']
                ]
            ];
        };
        return $data;
    }

}
