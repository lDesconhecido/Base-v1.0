<?php 

namespace app\classes;

    # Classe para pegar URI.
    class Uri {

        # Função que pega URI sem pegar depois do ? Ex: www.site.com/home/?page=10.
        public static function uri() {

            return parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);

        }

    }