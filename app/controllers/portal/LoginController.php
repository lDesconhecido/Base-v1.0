<?php 

namespace app\controllers\portal;

use app\models\portal\User;
use app\validate\portal\Login;
use app\controllers\BaseController;

    class LoginController extends BaseController{

        public function index() {

            $this->view([
                'title' => 'Login'
            ], 'portal.login');

        }

        public function store() {

            $login = validate(Login::class);

            if($login->hasErrors()) {

                flash($login->getErrors());
                
                return redirect('/login');
                
            }
            
            auth(new User);

            redirect('/protegido');

        }

    }