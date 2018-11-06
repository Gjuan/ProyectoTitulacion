<?php  

require_once "../../controllers/gestorapariencia.php";

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


}//Ajax

#OBEJTOS

if (isset($_FILES['imagen']['tmp_name'])) {

	$a = new Ajax();
	$a -> imagen = $_FILES['imagen']['tmp_name'];
	$a -> id = $_POST["id"];
	$a -> gestorBannerAjax();

}