<?php
require_once "conexion.php";
/**
* 
*/
class GestorRadioModel{
	
	public function guardarRadioModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_titulo_radio, bbh_resumen_radio, bbh_exponente_radio, bbh_imagen_radio, bbh_audio_url, bbh_fecha_ingreso, bbh_usuario_id)
												VALUES (:titulo, :resumen, :Exponente, :imagenes, :urlaudio, :fechaPublicacion, :usuario)");

		$stmt -> bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
		$stmt -> bindParam(":resumen", $datos['resumen'], PDO::PARAM_STR);
		$stmt -> bindParam(":Exponente", $datos['Exponente'], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenes", $datos['imagenes'], PDO::PARAM_STR);
		$stmt -> bindParam(":urlaudio", $datos['urlaudio'], PDO::PARAM_INT);
		$stmt -> bindParam(":fechaPublicacion", $datos['fechaPublicacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarRadioModel


	public function mostrarRadioVistaModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_id_radio ,bbh_titulo_radio, bbh_imagen_radio, bbh_fecha_ingreso, nombres FROM $tabla ORDER BY bbh_fecha_ingreso ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//mostrarRadioVistaModel


	public function eliminarAudioModel($datos,$tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_id_radio = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//eliminarAudioModel


	public function editarItemRadioModel($datos,$tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_titulo_radio, bbh_resumen_radio, bbh_exponente_radio, bbh_imagen_radio, bbh_audio_url FROM $tabla WHERE bbh_id_radio =  :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();	

		$stmt -> close();

	}//editarItemRadioModel


	public function atualizarRadioModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla 
													SET
													bbh_titulo_radio = :titulo , 
													bbh_resumen_radio = :resumen , 
													bbh_exponente_radio = :Exponente , 
													bbh_imagen_radio = :imagenes, 
													bbh_audio_url = :urlaudio, 
													bbh_fecha_ingreso = :fechaPublicacion , 
													bbh_usuario_id = :usuario													
													WHERE
													bbh_id_radio = :id");

		$stmt -> bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
		$stmt -> bindParam(":resumen", $datos['resumen'], PDO::PARAM_STR);
		$stmt -> bindParam(":Exponente", $datos['Exponente'], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenes", $datos['imagenes'], PDO::PARAM_STR);
		$stmt -> bindParam(":urlaudio", $datos['urlaudio'], PDO::PARAM_INT);
		$stmt -> bindParam(":fechaPublicacion", $datos['fechaPublicacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos['idRadio'], PDO::PARAM_INT);
		
		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarRadioModel

}