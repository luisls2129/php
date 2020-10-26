<?php 

require __DIR__ . '/../vendor/autoload.php';

$templatesFolder = __DIR__ . '/../app/views';
$templates = League\Plates\Engine::create($templatesFolder);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

include __DIR__ . ('/../routes/web.php');
