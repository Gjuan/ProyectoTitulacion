<?php  

require_once "../../models/gestorbanner.php";
require_once "../../controllers/gestorbanner.php";

/**
* para controlar el slide
*/
class Ajax
{
	
	public $imagen;
	public $id;

	public function gestorBannerAjax(){

		$datos = array("imagen"=>$this->imagen, "id"=>$this->id);

		$respuesta = GestorBannerController::mostrarImagenController($datos);

		echo $respuesta;

	}//gestorBannerAjax


	public $idSlide;
	public function eliminarBannerAjax(){

		$datos = $this->idSlide;

		$respuesta = GestorBannerController::eliminarBannerController($datos);
		echo $respuesta;

	}//eliminarBannerAjax


}//Ajax

#OBEJTOS

if (isset($_FILES['imagen']['tmp_name'])) {

	$a = new Ajax();
	$a -> imagen = $_FILES['imagen']['tmp_name'];
	$a -> id = $_POST["id"];
	$a -> gestorBannerAjax();

}

if (isset($_POST["idSlide"])) {

	$a = new Ajax();
	$a -> idSlide = $_POST["idSlide"];
	$a -> eliminarBannerAjax();

}