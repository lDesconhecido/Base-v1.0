<?php 

namespace app\models;

use app\classes\Bind;
use app\models\Connection;

    abstract class Model {

        protected $con;

        public function __construct() {

            $this->con = Bind::get('con');
           
        }

        # Lista todos os registros.
        public function all() {

            $sql = "select * from admin";
            $sql = $this->con->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();

        }

        # Um registro especifico.
        public function find() {

            $sql = "select * from admin";
            $sql = $this->con->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();

        }

    }