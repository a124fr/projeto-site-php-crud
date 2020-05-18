<?php

class Core
{
	public function start($urlGet)
	{
		$controller = 'HomeController';
		$acao = 'index';

		if(isset($urlGet['metodo']))
		{
			$acao = $urlGet['metodo'];
		}

		if(isset($urlGet['pagina']))
		{
			$controller = ucfirst(strtolower($urlGet['pagina'])).'Controller';
		}		

		if(!class_exists($controller))
		{
			$controller = 'ErrorController';
		}		
				
		call_user_func(array(new $controller, $acao), $urlGet);
	}
}