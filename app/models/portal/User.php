<?php 

namespace app\models\portal;

use app\models\Model;

    class User extends Model {

        protected $table = 'user';
        public $session = 'user_logado';
        public $data = 'user_data';

    }