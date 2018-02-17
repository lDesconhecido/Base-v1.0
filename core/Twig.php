<?php 

namespace core;

    class Twig {

        # Guarda o twig.
        private $twig;
        # Guarda as funções.
        private $functions = [];

        # Seta e carrega o twig.
        public function loadTwig(){

            $this->twig= new \Twig_Environment($this->loadViews(), [
                'debug' => true,
                // 'cache' => ROOT . '/cache',
                'auto_reload' => true
            ]);

            return $this->twig;

        }
        
        # Carrega as views.
        public function loadViews() {

            return new \Twig_Loader_Filesystem('../app/views');

        }

        # Carrega extenções.
        public function loadExtensions() {

            return $this->twig->addExtension(new \Twig_Extensions_Extension_Text());

        }

        public function functionsToView($name, \Closure $callback) {

            return new \Twig_Function($name, $callback);

        }

        public function loadFunctions() {
            require '../app/functions/twig.php';

            foreach ($this->functions as $function => $value) {
                $this->twig->addFunction($this->functions[$function]);
            }
        }

    }