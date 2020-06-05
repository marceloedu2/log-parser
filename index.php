<?php
session_start();//carrega as classes
/**
 * autoload que carrega as classes automatico dento dos arquivos sempre que for instanciada a classe
 */
spl_autoload_register(function($class){

    if(file_exists('controllers/'.$class.'.php')){
		require 'controllers/'.$class.'.php';
	}
	else if(file_exists('models/'.$class.'.php')){
		require 'models/'.$class.'.php';
	}
	else if (file_exists('core/'.$class.'.php')){
		require 'core/'.$class.'.php';
    }
    
});

$core = new Core();
$core->run();