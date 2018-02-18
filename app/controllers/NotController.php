<?php 

namespace app\controllers;

use app\classes\Bind;
use app\controllers\BaseController;

    class NotController extends BaseController{

        public function index () {

            $base = Bind::get('config')->options['MySite'];

            $this->view([
                'title' => 'Pagina Não Encontrada',
                'base' => $base
            ], 'NotFound');

        }

    }