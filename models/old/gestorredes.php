<?php

/**
*  
*/
require_once "conexion.php";

class GestorRedesSocialesModell
{


	public function lestaRedesModell($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_red_id, bbh_nombre_red, bbh_url_red FROM $tabla ");
	
		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//lestaRedesModell

	public function updateRedModell($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_url_red = :valor WHERE bbh_nombre_red = :idRed");
		
		$stmt -> bindParam(":valor", $datos['valor'], PDO::PARAM_STR);

		$stmt -> bindParam(":idRed", $datos['idRed'], PDO::PARAM_STR);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";
			
		}

		$stmt -> close();

	}

}//GestorRedesSocialesModell