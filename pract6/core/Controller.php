<?php

namespace core;


class Controller
{
    protected $codes = [
        "200" => "OK",
        "201" => "Creado",
        "404" => "No encontrado"
    ];

    protected function respuestaJson($error, $responseCode, $datos){
        http_response_code($responseCode);
        $response["error"] = $error;
        $response["mensaje"] = $this->codes[$responseCode];
        $response["datos"] = $datos;



        exit(json_encode($response));
    }
}
