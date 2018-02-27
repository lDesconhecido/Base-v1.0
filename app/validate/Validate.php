<?php 

namespace app\validate;

    abstract class Validate {

        private $errors = [];

        public function required($fields) {

            $this->isArray($fields);

            if (empty($fields)) {

                foreach ($_POST as $key => $value) {

                    $this->isEmpty($key);


                }

                return;

            }

            foreach ($fields as $key => $field) {
                
                $this->isEmpty($field);
                
            }

        }

        public function email($fields) {

            $this->isArray($fields);

            foreach ($fields as $key => $field) {

                if (!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {

                    $this->errors[$field][] = 'Este email é inválido';

                }

            }

        }

        public function unique($fields) {

            $this->isArray($fields);

            foreach ($fields as $key => $model) {
                $model = new $model;

                if ($model->find($key, $_POST[$key])) {

                    $this->errors[$key][] = "O campo já tem um valor cadastrado com que você digitou.";

                }
            }

        }

        public function hasErrors() {

            return !empty($this->errors);

        }

        public function getErrors() {

            return $this->errors;

        }

        public function max($fields) {

            $this->isArray($fields);

            foreach ($fields as $key => $lenght) {
                if (strlen($_POST[$key]) > $lenght) {

                    $this->errors[$key][] = "O campo deve ter no maximo {$lenght} caracteres";

                }
            }

        }

        public function min($fields) {

            $this->isArray($fields);

            foreach ($fields as $key => $lenght) {
                if (strlen($_POST[$key]) < $lenght) {

                    $this->errors[$key][] = "O campo deve ter no minimo {$lenght} caracteres";

                }
            }

        }

        # Vê se é um array.
        private function isArray($fields) {

            if (!is_array($fields)) {

                throw new \Exception("Validação: precisa ser um array no REQUIRED");

            }

        }

        # Vê se está vazio.
        private function isEmpty($field) {
    
            if (empty($_POST[$field])) {

                $this->errors[$field][] = "Esse campo é obrigatório.";

            }

        }

    }