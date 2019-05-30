<?php

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

function getPathControllerAction($route)
{
    $segments = explode('\\', $route);
    list($controller, $action) = explode('@', array_pop($segments));
    $controllerPath = DIRECTORY_SEPARATOR;
    do {
        if (count($segments)===0) {
            return array ($controllerPath, $controller, $action);
        } else {
            $segment = array_shift($segments);
            $controllerPath = $controllerPath . $segment . DIRECTORY_SEPARATOR;
        }
    } while (count($segments)>=0);
}

$result = null;

// Подключаем строку запроса
$uri = getURI();

// Подключаем файл routes
$filename = CONFIG.'routes'.EXT;

if (file_exists($filename)) {
    $routes = include_once $filename;
} else {
    echo "Файл $filename не существует";
}

foreach ($routes as $route => $path) {
    //Сравниваем route и $uri
    if ($route == $uri) {
        
        // list($controller, $action) = explode('@', $path);
        list($controllerPath, $controller, $action ) = getPathControllerAction($path);
        //Подключаем файл контроллера
        // $controllerFile = CONTROLLERS . $controller . EXT;
        $controllerFile = CONTROLLERS .$controllerPath . $controller . EXT;
        
        if (file_exists($controllerFile)) {
            include_once $controllerFile;
            $controller = new $controller;

            if (method_exists($controller, $action)) {
                $controller->$action();
            }
            $result = true;
        }

        if ($result !== null) {
            break;
        }
    }
}

if ($result === null) {
    include_once VIEWS.'errors/404'.EXT;
}
