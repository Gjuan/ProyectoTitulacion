<?php
require_once "../../models/gestornoticias.php";
require_once "../../controllers/gestornoticias.php";
/**
* METODOS
*/
class Ajax{
	
	public $nombreImagen;
	public $imagenTemporal;

	public function gestorImagenNoticiaAjax(){

		$datos = array("nombreImagen"=>$this->nombreImagen, "imagenTemporal"=>$this->imagenTemporal);

		$respuesta = GestorArticulos::mostrarImagenNoticiaController($datos);

		echo $respuesta;

	}//gestorImagenNoticiaAjax


	public $idImagenNoticia;

	public function eliminarImagenCarpetaAjax(){

		$datos = $this->idImagenNoticia;

		$respuesta = GestorArticulos::eliminarImagenCarpetaController($datos);

		echo $respuesta;

	}//eliminarImagenCarpetaAjax


	// public $imagenTemporal;
	// public function gestorArticulosAjax(){

	// 	$datos = $this->imagenTemporal;

	// 	$respuesta = GestorArticulos::mostrarImagenController($datos);
	// 	echo $respuesta;

	// }//gestorArticulosAjax


	public $noticiavalor;
	public $noticiagaleria;
	public function eliminarArticulosAjax(){

		
		$datos = array("noticiavalor"=>$this->noticiavalor, "noticiagaleria"=>$this->noticiagaleria);

		$respuesta = GestorArticulos::eliminarArticuloController($datos);
		echo $respuesta;

	}//gestorArticulosAjax


	public $editNoticiaValor;
	public function editarArticulosAjax(){

		$datos = $this->editNoticiaValor;

		$respuesta = GestorArticulos::editarArticuloController($datos);
		echo $respuesta;

	}//gestorArticulosAjax


}//Ajax

###########OBJETOS

if (isset($_FILES['imagen1']['name'])) {

	$a = new Ajax();
	$a -> nombreImagen = $_FILES['imagen1']['name'];
	$a -> imagenTemporal = $_FILES['imagen1']['tmp_name'];
	$a -> gestorImagenNoticiaAjax();

}

// if (isset($_FILES["imagen"]["tmp_name"])) {
	
// 	$a = new Ajax();
// 	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
// 	$a -> gestorArticulosAjax();
// }

if (isset($_POST["idImagenNoticia"])) {
	
	$b = new Ajax();
	$b -> idImagenNoticia = $_POST["idImagenNoticia"];
	$b -> eliminarImagenCarpetaAjax();

}

if (isset($_POST["noticiavalor"])) {
	
	$b = new Ajax();
	$b -> noticiavalor = $_POST["noticiavalor"];
	$b -> noticiagaleria = $_POST["noticiagaleria"];
	$b -> eliminarArticulosAjax();
}


if (isset($_POST["editNoticiaValor"])) {
	
	$c = new Ajax();
	$c -> editNoticiaValor = $_POST["editNoticiaValor"];
	$c -> editarArticulosAjax();
}