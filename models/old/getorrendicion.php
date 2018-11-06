<?php
require_once "conexion.php";

/**
* 
*/
class GestorRendicionModel{
	
	public function guardarRendicionModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_periodo, bbh_url_rendicion)VALUES(:periodo, :url)");

		$stmt -> bindParam(":periodo", $datos['periodo'], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $datos['url'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarRendicionModel


	public function listaRendicionModel($tabla){


		$stmt = Conexion::conectar()->Prepare("SELECT bbh_id_rendicion, bbh_periodo, bbh_url_rendicion FROM $tabla ORDER BY bbh_periodo DESC");

		$stmt -> execute();

		return $stmt -> fetchall();		

		$stmt -> close();

	}//listaRendicionModel


	// public function listaUsuariosModel($tabla){
			
	// 	$stmt = Conexion::conectar()->Prepare("SELECT bbh_idusuario, bbh_usuario, bbh_email, nombres, estado, bloquo, bbh_roll FROM $tabla");

	// 	$stmt -> execute();

	// 	return $stmt -> fetchAll();		

	// 	$stmt -> close();

	// }//listaUsuariosModel


	public function eliminarRendicionModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_id_rendicion = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}//eliminarRendicionModel


	// public function restablecerUsuarioModel($datos, $tabla){

	// 	$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_usuario = bbh_cedula , bbh_pass = MD5(bbh_cedula)	WHERE bbh_idusuario = :id");

	// 	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	// 	if ($stmt -> execute()) {

	// 		return "ok";

	// 	}else{

	// 		return "error";

	// 	}

	// 	$stmt -> close();

	// }//eliminarUsuarioModel


	// public function desbloquearUsuarioModel($datos, $tabla){

	// 	$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_numintentos = 0 WHERE bbh_idusuario = :id");

	// 	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	// 	if ($stmt -> execute()) {

	// 		return "ok";

	// 	}else{

	// 		return "error";

	// 	}

	// 	$stmt -> close();

	// }//desbloquearUsuarioModel


	// public function activarUsuarioModel($datos, $tabla){

	// 	$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_estado = 'A' WHERE bbh_idusuario = :id");

	// 	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	// 	if ($stmt -> execute()) {

	// 		return "ok";

	// 	}else{

	// 		return "error";

	// 	}

	// 	$stmt -> close();		

	// }//activarUsuarioModel


	// public function inactivarUsuarioModel($datos, $tabla){

	// 	$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_estado = 'I' WHERE bbh_idusuario = :id");

	// 	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	// 	if ($stmt -> execute()) {

	// 		return "ok";

	// 	}else{

	// 		return "error";

	// 	}

	// 	$stmt -> close();		

	// }//inactivarUsuarioModel	


	// public function editarUsuarioModel($datos, $tabla){

	// 	$stmt = Conexion::conectar()->Prepare("SELECT bbh_idusuario, bbh_cedula, bbh_nombres, bbh_apellidos, bbh_email, bbh_idroll, bbh_foto, bbh_genero FROM $tabla WHERE bbh_idusuario = :id");

	// 	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	// 	$stmt -> execute();

	// 	return $stmt -> fetch();		

	// 	$stmt -> close();	

	// }//editarUsuarioModel


	// public function actualizarUsuarioModel($datos, $tabla){

	// 	$stmt = Conexion::conectar()->Prepare("UPDATE usuario SET bbh_cedula = :cedula , bbh_nombres = :nombres , bbh_apellidos = :apellidos , bbh_email = :email , bbh_idroll = :roll , bbh_foto = :foto , bbh_genero = :genero WHERE bbh_idusuario = :id");

	// 	$stmt -> bindParam(":cedula", $datos['Cedula'], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":nombres", $datos['Nombres'], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":apellidos", $datos['Apellidos'], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":email", $datos['Email'], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":roll", $datos['Roll'], PDO::PARAM_INT);		
	// 	$stmt -> bindParam(":foto", $datos['imagen'], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":genero", $datos['optionsRadios'], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":id", $datos['id'], PDO::PARAM_INT);
		
	// 	if ($stmt -> execute()) {
	// 		return "ok";
	// 	}else{
	// 		return "error";
	// 	}

	// 	$stmt -> close();

	// }//actualizarUsuarioModel


}//GestorRendicionModel