<?php
namespace app\controllers;

use core\Controller;
use app\models\Director as modelDirector;

class Director extends Controller{

    public function getById($vars){
        $data = NULL;
        $director = modelDirector::find($vars['id']);
        if ($director !== NULL) {
            $data[] = [
                'nombre' => $director['nombre'],
                'anyo' => $director['anyo'],
                'pais' => $director['pais'],
                '_links' => [
                    'self' => $_ENV['APP_URL'] . '/directores/' . $director['id']
                ]
            ];
            $this->echoResponse(false, 200, $data);
        } else {
            $this->echoResponse(true, 404, $data);
        }
    }
    

}
