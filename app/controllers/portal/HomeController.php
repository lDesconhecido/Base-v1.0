<?php 

namespace app\controllers\portal;

    class HomeController {

        public function index() {
            dd('HOME - INDEX');
        }

        public function show($request) {
            dd($request->next);
        }

    }