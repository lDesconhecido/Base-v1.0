<?php 

namespace app\controllers\admin;

use app\classes\Password;
use app\controllers\BaseController;

    class AdminController extends BaseController {

        public function index() {

            $this->view([
                'title' => 'Administração',
                'base' => MySite()
            ], 'admin.home');

        }

        public function login() {

            $this->view([
                'title' => 'Administração',
                'base' => MySite()
            ], 'admin.login');

        }

    }