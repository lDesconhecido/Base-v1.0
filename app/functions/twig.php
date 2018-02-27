<?php 

    $this->functions[] = $this->functionsToView('user', function() {
        return 'dados user';
    });
    $this->functions[] = $this->functionsToView('flash', function($key, $type = 'danger') {
        return (new app\classes\Flash)->get($key, $type);
    });