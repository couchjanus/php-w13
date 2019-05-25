#!/usr/bin/php
<?php

// Запуск PHP-скрипта как консольного

// phpinfo();

$routes = [
    'contact' => 'ContactController',
    'about' => 'AboutController',
    'blog' => 'BlogController',
    'index.php' => 'HomeController',
    '' => 'HomeController', 
];

echo count($routes);


$arr = array('один', 'два', 'три', 'четыре', 'стоп', 'пять');
while (list(, $val) = each($arr)) {
    if ($val == 'стоп') {
       break;    /* Тут можно было написать 'break 1;'. */
    }
    echo "$val\n";
}

$i = 0;
while ($i++ < 5) {
    echo "Снаружи\n";
    while (1) { echo "В середине\n";
        while (1) {  echo "Внутри\n";
            continue 3;
        }
        echo "Это никогда не будет выведено.\n";
    }
    echo "Это тоже.\n"; 
}