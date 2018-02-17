<?php 

namespace app\traits;

use core\Twig;

    trait View {

        # Seta a classe Twig.
        private function twig() {

            $twig = new Twig;
            $twig->loadTwig();

        }

        # Carrega o tiwig isntanciando ele e carrega ele Chamando view e envia os dados.
        public function view($data, $view) {

            $template = $this->twig()->load(str_replace('.' , '/', $view.'.html'));

            return $template->display($data);

        }

    }