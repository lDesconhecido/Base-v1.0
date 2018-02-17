<?php 

namespace core;

use app\classes\Uri;
use app\exceptions\ControllerNotExistException;

    # Classe Coração do Controller.
    class Controller {

        # Guarda URI.
        private $uri;
        # Guarda o controller.
        private $controller;
        # Guarda o namespace.
        private $namespace;
        # Guarda os diretórios com os controller.
        private $folders = [
            'app\controllers\admin',
            'app\controllers\portal'
        ];

        # Já pega e armazena a URI ao instanciar a classe.
        public function __construct() {

            $this->uri = Uri::uri();

        }

        # Verefica se é o HOME e carrega o controller.
        public function load() {

            if($this->isHome()) {

                return $this->ControllerHome();

            }
            return $this->ControllerNotHome();

        }

        # Verefica se existe o controller, pega erros caso tenha e seta ele.
        private function ControllerHome() {
            
            if(!$this->ControllerExist('HomeController')) {

                throw new ControllerNotExistException("Este Controller não existe");
                
            }

            return $this->InstantiateController();

        }

        private function ControllerNotHome() {

            

        }

        # Verefica se é a pagina inicial o HOME.
        private function isHome() {

            return ($this->uri == '/');

        }

        # Verefica se o controller existe.
        private function ControllerExist($controller) {
            $ControllerExist =  false;

            foreach ($this->folders as $folder) {

                if (class_exists($folder.'\\'.$controller)) {

                    $ControllerExist = true;
                    $this->namespace = $folder;
                    $this->controller = $controller;

                }

            }

            return $ControllerExist;

        }

        # Instancia o controller.
        private function InstantiateController() {

            $controller = $this->namespace.'\\'.$this->controller;

            return new $controller;

        }

    }