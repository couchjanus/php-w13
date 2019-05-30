<?php

// pdo.create.database.test.php

// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
];

// подключаемся к базе данных
try {
    $dsn  = sprintf('mysql:charset=utf8mb4;host=%s;', $params['host'], $params['db']);
    
    $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $sql = "CREATE DATABASE store";
    $pdo->exec($sql);
    echo "Database created successfully\n\n";
}
catch(PDOException $e) {
    error_log($e->getMessage());
    file_put_contents('PDOErrors.log', $e->getMessage(), FILE_APPEND);
} catch (Throwable $e) {
    error_log($e->getMessage());
}
finally {
    $pdo = null;
}
