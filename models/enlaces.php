<?php

/**
* 
*/
class EnlacesModels
{
	
	public function enlacesModel($enlaces)
	{
		if ($enlaces == "inicio" || 
			$enlaces == "usuarios" ||
			$enlaces == "salir" ||
			$enlaces == "nuevousuario" ||			
			$enlaces == "remote" ||			
			$enlaces == "listausuario" ||
			$enlaces == "get_show_act" ||
			$enlaces == "get_show_preguntas" ||
			$enlaces == "get_datos_puntos" ||
			$enlaces == "get_datos_puntos1" ||
			$enlaces == "mapa" ||
			$enlaces == "mapa2" ||
			$enlaces == "get_show_datos" || 
			$enlaces == "get_datos_in_post" ||
			$enlaces == "get_datos_login" ||
			$enlaces == "tabulacion" ||
			$enlaces == "prueba" ||
			$enlaces == "tab"||
			$enlaces == "verificar"||
			$enlaces == "votos"||
			$enlaces == "juntas"||
			$enlaces == "exportar"||
			$enlaces == "ctl_reporte"||
			$enlaces == "ctl_parroquia"||
			$enlaces == "ctl_recinto"||
			$enlaces == "ctl_canton"||
			$enlaces == "lis_proyecto"||
			$enlaces == "lisuser_proyecto"||
			$enlaces == "new_cat"||
			$enlaces == "lis_cat"||
			$enlaces == "lissub_cat"||
			$enlaces == "lis_evidencia"||
			$enlaces == "new_subcat"||
			$enlaces == "reportegeneral"||
			$enlaces == "userreporte"||
			$enlaces == "lis_user_proyecto"||
			$enlaces == "reporteporusuario"||
			$enlaces == "new_proyecto"   ) {
			
			$module = "views/modulos/".$enlaces.".php";

		}else if ($enlaces == "index") {
			
			$module = "views/modulos/index.php";
	
		}else if ($enlaces == "cuestionario") {

			$module = "views/modulos/ec_lista_cuestionario.php";

		}else{

			$module = "views/modulos/login.php";

		}

		return $module;
	}

}