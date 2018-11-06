<?php  

require_once "../../models/getorrendicion.php";
require_once "../../controllers/getorrendicion.php";

/**
* para controlar el slide
*/
class Ajax
{

	public $idrendicion;
	public function eliminarRendicionAjax(){

		$datos = $this->idrendicion;

		$respuesta = GestorRendicion::eliminarRendicionController($datos);
		echo $respuesta;

	}//eliminarRendicionAjax


}//Ajax


if (isset($_POST["idrendicion"])) {

	$a = new Ajax();
	$a -> idrendicion = $_POST["idrendicion"];
	$a -> eliminarRendicionAjax();

}