<?php

/**
* 
*/
class TemplateController{
	
	public function template(){
		
		//include 'views/template.php';

		if(isset($_GET['action'])){

			$path = explode("/", $_GET['action']);

			$enlaces = $path[0];

				if ($enlaces == 'get_datos_login') {
					include 'views/template1.php';		
				}else if($enlaces == 'get_datos_in_post'){
					include 'views/template1.php';
				}else if($enlaces == 'get_show_datos'){
					include 'views/template1.php';
				}else if($enlaces == 'get_show_preguntas'){
					include 'views/template1.php';
				}else if($enlaces == 'get_show_act'){
					include 'views/template1.php';
				}else if($enlaces == 'get_datos_puntos'){
					include 'views/template1.php';
				}else if($enlaces == 'prueba'){
					include 'views/template1.php';	
				
				}else{
					include 'views/template.php';
				}
		
		}else{
			include 'views/template.php';
		}


	}//template
	
}//TemplateController