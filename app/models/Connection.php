<?php 

namespace app\models;

use PDO;
use app\classes\Bind;

    class Connection {

        public static function connect() {

            $config = (object) Bind::get('config')->database;
            
            $pdo = new PDO("mysql:host=".$config->dbHost.";dbname=".$config->dbName.";charset=$config->dbChar", $config->dbUser, $config->dbPass, $config->option);

            /*
            # Força mostrar os erros.
            $pdo->setAttributes("PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION");
            # Recupera os dados em forma de objeto.
            $pdo->setAttributes("PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ");
            */
            
            return $pdo;

        }

    }