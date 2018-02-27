<?php 

session_start();

# Carrega autoload.
require "vendor/autoload.php";

use app\classes\Bind;
use app\models\Connection;

    $config = require 'config.php';
    Bind::set('config', $config);
    Bind::set('con', Connection::connect());