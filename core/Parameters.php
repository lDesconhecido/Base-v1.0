<?php 

namespace core;

use app\classes\Uri;

    class Parameters {

        # Guarda URI.
        private $uri;

        # Já seta URI ao instanciar.
        public function __construct() {

            $this->uri = Uri::uri();

        }

        # Carrega os parametros.
        public function load() {
            
            return $this->getParameter();

        }

        # Pega o parametro
        private function getParameter() {

            $uri = rtrim($this->uri, '/');
            
            if (substr_count($uri, '/') > 2) {

                $parameter = array_values(array_filter(explode('/', $uri)));
                
                return (object) [
                    'parameter' => filter_var($parameter[2], FILTER_SANITIZE_STRING),
                    'next' => filter_var($this->getNextParameter(2), FILTER_SANITIZE_STRING),
                ];

            }

        }

        # Pega o proximo parametro.
        private function getNextParameter($actual) {

            $uri = rtrim($this->uri, '/');

            $parameter = array_values(array_filter(explode('/', $uri)));

            return $parameter[$actual + 1] ?? $parameter[$actual];

        }

    }