<?php
require_once "../../models/gestorradio.php";
require_once "../../controllers/gestorradio.php";
/**
* METODOS
*/
class Ajax{


	public $imagenradio;

	public function gestorImagenRadioAjax(){

		$datos = array("imagenradio"=>$this->imagenradio);

		$respuesta = GestorRadio::mostrarImagenRadioController($datos);

		echo $respuesta;

	}//gestorImagenNoticiaAjax

	public $idImagenRadio;

	public function eliminarImagenCarpetaAjax(){

		$datos = $this->idImagenRadio;

		$respuesta = GestorRadio::eliminarImagenCarpetaController($datos);

		echo $respuesta;

	}//eliminarImagenCarpetaAjax


	public $audioId;
	public $audioImagen;
	public function eliminarAudioAjax(){

		
		$datos = array("audioId"=>$this->audioId, "audioImagen"=>$this->audioImagen);
		$respuesta = GestorRadio::eliminarAudioController($datos);
		echo $respuesta;

	}//eliminarAudioAjax


	public $editRadioValor;
	public function editarItemRadioAjax(){

		$datos = $this->editRadioValor;

		$respuesta = GestorRadio::editarItemRadioController($datos);

		echo $respuesta;

	}//editarItemRadioAjax

}//Ajax

###########OBJETOS

if (isset($_FILES['imagenradio']['tmp_name'])) {

	$a = new Ajax();
	$a -> imagenradio = $_FILES['imagenradio']['tmp_name'];
	$a -> gestorImagenRadioAjax();

}

if (isset($_POST["idImagenRadio"])) {
	
	$b = new Ajax();
	$b -> idImagenRadio = $_POST["idImagenRadio"];
	$b -> eliminarImagenCarpetaAjax();

}

if (isset($_POST["audioId"])) {
	
	$b = new Ajax();
	$b -> audioId = $_POST["audioId"];
	$b -> audioImagen = $_POST["audioImagen"];
	$b -> eliminarAudioAjax();
}

if (isset($_POST["editRadioValor"])) {
	
	$b = new Ajax();
	$b -> editRadioValor = $_POST["editRadioValor"];
	$b -> editarItemRadioAjax();

}