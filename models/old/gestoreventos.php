<?php
require_once "conexion.php";
/**
* 
*/
class GestorEventoModel{
	

	public function subirImagenEventoModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_imagem)VALUES(:ruta)");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}//subirImagenSlideModel


	public function mostrarImagenEvento($datos, $tabla){
		$stmt = Conexion::conectar()->Prepare("SELECT 	bbh_idgaleria, bbh_imagem FROM $tabla WHERE bbh_imagem = :ruta");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();
	}//mostrarImagenEvento


	public function eliminarImagenGaleriaModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idgaleria = :id");
		$stmt -> bindParam(":id", $datos["idGaleria"], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//eliminarImagenGaleriaModel


	public function guardarImagenGaleriaModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_tituloevento, bbh_fechaevento, bbh_horaevento, bbh_descripcion, bbh_contenido, bbh_usuario, bbh_lugarevento, bbh_estadoevento, bbh_video)VALUES(:tituloEvento, :fechaEvento, :horaEvento, :descripcionEvento, :centenidoEvento, :usuario, :lugarEvento, :estado, :video )");

		$stmt -> bindParam(":tituloEvento", $datos["tituloEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaEvento", $datos["fechaEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":horaEvento", $datos["horaEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcionEvento", $datos["resumenEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":centenidoEvento", $datos["contenidoEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_INT);
		$stmt -> bindParam(":lugarEvento", $datos["lugarEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":video", $datos["Video"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["guardarComo"], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//guardarImagenGaleriaModel


	public function maxImagenGaleriaModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT 	MAX(bbh_idevento) AS idmax FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();

	}//maxImagenGaleriaModel


	public function upIdImagenGaleriaModel($datos, $valor, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_eventosid = $datos WHERE	bbh_idgaleria = $valor");

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}		

		$stmt -> close();

	}//upIdImagenGaleriaModel
	

	public function mostrarEventosVistaModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idevento, bbh_tituloevento, estado, fecha, bbh_horaevento, nombres, estadoevento FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//mostrarEventosVistaModel


	public function eliminarEventoModel($datos, $tabla){
	
		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idevento = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//eliminarEventoModel


	public function eliminarGaleriaEventoModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idgaleria, bbh_imagem FROM $tabla WHERE bbh_eventosid = :id");
		
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		
		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//eliminarGaleriaEventoModel


	public function eliminarBaseGaleriaEventoModel($datos, $tabla){
	
		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idgaleria = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//eliminarBaseGaleriaEventoModel


	public function consultaGaleriaEventoModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idevento, bbh_tituloevento, bbh_fechaevento, bbh_horaevento, bbh_descripcion, bbh_contenido, bbh_galeria, bbh_usuario, bbh_lugarevento, bbh_estadoevento FROM $tabla WHERE bbh_idevento = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();

	}//consultaGaleriaEventoModel


	public function consultaImagenGaleriaEventoModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idgaleria, bbh_imagem, bbh_eventosid FROM $tabla WHERE bbh_eventosid = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//consultaImagenGaleriaEventoModel


	public function resubirImagenEventoModel($datos, $datos2, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_imagem, bbh_eventosid)VALUES(:ruta, :id)");
		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos2, PDO::PARAM_INT);
		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}//subirImagenSlideModel


	public function actualizarEventosModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_tituloevento = :tituloEvento , bbh_fechaevento = :fechaEvento , bbh_horaevento = :horaEvento , bbh_descripcion = :descripcionEvento , bbh_contenido = :centenidoEvento , bbh_usuario = :usuario , bbh_lugarevento = :lugarEvento , bbh_estadoevento = :estado, bbh_video = :video WHERE bbh_idevento = :id");

		$stmt -> bindParam(":tituloEvento", $datos["tituloEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaEvento", $datos["fechaEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":horaEvento", $datos["horaEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcionEvento", $datos["resumenEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":centenidoEvento", $datos["contenidoEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_INT);
		$stmt -> bindParam(":lugarEvento", $datos["lugarEvento"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["guardarComo"], PDO::PARAM_INT);
		$stmt -> bindParam(":video", $datos["Video"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["idevento"], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//actualizarEventosModel


}//GestorEventoModel