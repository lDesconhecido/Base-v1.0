<?php 

namespace app\controllers\portal;

use app\controllers\BaseController;

    class HomeController extends BaseController{

        public function index() {
            dd('HOME - INDEX');
        }

        public function show($request) {
            $this->view([
                'title' => 'Home'
            ], 'portal.home');
        }

    }