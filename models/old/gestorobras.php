<?php
require_once "conexion.php";
/**
* 
*/
class GestorObrasModel{

	public function guardarObrasModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO obras (bbh_obra, bbh_obradescripcion, bbh_sector_obra, bbh_estado_obra, bbh_fecha_inicio, bbh_fecha_fin, bbh_galeria, bbh_video, bbh_contenido, bbh_id_usuario, bbh_fecha_ingreao, bbh_estado)VALUES(:obra, :descripcion, :sector, :estadoObra, :fechain, :fechaFin, :galeria, :video, :contenido, :usuario,  CURRENT_TIMESTAMP(), :estado)");

		$stmt -> bindParam(":obra", $datos['obra'], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":sector", $datos['sector'], PDO::PARAM_STR);
		$stmt -> bindParam(":estadoObra", $datos['estadoObra'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechain", $datos['fechaInicio'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaFin", $datos['fechaFin'], PDO::PARAM_STR);
		$stmt -> bindParam(":galeria", $datos['galeria'], PDO::PARAM_STR);
		$stmt -> bindParam(":video", $datos['video'], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datos['contenido'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datos['guardarComo'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarArticulosModel


	public function mostrarObrasModell($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idobra, bbh_obra, bbh_estado_obra, EstadoAbance,bbh_fecha_inicio, bbh_fecha_fin, bbh_estado, EstadoPublicado, users, bbh_galeria FROM $tabla ");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//mostrarObrasModell


	public function eliminarObrasModell($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idobra = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}
	
		$stmt -> close();

	}//eliminarObrasModell


	public function editorObraModell($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idobra, bbh_obra, bbh_obradescripcion, bbh_sector_obra, bbh_estado_obra, bbh_fecha_inicio, bbh_fecha_fin, bbh_galeria, bbh_video, bbh_contenido, bbh_id_usuario, bbh_fecha_ingreao, bbh_estado FROM $tabla WHERE bbh_idobra = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();

	}//editorObraModell


	public function updateObraModell($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_obra = :obra , bbh_obradescripcion = :descripcion, bbh_sector_obra = :sector , bbh_estado_obra = :estadoObra , bbh_fecha_inicio = :fechain, bbh_fecha_fin = :fechaFin , bbh_galeria = :galeria , bbh_video = :video , bbh_contenido = :contenido , bbh_id_usuario = :usuario , bbh_estado = :estado WHERE	bbh_idobra = :id");

		$stmt -> bindParam(":obra", $datos['obra'], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":sector", $datos['sector'], PDO::PARAM_STR);
		$stmt -> bindParam(":estadoObra", $datos['estadoObra'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechain", $datos['fechaInicio'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaFin", $datos['fechaFin'], PDO::PARAM_STR);
		$stmt -> bindParam(":galeria", $datos['galeria'], PDO::PARAM_STR);
		$stmt -> bindParam(":video", $datos['video'], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datos['contenido'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datos['guardarComo'], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos['idobra'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarArticulosModel

}//GestorObrasModel