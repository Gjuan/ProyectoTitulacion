<?php

/**
*  
*/
require_once "conexion.php";

class GestorCategoriaModel
{
	

	public function mostrarCategoriaModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_id_categoria,bbh_categoria FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();


	}//mostrarNoticiaVistaModel

	


}