<?php 

namespace app\models\portal;

use app\models\Model;

    class User extends Model {

        # Tabela que o model trabalha.
        protected $table = 'user';

        # Tipo de User.
        public $session = 'user_logado';

        # Dados do usuario.
        public $user_id = 'UserID';

        # White List.
        public $fillable = ['name', 'email', 'password'];

    }