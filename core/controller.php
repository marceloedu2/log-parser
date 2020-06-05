<?php

class controller {
    /**
     * carrega a pagina home
     */
    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/home.php';
    }
    /**
     * carrega quaquer pagina que seja referênciada no homeControler
     */
    public function loadPag($viewName, $viewData = array()){
        extract($viewData);
        require './views/'.$viewName.'.php';
    }

}