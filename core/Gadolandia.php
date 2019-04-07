<?php
    namespace Core;
    class Gadolandia {
        private $url;
        private $urlCompleto;
        private $urlController;
        private $urlMetodo;

        public function __construct() {
            if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT)));
            
        }
    }