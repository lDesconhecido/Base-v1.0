<?php 

namespace core;

use app\classes\Uri;
use app\exceptions\MethodNotExistException;

    class Method {

        # Guarda URI.
        private $uri;

        # Ao instanciar já pega e seta a uri.
        public function __construct() {
            
            $this->uri = Uri::uri();

        }

        # Métodos para carregar o método.
        public function load($controller) {

            $method = $this->getMethod();

            if (!method_exists($controller, $method)) {

                if ($method == 'js' || $method == 'css') {
                  
                    exit;
    
                }
                
                throw new MethodNotExistException("Este Method não existe: {$method}");
                
            }

            return $method;

        }

        # Pega o método.
        private function getMethod() {

            $uri = rtrim($this->uri, '/');

            if (substr_count($uri, '/') > 1) {
                
                list($controller, $method) = array_values(array_filter(explode('/', $uri)));

                return $method;

            }

            return 'index';

        }

    }