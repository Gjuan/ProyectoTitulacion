<?php
require_once "../../models/gestorlotaip.php";
require_once "../../controllers/gestorlotaip.php";
/**
* METODOS
*/
class Ajax{

	public $annio;
	public function creaNuevoAnnio(){

		$datos = $this->annio;

		$respuesta = GestorLotaipController::creaNuevoAnnioController($datos);

		echo $respuesta;

	}//creaNuevoAnnio


	public $annio1;
	public function verAnnio(){

		$datos = $this->annio1;

		$respuesta = GestorLotaipController::mostrarAnnioActual($datos);

		echo $respuesta;

	}//verAnnio

	public $idItemLotaip;
	public function eliminarItem(){

		$datos = $this->idItemLotaip;

		$respuesta = GestorLotaipController::eliminarLiteral($datos);

		echo $respuesta;

	}//eliminarItem

}//Ajax


if (isset($_POST["annio"])) {

	$a = new Ajax();
	$a -> annio = $_POST["annio"];
	$a -> creaNuevoAnnio();

}


if (isset($_POST["annio1"])) {

	$a = new Ajax();
	$a -> annio1 = $_POST["annio1"];
	$a -> verAnnio();

}


if (isset($_POST["idItemLotaip"])) {

	$a = new Ajax();
	$a -> idItemLotaip = $_POST["idItemLotaip"];
	$a -> eliminarItem();

}