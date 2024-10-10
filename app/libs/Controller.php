<?php

namespace Sena\libs;

class Controller{
    public function view($view, $layout){
        ob_start();
        $view = $view .'.view';
        if (file_exists('../app/views/'.$view.'.php')) {
            require_once('../app/views/'.$view.'.php');
            $contend = ob_get_clean();
            require_once('../app/views/layout/'.$layout.'.layout.php');
        }else{
            die("la vista $view no existe");
        }

    }
}