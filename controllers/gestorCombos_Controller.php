<?php
// session_start();
// $_SESSION['ResgistroRecinto']='';

/**
* 
*/
class combosController
{
	
	public function mostrarProvinciaCombo(){

		$respuesta = combosModell::mostrarProvinciaComboModell("provincia");
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id_provincia"].'">'.$item["nombre_provincia"].'</option>';

		}

	}//mostrarProvinciaCombo

	public function mostrarCantonCombo($id_provincia){

		$respuesta = combosModell::mostrarCantonComboModell($id_provincia, "canton");

		$html="<option value=''>Selecciona una...</option>";

		foreach($respuesta as $row => $item){

			$html.='<option value="'.$item["id_canton"].'">'.$item["nombre_canton"].'</option>';

		}

		echo $html;

	}//mostrarCantonCombo	


	public function mostrarParroquiaCombo($id_Canton){

		$respuesta = combosModell::mostrarParroquiaComboModell($id_Canton, "parroquia");

		$html="<option value=''>Selecciona una...</option>";

		foreach($respuesta as $row => $item){

			$html.='<option value="'.$item["id_parroquia"].'">'.$item["descripcion"].'</option>';

		}

		echo $html;

	}//mostrarParroquiaCombo	

	public function mostrarRecintoElectCombo($id_parroquia){

		$respuesta = combosModell::mostrarRecintoElectComboModell($id_parroquia, "ctl_recinto_electoral");

		$html="<option value=''>Selecciona una...</option>";

		foreach($respuesta as $row => $item){

			$html.='<option value="'.$item["ctl_id_recinto"].'">'.$item["ctl_recinto"].'</option>';

		}

		echo $html;

	}//mostrarRecintoElectCombo	



	public function SetValRecintoElectoral($id_Recinto){

		unset($_SESSION['ResgistroRecinto']);
		if($id_Recinto == '' || $id_Recinto<1){
			$_SESSION['ResgistroRecinto']=0;
			echo 'ERROR';
		}else{
			$_SESSION['ResgistroRecinto']=$id_Recinto;
			echo 'OK';
		}

	}//SetValRecintoElectoral


	public function listaJuntasSinIngresarController(){

		$html="";

		$h="";


		if(isset($_COOKIE["idParroquia"]) ){
			
			if ($_COOKIE["idParroquia"] > 0) {

				$id = $_COOKIE["idParroquia"];
				
				$respuesta = combosModell::listaJuntasSinIngresarModell($id, "ctl_junta");

				foreach($respuesta as $row => $item){

					if($item['ctl_genero'] == "H"){
						$h="bg-aqua";
					}else{
						$h="bg-red";
					}

					$html.='<div class="col-lg-4 col-xs-6">
				                <div class="small-box '.$h.'">
				                  <div class="inner">
				                    <h3 id="numJun">'.$item['ctl_num_padrom'].'</h3>
				                    <p>J '.$item['ctl_numero_junta'].'</p>
				                  </div>
				                  <div class="icon">
				                    <i class="ion ion-person-add"></i>
				                  </div>
				                  <a href="#" data-id="'.$item['ctl_id_junta'].'" class="small-box-footer rgsJuntas">Registro Datos <i class="fa fa-arrow-circle-right"></i></a>
				                </div>
				              </div>';

				}

				echo $html;

			}else{
				echo "nada para mostrar 1 - ".$id;
			}

		}else{
			echo "nada para mostrar 2";
		}
		

	}//listaJuntasSinIngresarController


	public function mostrarDignidadesCombo(){

		$respuesta = combosModell::mostrarDignidadesComboModell("ctl_dignidad");

		$html="<option value=''>Selecciona una...</option>";

		foreach($respuesta as $row => $item){

			$html.='<option value="'.$item["ctl_id_dignidad"].'">'.$item["ctl_dignidad"].'</option>';

		}

		echo $html;

	}//mostrarDignidadesCombo	


	public function ListaCandidatos($dignidad){

		$provincia = $_COOKIE["idProvincia"];
		$canton = $_COOKIE["idCanton"];
		$parroquia = $_COOKIE["idParroquia"];
		$h="bg-aqua";

		if ($dignidad == 1) {
			$respuesta = combosModell::ListaCandidatosModell($provincia, $dignidad, "listacandidatos");
		}elseif($dignidad == 2){
			$respuesta = combosModell::ListaCandidatosModell($canton, $dignidad, "listacandidatos");
		}elseif($dignidad == 3){
			$respuesta = combosModell::ListaCandidatosModell1($canton, $dignidad, $parroquia, "listacandidatos");
		}

		$html="";

		if (isset($respuesta)) {
	
			foreach($respuesta as $row => $item){

				if (isset($item['ctl_id_zona_parroquia'])) {
				
					if($item['ctl_id_zona_parroquia'] == "U"){
						$h="bg-aqua";
					}else{
						$h="bg-yellow";
					}

				}

				$html.='<div class="col-xs-4">
							<div class="info-box">
					            <span class="info-box-icon '.$h.'"><i class="ion ion-ios-gear-outline"></i></span>

					            <div class="info-box-content">
					              <span class="info-box-text">'. $item['ctl_candidato'] .'</span>
					              <span class="info-box-number">'. $item['ctl_lista'] .'</span>
					              <input class="form-control pushing" name="cantVotos[]" id="controlInput-'. $item['ctl_id_postulacion'] .'" placeholder="#votos" type="text" required maxlength="3">
					            </div>
					        
					          </div>
					    </div>';

			}

		}

		echo $html;

	}//ListaCandidatos		


	public function saveDataVotos($datos){
		
		$datavt;

		$datosController = array('junta' 		=> $datos['junta'],
								 'Blancos' 		=> $datos['Blancos'],
								 'Nulos' 		=> $datos['Nulos'],
								 'Validos' 		=> $datos['Validos'],
								 'obsc' 		=> $datos['obsc'] );

		$respuesta = combosModell::saveDataVotosModell($datosController, "ctl_voto");
		
		$maxId = combosModell::getUltimoIdVotos_model("ctl_voto");

		$dato = explode("|", $datos['datavt']);

		foreach($dato as $row => $item){
			$simplificado = explode('-', $item);

			$datosController2 = array('idVoto' 		=> $maxId['idmax'],
								 	 'candidato' 		=> $simplificado[0],
									 'votos' 		=> $simplificado[1]);
			
			$respuesta2 = combosModell::saveDataVotoSimplificadoModell($datosController2, "ctl_detalle_voto");

			echo $respuesta2;

		}


	}//saveDataVotos

}//combosController