<?php

class homeController extends controller{
	//função que será carregada ao acessar a página index.
	public function index() {
		//instancia o arquivo.log
		$fireLog = new parser();
    	$fireLog = $fireLog->dados;
        //chamo a view navForm dentro da view home
		$this->loadView('navForm', $fireLog);
	}
	
}

?>