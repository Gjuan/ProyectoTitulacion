<?php

/**
*  
*/
require_once "conexion.php";

class GestorBannerModell
{
	

	public function subirImagenSlideModel($imagen, $id, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_imagen_sec = :imagen WHERE bbh_seccion = :id");

		$stmt -> bindParam(":imagen", $imagen, PDO::PARAM_STR);

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();


	}//subirImagenSlideModel

	

	public function mostrarImagenSlideModel($datos, $tabla){
		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_imagen_sec FROM seccionbanner WHERE bbh_seccion = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();
	}//mostrarImagenSlideModel


	public function eliminarBannerModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_imagen_sec = '' WHERE bbh_imagen_sec = :imagen");

		$stmt -> bindParam(":imagen", $datos, PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();


	}//subirImagenSlideModel


}