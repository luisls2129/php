<?php
namespace core;


class Controller
{
    private $messages = [
        '200' => 'OK',
        '201' => 'El recurso ha sido creado',
        '400' => 'Solicitud mal formada',
        '404' => 'Recurso no encontrado',
        '405' => 'Método no permitido'
    ];

    protected function echoResponse($error, $status_code, $data) {
        //header('HTTP/1.1 200 OK');
        $response['error'] = $error;
        $response['message'] = $this->messages[$status_code];
        $response['data'] = $data;
        \http_response_code($status_code);
        exit(json_encode($response));
    }

}
