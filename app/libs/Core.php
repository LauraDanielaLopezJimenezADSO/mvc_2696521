<?php

namespace Sena\libs;

class Core{
    protected $controller = 'mainController';
    protected $method = 'index';
    protected $parameters = [];

    public function __construct(){
        $url = $this->getURL();
        if ($url != "" && file_exists('../app/controllers/'.ucwords($url[0]) . 'controller.php')) {
            $this->controller = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }
        $obj = $this->controller;
        $obj = 'Sena\\controllers\\'.$this->controller;
        $this->controller = new $obj;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            }else{
                die("el metodo solicitado no fue programado");
            }
        }
        // print_r($method);

        $this->parameters = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->parameters);
    }

    public function getURL(){
        // var_dump($_GET['url']);
        $url = "";
        if (isset(($_GET['url']))) {
            //eliminamos el ultimo caracter de la url
            $url = rtrim($_GET['url'], '/');

            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url );
        }
        return $url;
    }
}

