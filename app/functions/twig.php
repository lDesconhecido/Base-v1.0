<?php 

use app\models\portal\User;
use app\classes\User as UserClass;

    $this->functions[] = $this->functionsToView('user', function() {
        return (new UserClass())->user(new User);
    });
    $this->functions[] = $this->functionsToView('flash', function($key, $type = 'danger') {
        return (new app\classes\Flash)->get($key, $type);
    });