<?php 

namespace core;

    class Reflection {

        private $reflection;

        public function __construct($object) {

            $this->reflection = new \ReflectionObject($object);

        }

        private function getNamespace() {

            return  $this->reflection->getNamespaceName();

        }

        public function getFolder() {

            $namespace = $this->getNamespace($this->reflection);

            $explode = explode('\\', $namespace);


            return array_pop($explode);

        }

        public function methods() {



        }

    }