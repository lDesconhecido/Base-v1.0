<?php 

namespace app\controllers\portal;

use app\controllers\BaseController;

    class HomeController extends BaseController{

        public function index() {
            dd('HOME - INDEX');
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