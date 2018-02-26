<?php 

namespace app\models;

use Closure;
use app\models\Model;

    class Transaction extends Model{

        public function __get($name) {

            if (!property_exists($this, $name)) {

                $model = __NAMESPACE__.'\\admin\\'.ucfirst($name);
                
                return new $model;
            }

        }

        public function model($model) {

            return new $model;

        }

        public function transactions(Closure $callback) {

            $this->con->beginTransaction();

            try {

                $callback();

                $this->con->commit();

            } catch (\Throwable $e) {

                $this->con->rollback();

                dd($e->getMessage());

            }

        }

    }