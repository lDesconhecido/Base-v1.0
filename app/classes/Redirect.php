<?php 

namespace app\classes;

    class Redirect {

        public static function redirect($target) {

            return Header("Location: {$target}");

        }

        public static function back() {

            $previous = "javascript:history.go(-1)";

            if (isset($_SERVER['HTTP_REFERER'])) {

                $previous = $_SERVER['HTTP_REFERER'];

            }

            return Header("Location: {$previous}");

        }

    }