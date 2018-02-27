<?php 

namespace app\classes;

    class Password {

        # Cria hash.
        public static function hash($password) {

            $options = [
                'cost' => 12
            ];

            return password_hash($password, PASSWORD_DEFAULT, $options);

        }

        # Verifica hash.
        public static function verify($password, $hash) {

            return password_verify($password, $hash);

        }

    }