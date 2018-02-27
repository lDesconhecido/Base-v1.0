<?php 

namespace app\classes;

    class Flash {

        # Adiciona menssagem.
        public static function add($messages) {

            foreach ($messages as $key => $message) {

                if (!isset($_SESSION['flash'][$key])) {

                    $_SESSION['flash'][$key] = $message;

                }

            }

        }
        # Pega menssagem.
        public static function get($index, $type = 'danger') {

            if (isset($_SESSION['flash'][$index])) {

                $messages = $_SESSION['flash'][$index];

                unset($_SESSION['flash'][$index]);

                return isset($messages) ? static::getMessage($messages, $type) : '';

            }

            return '';

        }

        # Pega mensagem.
        private static function getMessage($messages, $type = 'danger') {

            if (!is_array($messages)) {

                return static::singleMessage($messages, $type);

            }

            return static::multipleMessage($messages, $type);

        }

        private static function singleMessage($messages, $type) {

            return '<span class="text-'.$type.'">'.$messages.'</span>';

        }

        private static function multipleMessage($messages, $type) {

            $list = '<ul>';

            foreach ($messages as $message) {
                $list = $list.'<li class="text-'.$type.'">'.$message.'</li>';
            }

            $list = $list.'</ul>';

            return $list;

        }

    }