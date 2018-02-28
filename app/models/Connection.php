<?php 

namespace app\models;

use PDO;
use app\classes\Bind;
use app\classes\Config;

    class Connection {

        public static function connect() {

            $config = Config::load('DataBase');
            #(object) Bind::get('config')->DataBase;
            
            $pdo = new PDO("mysql:host=".$config->dbHost.";dbname=".$config->dbName.";charset=$config->dbChar", $config->dbUser, $config->dbPass, $config->option);
            
            return $pdo;

        }

    }