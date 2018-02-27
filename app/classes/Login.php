<?php 

namespace app\classes;

use app\models\Model;
use app\classes\Password;

    class Login {

        private $model;
        private $user;

        public function login(Model $model) {

            $this->model = $model;

            $this->user = $this->model->find('email', request('email'));

            if (!$this->user) {

                return $this->isNotLoggedIn();

            }

            if (Password::verify(request('password'), $this->user->password)) {

                return $this->isLoggedIn();

            }

            return $this->isNotLoggedIn();

        }

        public function isLoggedIn() {

            $_SESSION[$this->model->session] = true;
            $_SESSION[$this->model->data] = $this->user;

            session_regenerate_id();

            return true;

        }
        public function isNotLoggedIn() {

            flash(['login' => 'Login e/ou senha incorretos.']);

            return back();

        }

    }