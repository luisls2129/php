<?php
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $basedir = parse_url($_ENV['APP_URL'], PHP_URL_PATH);
    $r->addRoute('GET', $basedir . '/peliculas', 'pelicula@getAll');
    $r->addRoute('GET', $basedir . '/peliculas/{id:\d+}', 'pelicula@getById');
    $r->addRoute('GET', $basedir . '/peliculas/{id:\d+}/criticas', 'critica@getByFilm');
    $r->addRoute('GET', $basedir . '/criticas/{id:\d+}', 'critica@getById');
    $r->addRoute('POST', $basedir . '/criticas', 'critica@insert');
    $r->addRoute('PUT', $basedir . '/criticas/{id_critica:\d+}', 'critica@update');
    $r->addRoute('DELETE', $basedir . '/criticas/{id_critica:\d+}', 'critica@delete');
    $r->addRoute('PATCH', $basedir . '/criticas/{id_critica:\d+}', 'critica@patch');
    $r->addRoute('GET', $basedir . '/actores/{id:\d+}', 'actor@getById');
    $r->addRoute('GET', $basedir . '/directores/{id:\d+}', 'director@getById');
});


//Ver si existe el campo _method para sobreescribir los métodos put y delete,
//ya que los formularios sólo permiten POST y GET
$metodosPermitidos = ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'];
$httpMethod = strtoupper($_POST['_method']??  $_SERVER['REQUEST_METHOD']);
if(!in_array($httpMethod, $metodosPermitidos)) {
    $httpMethod = 'GET';    
}

$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $controllerName = '\\app\\controllers\\Main';
        $action = 'notFound';
        $controller = new $controllerName();
        $controller->$action();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $controllerName = '\\app\\controllers\\Main';
        $action = 'notAllowed';
        $controller = new $controllerName();
        $controller->$action();
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $partes = explode('@', $handler);
        $controllerName = '\\app\\controllers\\' . ucfirst($partes[0]);
        $action = $partes[1];
        $controller = new $controllerName();
        $vars = $routeInfo[2];
        $controller->$action($vars);
        break;
}