<?php 

use app\classes\Bind;
use app\models\Model;
use app\classes\Login;
use app\classes\Flash;
use app\classes\Redirect;
use app\validate\Validate;
use app\validate\Sanitize;

    # Função DieDump  mostra varriavél e encerra o script.
    function dd($dump) {
        var_dump($dump);
        die();
    }

    # Retorn a url base do site que está na config.
    function MySite() {

        return Bind::get('config')->options['MySite'];

    }

    # Cria Json na tela.
    function toJson($data) {

        header('Content-Type: application/json');

        echo json_encode($data);

    }

    # Retorn a conecção.
    function con() {

        return Bind::get('con');

    }

    function validate($validate) {

        $validate = new $validate();
        $validate->validate();

        return $validate;

    }

    function request($field) {

        $sanitized = new Sanitize;

        return $sanitized->sanitized()->$field;

    }

    function auth(Model $model) {

        return (new Login)->login($model);

    }

    function back() {

        return Redirect::back();

    }
    function redirect($target) {

        return Redirect::redirect($target);

    }
    function flash($messages) {

        return (new Flash)->add($messages);

    }