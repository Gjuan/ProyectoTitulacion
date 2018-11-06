<?php
require_once "../../models/gestormenu.php";
require_once "../../controllers/gestormenu.php";
/**
* METODOS
*/
class Ajax{
	
	public $menuid;
	public function editMenu(){

		$datos = $this->menuid;
		$respuesta = GestorMenuController::editPrincipalMenuController($datos);
		echo $respuesta;

	}//editMenu

	public $dropmenu;
	public function dropMenu(){

		$datos = $this->menu_elim;
		$respuesta = GestorMenuController::dropPrincipalMenuController($datos);
		echo $respuesta;

	}//dropMenu	


	public $submenuid;
	public function callSubMenu(){

		$datos = $this->submenuid;
		$respuesta = GestorMenuController::callSubMenuController($datos);
		echo $respuesta;

	}//callSubMenu	


	public $dropsubmenu;
	public function dropSUBMenu(){

		$datos = $this->dropsubmenu;
		$respuesta = GestorMenuController::dropSecundarioMenuController($datos);
		echo $respuesta;

	}//dropSUBMenu	

	public $uppsubmenu;
	public function UpSUBMenu(){

		$datos = $this->uppsubmenu;
		$respuesta = GestorMenuController::upSecundarioMenuController($datos);
		echo $respuesta;

	}//dropSUBMenu		

	public $actualizarOrdenSlide;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){

		$datos = array("ordenSlide"=>$this->actualizarOrdenSlide, "ordenItem"=>$this->actualizarOrdenItem);

		$respuesta = GestorMenuController::actualizarOrdenController($datos);

		echo $respuesta;

	}//actualizarOrdenAjax

}//AJAX

###########OBJETOS

if (isset($_POST['menuid'])) {
	$a = new Ajax();
	$a -> menuid = $_POST['menuid'];
	$a -> editMenu();
}

if (isset($_POST['menu_elim'])) {
	$b = new Ajax();
	$b -> menu_elim = $_POST['menu_elim'];
	$b -> dropMenu();
}

if (isset($_POST['submenuid'])) {
	$c = new Ajax();
	$c -> submenuid = $_POST['submenuid'];
	$c -> callSubMenu();
}

if (isset($_POST['dropsubmenu'])) {
	$d = new Ajax();
	$d -> dropsubmenu = $_POST['dropsubmenu'];
	$d -> dropSUBMenu();
}

if (isset($_POST['uppsubmenu'])) {
	$d = new Ajax();
	$d -> uppsubmenu = $_POST['uppsubmenu'];
	$d -> UpSUBMenu();
}

if (isset($_POST["actualizarOrdenSlide"])) {
	
	$c = new Ajax();
	$c -> actualizarOrdenSlide 	= $_POST["actualizarOrdenSlide"];
	$c -> actualizarOrdenItem 	= $_POST["actualizarOrdenItem"];
	$c -> actualizarOrdenAjax();

}