<?php  

require_once "../../controllers/gestorCombos_Controller.php";
require_once "../../models/gestorCombos_Modell.php";

/**
* para controlar el slide
*/
class Ajax
{


	public $id;
	
	public function gestorComboCantonAjax(){

		$datos = $this->id;

		$respuesta = combosController::mostrarCantonCombo($datos);

		echo $respuesta;

	}//gestorComboCantonAjax


	public $idCanton;
	
	public function gestorComboParroquiaAjax(){

		$datos = $this->idCanton;

		$respuesta = combosController::mostrarParroquiaCombo($datos);

		echo $respuesta;

	}//gestorComboParroquiaAjax	

	public $idParroquia;
	
	public function gestorComboRecintoElectAjax(){

		$datos = $this->idParroquia;

		$respuesta = combosController::mostrarRecintoElectCombo($datos);

		echo $respuesta;

	}//gestorComboRecintoElectAjax	

	public $DatoRecintoSelect;
	
	public function gestorComboSetDatoRecintoElectAjax(){

		$datos = $this->DatoRecintoSelect;

		$respuesta = combosController::SetValRecintoElectoral($datos);

		echo $respuesta;

	}//gestorComboSetDatoRecintoElectAjax	

	
	public $DatoDignidad;
	public function gestorListCandidatoElectAjax(){

		$datos = $this->DatoDignidad;

		$respuesta = combosController::ListaCandidatos($datos);

		echo $respuesta;

	}//gestorListCandidatoElectAjax		
	
	
	public $junta;
	public $Blancos;
	public $Nulos;
	public $Validos;
	public $obsc;
	public $datavt;
	public function gestorSaveDataVotoAjax(){

		$datos = array("junta"=>$this->junta, "Blancos"=>$this->Blancos, "Nulos"=>$this->Nulos, "Validos"=>$this->Validos, "obsc"=>$this->obsc, "datavt"=>$this->datavt);

		$respuesta = combosController::saveDataVotos($datos);

		echo $respuesta;

	}//gestorSaveDataVotoAjax		


}//Ajax

#OBEJTOS

if (isset($_POST['idProvincia'])) {

	$a = new Ajax();
	$a -> id = $_POST["idProvincia"];
	$a -> gestorComboCantonAjax();

}

if (isset($_POST['idCanton'])) {

	$a = new Ajax();
	$a -> idCanton = $_POST["idCanton"];
	$a -> gestorComboParroquiaAjax();

}

if (isset($_POST['idParroquia'])) {

	$a = new Ajax();
	$a -> idParroquia = $_POST["idParroquia"];
	$a -> gestorComboRecintoElectAjax();

}

if (isset($_POST['DatoRecintoSelect'])) {

	$a = new Ajax();
	$a -> DatoRecintoSelect = $_POST["DatoRecintoSelect"];
	$a -> gestorComboSetDatoRecintoElectAjax();

}

if (isset($_POST['DatoDignidad'])) {

	$a = new Ajax();
	$a -> DatoDignidad = $_POST["DatoDignidad"];
	$a -> gestorListCandidatoElectAjax();

}

if (isset($_POST['junta'])) {

	$a = new Ajax();
	$a -> junta = $_POST["junta"];
	$a -> Blancos = $_POST["Blancos"];
	$a -> Nulos = $_POST["Nulos"];
	$a -> Validos = $_POST["Validos"];
	$a -> obsc = $_POST["obsc"];
	$a -> datavt = $_POST["datavt"];

	$a -> gestorSaveDataVotoAjax();

}