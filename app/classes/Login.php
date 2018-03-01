<?php 

namespace app\classes;

use core\Reflection;
use app\models\Model;
use app\classes\Config;
use app\classes\Password;

    class Login {

        private $model;
        private $user;

        public function login(Model $model) {

            $this->model = $model;

            $this->user = $this->model->find('email', request()->get()->email);

            if (!$this->user) {

                return $this->isNotLoggedIn();

            }

            if (Password::verify(request()->get()->password, $this->user->password)) {

                return $this->isLoggedIn();

            }

            return $this->isNotLoggedIn();

        }

        public function isLoggedIn() {

            $_SESSION[$this->model->session] = true;
            $_SESSION[$this->model->user_id] = $this->user->id;

            session_regenerate_id();

            return true;

        }
        public function isNotLoggedIn() {

            $config = Config::load('login');

            flash(['login' => $config->error]);

            back();

            exit;

        }

        public function guest(Model $model) {

            $config = Config::load('redirect');

            $folder = (new Reflection($model))->getFolder();

            if (!isset($_SESSION[$model->session])) {

                return redirect($config->$folder['notLoggedIn']);

            }

        }

        public function logout(Model $model) {

            session_destroy();

            $config = Config::load('redirect');

            $folder = (new Reflection($model))->getFolder();

            return redirect($config->$folder['logout']);

        }

    }