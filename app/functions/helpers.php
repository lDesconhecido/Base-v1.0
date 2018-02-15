<?php 

    # Função DieDump  mostra varriavél e encerra o script.
    function dd($dump) {
        var_dump($dump);
        die();
    }