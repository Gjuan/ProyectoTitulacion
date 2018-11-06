<?php  

require_once "../../models/gestorredes.php";
require_once "../../controllers/gestorredes.php";

/**
* para controlar el slide
*/
class Ajax
{
	
	public $idRed;
	public $valor;

	public function updateRed(){

		$datos = array("idRed"=>$this->idRed, "valor"=>$this->valor);

		$respuesta = GestorRedesSociales::updateRed($datos);

		echo $respuesta;

	}//gestorImagenObraAjax

}//Ajax



if (isset($_POST["idRed"])) {
	
	$c = new Ajax();
	$c -> idRed 	= $_POST["idRed"];
	$c -> valor 	= $_POST["valor"];
	$c -> updateRed();

}