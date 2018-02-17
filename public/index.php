<?php 

use app\classes\Uri;
use core\Controller;

    # Chama BootStrap para começar.
    require "../bootstrap.php";

    /* Como será ? */

    try {

        $controller = new Controller;
        $controller = $controller->load();
        dd($controller);

    } catch(\Exception $e) {

        dd($e->getMessage());

    }
    
    // $method = new Method;
    // $method = $method->getMethod;
    
    // $parameters = new Parameters;
    // $parameters = $parameters->getParameters;

    // $controller->$method($parameters);