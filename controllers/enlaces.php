<?php

/**
* 
*/
class Enlaces
{
	
	public function enlacesController()	{
		
		if(isset($_GET['action'])){

			$path = explode("/", $_GET['action']);
			$enlaces = $path[0];
			if (!isset($_SESSION)) {
  				session_start();
			}
			if (isset($path[1])) {
				$_SESSION['id_c']=$path[1];
			}


		}else{
			$enlaces = "login";
		}

		$respuesta = EnlacesModels::enlacesModel($enlaces);

		include $respuesta;

	}
 

}