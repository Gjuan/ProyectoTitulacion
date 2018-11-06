<?php

/**
*  
*/
require_once "conexion.php";

class GestorMenupModel
{

	public function menuPrincipalModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idmenu, bbh_descripcion, bbh_tipo, bbh_url, bbh_orden FROM $tabla WHERE bbh_estado = 'A'  ORDER BY	bbh_orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();	

		$stmt -> close();


	}//menuPrincipalModel

	public function aggMenuModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_descripcion, bbh_url, bbh_tipo, bbh_estado, bbh_titulo, bbh_contenido)VALUES(:Descripcion, :URL, :tipemenu, :estadomenu, :tmenu, :contendest)");

		$stmt -> bindParam(":tipemenu", $datos['tipemenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":Descripcion", $datos['Descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":URL", $datos['URL'], PDO::PARAM_STR);
		$stmt -> bindParam(":tmenu", $datos['tmenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":contendest", $datos['contendest'], PDO::PARAM_STR);
		$stmt -> bindParam(":estadomenu", $datos['estadomenu'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarArticulosModel


	public function editPrincipalMenuModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idmenu, bbh_descripcion, bbh_url, bbh_tipo, bbh_estado, bbh_titulo, bbh_contenido, bbh_orden FROM $tabla WHERE bbh_idmenu = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();	

		$stmt -> close();


	}//editPrincipalMenuModel

	public function dropPrincipalMenuModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idmenu = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();


	}//dropPrincipalMenuModel	

	public function upMenuModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla
													SET
													bbh_descripcion = :Descripcion , 
													bbh_url = :URL , 
													bbh_tipo = :tipemenu , 
													bbh_estado = :estadomenu , 
													bbh_titulo = :tmenu, 
													bbh_contenido = :contendest
													WHERE
													bbh_idmenu = :id_menu");

		$stmt -> bindParam(":tipemenu", $datos['tipemenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":Descripcion", $datos['Descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":URL", $datos['URL'], PDO::PARAM_STR);
		$stmt -> bindParam(":tmenu", $datos['tmenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":contendest", $datos['contendest'], PDO::PARAM_STR);
		$stmt -> bindParam(":estadomenu", $datos['estadomenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":id_menu", $datos['id_menu'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarArticulosModel


	public function callSubmenuPrincipalModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idsubmenu, bbh_subdescripcion, bbh_suburl, bbh_subposicion, bbh_subtipo, bbh_subestado, bbh_idmenu FROM $tabla WHERE bbh_idmenu = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();	

		$stmt -> close();

	}//callSubmenuPrincipalModel

	public function aggSubMenuModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_subdescripcion, bbh_suburl, bbh_subestado, bbh_idmenu)VALUES(:SubDescripcion, :SubURL, :estadomenu, :idmenu)");

		$stmt -> bindParam(":SubDescripcion", $datos['SubDescripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":SubURL", $datos['SubURL'], PDO::PARAM_STR);
		$stmt -> bindParam(":estadomenu", $datos['estadomenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":idmenu", $datos['idmenu'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//aggSubMenuModel

	public function dropSecundarioMenuModell($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idsubmenu = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//dropSecundarioMenuModell	

	public function upSecundarioMenuModell($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idsubmenu, bbh_subdescripcion, bbh_suburl, bbh_subestado, bbh_idmenu FROM $tabla WHERE bbh_idsubmenu =:id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();	

		$stmt -> close();


	}//upSecundarioMenuModell

	public function uppSubMenuModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_subdescripcion = :SubDescripcion, bbh_suburl = :SubURL, bbh_subestado = :estadomenu WHERE bbh_idsubmenu = :idmenu");

		$stmt -> bindParam(":SubDescripcion", $datos['SubDescripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":SubURL", $datos['SubURL'], PDO::PARAM_STR);
		$stmt -> bindParam(":estadomenu", $datos['estadomenu'], PDO::PARAM_STR);
		$stmt -> bindParam(":idmenu", $datos['idmenu'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//uppSubMenuModel

	public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_orden = :orden WHERE bbh_idmenu = :id");
		$stmt -> bindParam(":orden", $datos['ordenItem'], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos['ordenSlide'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}
	
}//GestorMenupModel