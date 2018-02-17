<?php 

use core\Method;
use app\classes\Uri;
use core\Controller;
use core\Parameters;

    # Chama BootStrap para começar.
    require "../bootstrap.php";

    /* Como será ? */

    try {

        $controller = new Controller;
        $controller = $controller->load();

        $method = new Method;
        $method = $method->load($controller);

        $parameters = new Parameters;
        $parameters = $parameters->load();

        $controller->$method($parameters);

        dd($controller);

    } catch(\Exception $e) {

        dd($e->getMessage());

    }
    
    // $parameters = new Parameters;
    // $parameters = $parameters->getParameters;

    // $controller->$method($parameters);