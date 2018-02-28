<?php 

namespace app\validate\portal;

use app\validate\Validate;
use app\models\admin\Admin;

    class Login extends Validate {

        public function validate() {

            $this->required(['email', 'password']);
            $this->email(['email']);
            // $this->max(['email' => 10]);
            // $this->min(['password' => 3]);
            // $this->unique(['email' => Admin::class]);

        }

    }