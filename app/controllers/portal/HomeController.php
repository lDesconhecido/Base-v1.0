<?php 

namespace app\controllers\portal;

use app\models\admin\Admin;
use app\controllers\BaseController;

    class HomeController extends BaseController{

        public function index() {

            $user = new Admin;
            $users = $user->all();

            $this->view([
                'title' => 'Home',
                'base' => MySite(),
                'users' => $users
            ], 'portal.home');

        }

        public function show($request) {
            
            // dd($request);
            /* Eemplo para pegar algo e listar na view 
                $users = new User;
                $users = $users->find('slug', $request->parameter); 
            */

            $this->view([
                'title' => 'Home'
            ], 'portal.home');
        }

    }