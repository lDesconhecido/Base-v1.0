<?php 

namespace app\controllers\portal;

use app\classes\Login;
use app\models\portal\User;
use app\controllers\BaseController;
use app\validate\portal\Login as LoginVal;

    class LoginController extends BaseController{

        public function index() {

            $this->view([
                'title' => 'Login'
            ], 'portal.login');

        }

        public function store() {

            $login = validate(LoginVal::class);

            if($login->hasErrors()) {

                flash($login->getErrors());
                
                return redirect('/login');
                
            }
            
            auth(new User);

            redirect('/');

        }

        public function destroy() {

            $login = new Login;

            return  $login->logout(new User);

        }

    }