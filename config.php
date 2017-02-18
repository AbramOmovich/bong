<?php 

return [
    'database' => [
        'dsn' => 'mysql:dbname=site;host=localhost',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => 'site',
        'options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];