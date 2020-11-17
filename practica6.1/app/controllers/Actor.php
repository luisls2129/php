<?php
namespace app\controllers;

use core\Controller;
use app\models\Actor as modelActor;

class Actor extends Controller{

    public function getById($vars){
        $data = NULL;
        $actor = modelActor::find($vars['id']);
        if ($actor !== NULL) {
            $data[] = [
                'nombre' => $actor['nombre'],
                'anyo' => $actor['anyo'],
                'pais' => $actor['pais'],
                '_links' => [
                    'self' => $_ENV['APP_URL'] . '/actores/' . $actor['id']
                ]
            ];
            $this->echoResponse(false, 200, $data);
        } else {
            $this->echoResponse(true, 404, $data);
        }
    }
    

}
