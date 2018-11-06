<?php  

require_once "../../models/gestorslide.php";
require_once "../../controllers/gestorslide.php";

/**
* para controlar el slide
*/
class Ajax
{
	
	public $nombreImagen;
	public $imagenTemporal;

	public function gestorSlideAjax(){

		$datos = array("nombreImagen"=>$this->nombreImagen, "imagenTemporal"=>$this->imagenTemporal);

		$respuesta = GestorSlide::mostrarImagenController($datos);

		echo $respuesta;

	}//gestorSlideAjax


	#Eliminar item Slide

	public $idSlide;
	public $rutaSlide;

	public function eliminarSlideAjax(){

		$datos = array("idSlide"=>$this->idSlide, "rutaSlide"=>$this->rutaSlide);

		$respuesta = GestorSlide::eliminarSlideController($datos);

		echo $respuesta;

	}//eliminarSlideAjax


	public $actualizarOrdenSlide;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){

		$datos = array("ordenSlide"=>$this->actualizarOrdenSlide, "ordenItem"=>$this->actualizarOrdenItem);

		$respuesta = GestorSlide::actualizarOrdenController($datos);

		echo $respuesta;

	}//actualizarOrdenAjax

	
}

#OBEJTOS

if (isset($_FILES['imagen']['name'])) {

	$a = new Ajax();
	$a -> nombreImagen = $_FILES['imagen']['name'];
	$a -> imagenTemporal = $_FILES['imagen']['tmp_name'];
	$a -> gestorSlideAjax();

}


if (isset($_POST["idSlide"])) {
	
	$b = new Ajax();
	$b -> idSlide = $_POST["idSlide"];
	$b -> rutaSlide = $_POST["rutaSlide"];
	$b -> eliminarSlideAjax();

}


if (isset($_POST["actualizarOrdenSlide"])) {
	
	$c = new Ajax();
	$c -> actualizarOrdenSlide 	= $_POST["actualizarOrdenSlide"];
	$c -> actualizarOrdenItem 	= $_POST["actualizarOrdenItem"];
	$c -> actualizarOrdenAjax();

}