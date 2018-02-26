<?php 

use app\classes\Bind;

    # Função DieDump  mostra varriavél e encerra o script.
    function dd($dump) {
        var_dump($dump);
        die();
    }

    # Retorn a url base do site que está na config.
    function MySite() {

        return Bind::get('config')->options['MySite'];

    }

    # Retorn a conecção.
    function con() {

        return Bind::get('con');

    }