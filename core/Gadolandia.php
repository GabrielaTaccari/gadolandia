<?php

namespace Core;

class Gadolandia {

    private $Url;
    private $UrlConjunto; //Url completa
    private $Controller;
    private $Action;
    private $Parameter;
    
    public function __construct() {

        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this -> Url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->UrlConjunto = explode ("/", $this->Url);
            
            if((isset($this -> UrlConjunto[0])) && (isset($this -> UrlConjunto[1]))) {
                $this -> Controller = $this -> UrlConjunto[0];
                $this -> Action = $this -> UrlConjunto[1];

                if(!class_exists($this->Controller)) {
                    $this->Controller = new $this->{$this->Controller.'-controller'};
                    $this->Controller->index();
                }
                
            } else {
                $this -> Controller = 'home';
                $this -> Action = 'index';
                echo "Classe: {$this->Controller} - Metodo: {$this->Action} <br>";
            }
            
        } else{
            $this -> Controller = 'home';
            $this -> Action = 'index';
            echo "Classe: {$this->Controller} - Metodo: {$this->Action} <br>";
        }
    }

    public function carregar () {
        $classe = "\\Sts\Controllers\\".$this->Controller;
        $classecCarregar = new $classe;
        $classecCarregar->index();
    }
}
