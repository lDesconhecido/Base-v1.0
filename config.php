<?php 

    return [
        "DataBase" => [
            'dbName' => 'mvc',
            'dbUser' => 'root',
            'dbPass' => '',
            'dbChar' => 'utf8',
            'dbHost' => 'localhost',
            'option' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ],
        ],
        "email" => [
            
        ],
        "options" => [
            'ShowPage404' => true, // Mostra a pagina 404.
            'MySite'=> 'http://www.minhabase.com.br',
        ],
    ];