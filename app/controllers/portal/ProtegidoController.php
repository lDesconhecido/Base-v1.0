<?php 

namespace app\controllers\portal;

use app\classes\Login;
use app\models\portal\User;
use app\controllers\BaseController;

    class ProtegidoController extends BaseController {

        public function __construct() {
            
            // session_destroy();

            guest();

        }

        public function index() {

            $this->view([
                'title' => 'Protegido'
            ], 'admin.home');

        }

    }