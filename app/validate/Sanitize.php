<?php 

namespace app\validate;

use app\classes\Password;

    class Sanitize {

        protected $sanitized = [];

        public function sanitized() {

            $posts = $_POST;


            foreach ($posts as $name => $value) {

                $this->sanitized[$name] = filter_var($value, FILTER_SANITIZE_STRING);

            }

            return $this;

        }

        public function get() {

            return (object) $this->sanitized;

        }

        public function hash() {

            if (array_key_exists('password', $this->sanitized)) {

                $this->sanitized['password'] = filter_var(Password::hash($this->sanitized['password']), FILTER_SANITIZE_STRING);

            }

            return (object) $this->sanitized;

        }

    }