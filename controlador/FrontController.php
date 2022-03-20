<?php

class FrontController {
    
    public function ruteo($controlador, $func){
    
        $controlador = (!empty($_REQUEST['c']))?htmlentities($_REQUEST['c']):$controlador;
        $controlador = ucwords(strtolower($controlador))."Controller";
    
        $funcion = (!empty($_REQUEST['f']))?htmlentities($_REQUEST['f']):$func;
    
        require_once './controlador/'.$controlador.'.php';
        $controlador = new $controlador();
        $controlador->$funcion();
    
    }


}
