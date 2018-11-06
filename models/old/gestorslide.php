<?php

/**
*  
*/
require_once "conexion.php";

class GestorSlideModel
{
	
	public function subirImagenSlideModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_imagen)VALUES(:ruta)");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}//subirImagenSlideModel


	public function mostrarImagenSlideModel($datos, $tabla ){
		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_idbanner, bbh_imagen, bbh_orden FROM $tabla where bbh_imagen = :ruta");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();
	}//mostrarImagenSlideModel


	public function mostrarImagenVistaModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_idbanner, bbh_imagen, bbh_orden FROM $tabla ORDER BY bbh_orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();


	}//mostrarImagenVistaModel



	#ELIMINAR ITEM DEL SLIDE

	public function eliminarSlideModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idbanner = :id");
		$stmt -> bindParam(":id", $datos['idSlide'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//eliminarSlideModel


	public function mostrarImagenVistaSlideModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_idbanner, bbh_imagen, bbh_orden FROM $tabla ORDER BY bbh_orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();


	}//mostrarImagenVistaModel


	public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_orden = :orden WHERE bbh_idbanner = :id");
		$stmt -> bindParam(":orden", $datos['ordenItem'], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos['ordenSlide'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}


}