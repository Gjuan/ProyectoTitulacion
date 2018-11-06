<?php

/**
* 
*/

require_once "conexion.php";

class IngresoModels
{
	

	public function ingresoModel($datosModel,$table)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nick_name =  :usuario");
		$stmt -> bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}//ingresoModel

	
}