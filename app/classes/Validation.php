<?php 

namespace app\classes;

    class Validation {

        private $validate = [];

        public function validate($validar) {

            foreach ($validar as $key => $value) {
                $this->validate[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }

            return (object) $this->validate;

        }

    }