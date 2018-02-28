<?php 

use app\classes\Bind;
use app\models\Model;
use app\classes\Login;
use app\classes\Flash;
use app\classes\Redirect;
use app\validate\Validate;
use app\validate\Sanitize;
use app\models\admin\Admin;
use app\models\portal\User;

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

    function request($field = null) {

        $sanitized = new Sanitize;

        
        if (!is_null($field)) {

            
            return $sanitized->sanitized()->get()->$field;
            
        }
        
        return $sanitized->sanitized();

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

        return Flash::add($messages);

    }

    function guest() {

        (new Login)->guest(new User);

    }
    function guestAdmin() {

        (new Login)->guest(new Admin);

    }