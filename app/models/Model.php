<?php 

namespace app\models;

use app\classes\Bind;
use app\traits\PersistDb;
use app\models\Connection;

    abstract class Model {

        use PersistDb;

        protected $con;

        public function __construct() {

            $this->con = Bind::get('con');
           
        }

        # Lista todos os registros.
        public function all() {

            $sql = "select * from {$this->table}";
            $sql = $this->con->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();

        }

        # Um registro específico.
        public function find($field, $value) {

            $sql = "select * from {$this->table} where {$field} = ?";
            $sql = $this->con->prepare($sql);
            $sql->bindValue(1, $value);
            $sql->execute();
            return $sql->fetch(); 

        }

        # Deleta um registro específico.
        public function delete($field, $value) {

            $sql = "delete from {$this->table} where {$field} = ?";
            $sql = $this->con->prepare($sql);
            $sql->bindValue(1, $value);
            $sql->execute();
            return $sql->rowCount();

        }

    }