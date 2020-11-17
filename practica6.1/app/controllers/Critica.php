<?php
namespace app\controllers;

use core\Controller;
use app\models\Pelicula as modelPelicula;
use app\models\Critica as modelCritica;


class Critica extends Controller{

    public function getByFilm($vars) {
        $data = NULL;
        $criticas = modelPelicula::getCriticas($vars['id']);
        foreach ($criticas as $critica) {
            $data[] = [
                'medio' => $critica['medio'],
                'links' => [
                    'self' => $_ENV['APP_URL'] . '/criticas/' . $critica['id']
                ]
            ];
        };
        $this->echoResponse(false, 200, $data);
    }

    public function getById($vars){
        $data = NULL;
        $critica = modelCritica::find($vars['id']);
        if ($critica !== null) {
            $data[] = [
                'medio' => $critica['medio'],
                'puntuacion' => $critica['puntuacion'],
                'critica' => $critica['critica'],
                '_links' => [
                    'self' => $_ENV['APP_URL'] . '/criticas/' . $critica['id']
                ]
            ];    
            $this->echoResponse(false, 200, $data);
        } else {
            $this->echoResponse(true, 404, $data);
        }
    }

    public function insert() {
        $dataPOST = \json_decode(file_get_contents("php://input"));
        $lastInsertId = modelCritica::insert($dataPOST);
        if ($lastInsertId !== 0) {
            $data = [
                '_links' => [
                    'self' => $_ENV['APP_URL'] . '/criticas/' . $lastInsertId
                ]
            ];
            $this->echoResponse(false, 201, $data);
        } else {
            $this->echoResponse(true, 400, $data);
        }
    }

    public function update($vars) {
        $dataPOST = \json_decode(file_get_contents("php://input"));
        modelCritica::update($vars['id_critica'], $dataPOST);
        $data = [
            '_links' => [
                'self' => $_ENV['APP_URL'] . '/criticas/' . $vars['id_critica']
            ]
        ];
        $this->echoResponse(false, 200, $data);
    }

    public function delete($vars) {
        $data = modelCritica::find($vars['id_critica']);
        modelCritica::delete($vars['id_critica']);
        $this->echoResponse(false, 200, $data);
    }
}
