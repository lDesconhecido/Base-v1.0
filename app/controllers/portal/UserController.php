<?php 

namespace app\controllers\portal;

use app\models\admin\Admin;
use app\classes\Validation;
use app\controllers\BaseController;

    class UserController extends BaseController{

        public function editar ($request) {

            $user =  new Admin;
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $usuario = $user->find('id', $id);

            $this->view([
                'base' => Mysite(),
                'user' => $usuario,
                'title' => 'Editar Usúario',
            ], 'portal.user-edit');

            if ($_POST) {

                $validation = new Validation;
                
                $validado = $validation->validate($_POST);

                $user->update($validado, ['id' => $validado->id]);

                Header('Location: '.MySite());

            }

        }

        public function cadastrar() {

            $user =  new Admin;

            $this->view([
                'base' => Mysite(),
                'title' => 'Adicionar Usúario',
            ], 'portal.user-singup');

            if ($_POST) {

                $validation = new Validation;
                
                $validado = $validation->validate($_POST);

                $user->insert($validado);

                Header('Location: '.MySite());

            }

        }

        public function show () {

            

        }

    }