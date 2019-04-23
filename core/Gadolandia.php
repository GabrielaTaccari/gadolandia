<?php

namespace core;

class Gadolandia {

    private $action;

    private $controller;

    private $controllerName;

    private $url = array();

    private $params = array();

    private $not_found = '/core/include/404.php';

    public function __construct()
    {
        $this->getUrl();

        if (!$this->controller){
            $this->controllerName = 'home';
            $this->controller     = 'home-controller';
            $this->action = 'index';
        } 

        if (!file_exists(ABS_PATH . '/app/controller/' . $this->controller . '.php')) {
            require_once ABS_PATH . $this->not_found;
            return;
        }

        require_once ABS_PATH . '/app/controller/' . $this->controller . '.php';

        $this->controller = preg_replace('/[^a-zA-Z]/i', '', $this->controller);

        if (!class_exists($this->controller)) {
            require_once ABS_PATH . $this->not_found;
            return;
        }

        $this->controller = new $this->controller($this->params, $this->controllerName, $this->action);
        $this->controller->url  = HOME_URI;
        $this->controller->path = ABS_PATH;

        // Remove caracteres inválidos do nome da ação (método)
        $this->action = preg_replace('/[^a-zA-Z]/i', '', $this->action);

        // Se o método indicado existir, executa o método e envia os parâmetros
        if (method_exists($this->controller, $this->action)) {
            $method = new \ReflectionMethod($this->controller, $this->action);
            if ($method->isPublic()) {
                $this->controller->{$this->action}($this->params);
                return;
            }
        }

        // Sem ação, chamamos o método index
        if (!$this->action && method_exists($this->controller, 'index')) {
            $this->controller->index($this->params);
            return;
        }

        
    }

    public function getUrl()
    {
        if (isset($_GET['path'])) {

            $path = $_GET['path'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/', $path);

            $this->url            = $path;
            $this->controllerName = chk_array($path, 0);
            $this->controller     = $this->controllerName . '-controller';
            $this->action         = chk_array($path, 1);
            

            if (chk_array($path, 2)) {
                unset($path[0]);
                unset($path[1]);

                $this->parametros = array_values($path);
            }
        }
    }

}
    
 