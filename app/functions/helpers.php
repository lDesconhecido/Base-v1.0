<?php 

use app\classes\Bind;

    # Função DieDump  mostra varriavél e encerra o script.
    function dd($dump) {
        var_dump($dump);
        die();
    }

    # Função para filtrar Post.
    function filterPost($filter) {

        $filter = filter_input(INPUT_POST, $filter, FILTER_SANITIZE_STRING);

        return $filter;

    }
    # Função para filtrar Get.
    function filterGet($filter) {

        $filter = filter_input(INPUT_GET, $filter, FILTER_SANITIZE_STRING);

        return $filter;

    }

    function MySite() {

        return Bind::get('config')->options['MySite'];

    }