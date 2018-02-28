<?php 

namespace app\controllers\portal;

use app\classes\Password;
use app\models\portal\User;
use app\validate\portal\Cadastro;
use app\controllers\BaseController;

    class CadastroController extends BaseController{

        public function index() {

            $this->view([
                'title' => 'Cadastro'
            ], 'portal.cadastro');

        }

        public function store() {

            $login = validate(Cadastro::class);

            if($login->hasErrors()) {

                flash($login->getErrors());
                
                return back();
                
            }

            $user = new User;



            $cadastrado = $user->insert([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Password::hash(request('password')),
            ]);


            auth($user);

            return toJson($_SESSION);

        }

    }