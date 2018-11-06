<?php
require_once "../../models/gestoreventos.php";
require_once "../../controllers/gestoreventos.php";
/**
* METODOS
*/

class Ajax{

	public $imagenTemporal1;
	public function gestorGaleriaAjax(){

		$datos = $this->imagenTemporal1;

		$respuesta = GestorEventoController::mostrarImagenController1($datos);
		echo $respuesta;

	}//gestorArticulosAjax


	public $idGaleria;
	public $rutaGaleria;
	public function eliminarImagenGaleriaAjax(){

		$datos = array("idGaleria"=>$this->idGaleria, "rutaGaleria"=>$this->rutaGaleria);

		$respuesta = GestorEventoController::eliminarImagenGaleriaController1($datos);
		echo $respuesta;

	}//eliminarImagenGaleriaAjax

	public $eventoId;
	public function eliminarEventoAjax(){

		$datos = $this->eventoId;

		$respuesta = GestorEventoController::eliminarEventoController($datos);
		echo $respuesta;

	}//eliminarEventoAjax


	public $editEventoValor;
	public function actualizarEventoAjax(){

		$datos = $this->editEventoValor;

		$respuesta = GestorEventoController::consultaEventoController($datos);
		echo $respuesta;

	}//actualizarEventoAjax


	public $imagenTemporal2;
	public $idevento;
	public function resubirGaleriaAjax(){

		$datos = array("imagenTemporal2"=>$this->imagenTemporal2, "idevento"=>$this->idevento);

		$respuesta = GestorEventoController::reUpGaleriaImagenController1($datos);
		echo $respuesta;

	}//resubirGaleriaAjax

}//Ajax


###########OBJETOS

if (isset($_FILES["imagen1"]["tmp_name"])) {
	
	$a = new Ajax();
	$a -> imagenTemporal1 = $_FILES["imagen1"]["tmp_name"];
	$a -> gestorGaleriaAjax();

}


if (isset($_POST["idGaleria"])) {
	
	$b = new Ajax();
	$b -> idGaleria = $_POST["idGaleria"];
	$b -> rutaGaleria = $_POST["rutaGaleria"];
	$b -> eliminarImagenGaleriaAjax();

}


if (isset($_POST["eventoId"])) {
	
	$c = new Ajax();
	$c -> eventoId = $_POST["eventoId"];
	$c -> eliminarEventoAjax();

}


if (isset($_POST["editEventoValor"])) {
	
	$d = new Ajax();
	$d -> editEventoValor = $_POST["editEventoValor"];
	$d -> actualizarEventoAjax();

}


if (isset($_FILES["imagen2"]["tmp_name"])) {
	
	$e = new Ajax();
	$e -> imagenTemporal2 = $_FILES["imagen2"]["tmp_name"];
	$e -> idevento = $_POST["idevento"];
	$e -> resubirGaleriaAjax();

}
