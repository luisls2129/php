<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require __DIR__ . '/../vendor/autoload.php';

//librería para poder leer archivos.env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

include __DIR__ . ('/../routes/api.php');

