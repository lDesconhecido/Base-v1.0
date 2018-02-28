<?php 

namespace app\controllers\admin;

use app\classes\Password;
use app\validate\Sanitize;
use app\models\admin\Admin;
use app\validate\admin\Login;
use app\controllers\BaseController;

    class AdminLoginController extends BaseController {

        public function store() {

            $login = validate(Login::class);

            if($login->hasErrors()) {

                flash($login->getErrors());
                
                return redirect('/admin/login');
                
            }
            
            auth(new Admin);

            redirect('/painel');

        }

    }