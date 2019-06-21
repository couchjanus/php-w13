<?php
namespace Core;

// use Core\Session;
// use Core\Router;
// use Core\Request;

// PHP 7+ 
use Core\{Session, Connection, Router, Request as R};

class App
{
    protected $result = null;

    public function __construct()
    {
        // включаем буфер
        ob_start();
        // Запускаем сессию
        Session::init();
        Connection::connect(require_once DB_CONFIG_FILE);
    }

    public function init()
    {
        // echo 'Hello class';
        Router::load(ROUTES)->direct(Request::uri(), Request::method());

    }
}
