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

            // return toJson($login->getErrors());

            // $sanitized = new Sanitize;
            // return toJson(request('email'));
            # toJson($login->getErrors());
            
            if($login->hasErrors()) {
                //toJson($login->getErrors());
                flash($login->getErrors());
                return redirect('/admin/login');
                
            }

            $logado = auth(new Admin);

            if ($logado) {

                redirect('/painel');

            }

            return toJson($_SESSION);

        }

    }