<?php
require_once "../../models/gestorusuario.php";
require_once "../../controllers/gestorusuario.php";
/**
* METODOS
*/
class Ajax{

	public $idUsuario;
	public function gestorEliminarUsuarioAjax(){

		$datos = $this->idUsuario;

		$respuesta = gestorUsuarios::eliminarUsuarioController($datos);
		echo $respuesta;

	}//gestorEliminarUsuarioAjax



	public $idCuestionario;
	public function dorpRegistro(){

		$datos = $this->idCuestionario;

		$respuesta = gestorUsuarios::dropRegistroController($datos);
		
		echo $respuesta;

	}//dorpRegistro		


	public $id_desac_Cuestionario;
	public function DesactRegistro(){

		$datos = $this->id_desac_Cuestionario;

		$respuesta = gestorUsuarios::desactRegistroController($datos);
		
		echo $respuesta;

	}//DesactRegistro	

	public $id_act_Cuestionario;
	public function ActtRegistro(){

		$datos = $this->id_act_Cuestionario;

		$respuesta = gestorUsuarios::acttRegistroController($datos);
		
		echo $respuesta;

	}//ActtRegistro				

}//Ajax

###########OBJETOS

if (isset($_POST["idUsuario"])) {
	
	$c = new Ajax();
	$c -> idUsuario = $_POST["idUsuario"];
	$c -> gestorEliminarUsuarioAjax();
}

if (isset($_POST["id_desac_Cuestionario"])) {
	
	$c = new Ajax();
	$c -> id_desac_Cuestionario = $_POST["id_desac_Cuestionario"];
	$c -> DesactRegistro();
}

if (isset($_POST["id_act_Cuestionario"])) {
	
	$c = new Ajax();
	$c -> id_act_Cuestionario = $_POST["id_act_Cuestionario"];
	$c -> ActtRegistro();
}

if (isset($_POST["idCuestionario"])) {
	
	$b = new Ajax();
	$b -> idCuestionario 	= $_POST["idCuestionario"];
	$b -> dorpRegistro();

}