<?php  

require_once "../../models/gestorobras.php";
require_once "../../controllers/gestorobras.php";

/**
* para controlar el slide
*/
class Ajax
{
	
	public $nombreImagen;
	public $imagenTemporal;

	public function gestorImagenObraAjax(){

		$datos = array("nombreImagen"=>$this->nombreImagen, "imagenTemporal"=>$this->imagenTemporal);

		$respuesta = GestorObras::mostrarImagenObraController($datos);

		echo $respuesta;

	}//gestorImagenObraAjax


	public $idImagenObra;

	public function eliminarImagenCarpetaAjax(){

		$datos = $this->idImagenObra;

		$respuesta = GestorObras::eliminarImagenCarpetaController($datos);

		echo $respuesta;

	}//eliminarImagenCarpetaAjax


	public $eliminarObraId;
	public $galeriaObra;

	public function eliminarObraAjax(){

		$datos = array("eliminarObraId"=>$this->eliminarObraId, "galeriaObra"=>$this->galeriaObra);
		
		$respuesta = GestorObras::eliminarObraController($datos);

		echo $respuesta;

	}//eliminarObraAjax


	public $editarObraValor;

	public function editorObraAjax(){

		$datos = $this->editarObraValor;

		$respuesta = GestorObras::editorObraController($datos);

		echo $respuesta;

	}//editorObraAjax

}//Ajax


#OBEJTOS

if (isset($_FILES['imagen1']['name'])) {

	$a = new Ajax();
	$a -> nombreImagen = $_FILES['imagen1']['name'];
	$a -> imagenTemporal = $_FILES['imagen1']['tmp_name'];
	$a -> gestorImagenObraAjax();

}


if (isset($_POST["idImagenObra"])) {
	
	$b = new Ajax();
	$b -> idImagenObra = $_POST["idImagenObra"];
	$b -> eliminarImagenCarpetaAjax();

}


if (isset($_POST["eliminarObraId"])) {
	
	$b = new Ajax();
	$b -> eliminarObraId = $_POST["eliminarObraId"];
	$b -> galeriaObra = $_POST["galeriaObra"];
	$b -> eliminarObraAjax();

}


if (isset($_POST["editarObraValor"])) {
	
	$b = new Ajax();
	$b -> editarObraValor = $_POST["editarObraValor"];
	$b -> editorObraAjax();

}