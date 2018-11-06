<?php

/**
*  
*/
require_once "conexion.php";

class GestorLotaipModel
{

	public function mostrarLotaipModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_id_annio_lotaip, bbh_annio_lotaip, bbh_descripcion_lotaip, bbh_usuario_id FROM  $tabla ORDER BY bbh_annio_lotaip DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();	

		$stmt -> close();


	}//mostrarLotaipModel


	public function creaNuevoAnnioModel($datos, $idUser, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_annio_lotaip, bbh_descripcion_lotaip, bbh_usuario_id)VALUES(:annio, :annio, :idUser)");

		$stmt -> bindParam(":annio", $datos, PDO::PARAM_STR);
		$stmt -> bindParam(":idUser", $idUser, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//creaNuevoAnnioModel
	

	public function maxIdLotaipModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT MAX(bbh_id_annio_lotaip) as max	FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();	

		$stmt -> close();


	}//maxIdLotaipModel


	public function creaNuevoMesModel($mes, $datos, $idUser, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_mes_lotaip, bbh_descripcion_mes_lotaip, bbh_annio_id_lotaip, bbh_usuario_id)VALUES(:mes, :mes, :annio, :idUser)");

		$stmt -> bindParam(":mes", $mes, PDO::PARAM_STR);
		$stmt -> bindParam(":annio", $datos, PDO::PARAM_STR);
		$stmt -> bindParam(":idUser", $idUser, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//creaNuevoMesModel


	public function mostrarMesesModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_id_mes_lotaip, bbh_mes_lotaip, bbh_descripcion_mes_lotaip, bbh_annio_id_lotaip, bbh_usuario_id FROM lotaip_mes WHERE bbh_annio_id_lotaip = :annio");

		$stmt -> bindParam(":annio", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();	

		$stmt -> close();

	}//mostrarMesesModel


	public function ultimoAnnioModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_id_annio_lotaip, bbh_annio_lotaip, bbh_descripcion_lotaip, bbh_usuario_id FROM $tabla WHERE bbh_annio_lotaip =  :annio");

		$stmt -> bindParam(":annio", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();	

		$stmt -> close();

	}//ultimoAnnioModel


	public function mostrarLiteralesModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_id_literales_lotaip, bbh_literal, bbh_descipcion_literal, bbh_enlace, bbh_mes_id_lotaip, bbh_usuario_id, bbh_fecha_creacion FROM $tabla WHERE bbh_mes_id_lotaip =  :mes");

		$stmt -> bindParam(":mes", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();	

		$stmt -> close();

	}//mostrarLiteralesModel


	public function guardarLiteralModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_literal, bbh_descipcion_literal, bbh_enlace, bbh_mes_id_lotaip, bbh_fecha_creacion) 
														VALUES (:literal, :literal, :enlace, :idmes, CURRENT_TIMESTAMP())");

		$stmt -> bindParam(":literal", $datos['Descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":enlace", $datos['url'], PDO::PARAM_STR);
		$stmt -> bindParam(":idmes", $datos['idmes'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarLiteralModel


	public function eliminarLiteralModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM lotaip_literales WHERE bbh_id_literales_lotaip = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}


	}


	public function editarLiteralModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_literal = :literal , bbh_descipcion_literal = :literal , bbh_enlace = :enlace WHERE bbh_id_literales_lotaip = :idmes");

		$stmt -> bindParam(":literal", $datos['Descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":enlace", $datos['url'], PDO::PARAM_STR);
		$stmt -> bindParam(":idmes", $datos['idmes'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//editarLiteralModel

}//GestorLotaipModel