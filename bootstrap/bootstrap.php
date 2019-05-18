<?php
    /**
     * PHP version 7.2
     * 
     * @category Php
     * @package  Php_Project
     * @author   Janus Nic <couchjanus@gmail.com>
     * @license  MIT License https://github.com/couchjanus/php-w13/LICENSE
     * @link     https://github.com/couchjanus/php-w13
     **/
// declare(strict_types=1);

echo "<h2>__DIR__</h2>";
echo realpath(__DIR__);
echo dirname(__DIR__);
dd(dirname(__DIR__));
function AddIntAndFloat(int $a, float $b) : int 
{
    return $a + $b;
}

/*
* without strict typing, php will change float(1.4) to int(1)
* and string('2') to float(2.0) and returns int(3)
* Uncaught TypeError: Argument 1 passed to AddIntAndFloat() must be of the type integer, float given
*/

// echo AddIntAndFloat(1.4,'2');

function dd($obj){
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
}

dd(AddIntAndFloat(1.4,'2'));

// Общие настройки

// Получение временной зоны по умолчанию

// echo "<h2>Get date default timezone</h2>";
// echo date_default_timezone_get();

// echo "<h2>Get date timezone from php.ini</h2>";

// if (ini_get('date.timezone')) {
//     echo 'date.timezone: ' . ini_get('date.timezone');
// }

// echo "<h2>Set date default timezone</h2>";
// date_default_timezone_set('Europe/Kiev');

// if (date_default_timezone_get()) {
//     echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
// }

dd(date_default_timezone_get());

// Устанавливаем временную зону по умолчанию
// if (function_exists('date_default_timezone_set')) {
//     date_default_timezone_set('Europe/Kiev');    
// }

// Ошибки и протоколирование
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

// echo '<h3>DIRECTORY_SEPARATOR (string)</h3>';
// echo DIRECTORY_SEPARATOR;
// echo '<h3>PATH_SEPARATOR (string)</h3>';
// echo PATH_SEPARATOR;
// echo '<h3>SCANDIR_SORT_ASCENDING (integer)</h3>';
// echo SCANDIR_SORT_ASCENDING;   
// echo '<h3>SCANDIR_SORT_DESCENDING (integer)</h3>';
// echo SCANDIR_SORT_DESCENDING;   
// echo '<h3>SCANDIR_SORT_NONE (integer)</h3>';
// echo SCANDIR_SORT_NONE;

// ============================================
// require_once realpath(__DIR__).'/../config/app.php';

// print_r(CONTROLLERS);
// require_once VIEWS.'pages/index.php';

// require_once CORE.'Router.php';
