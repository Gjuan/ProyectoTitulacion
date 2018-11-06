<?php

/**
* 
*/
class GestorLotaipController
{

	public function mostrarAnniosLotaipController(){

		$respuesta = GestorLotaipModel::mostrarLotaipModel("lotaip_annio");

		$i=0;

		if (empty($respuesta)) {

			echo '<input id="annioNuevo" value="Crear '.date("Y").'" data-id="'.date("Y").'" name="Crear Nuevo AÑO" class="btn btn-block btn-success"  title="" type="button"><div id="brr"><br></div>';

		}else{


			foreach ($respuesta as $row => $item) {
				
				if((int)$item['bbh_annio_lotaip'] < (int)date("Y")){

					if($i==0){
					echo '<input id="annioNuevo" value="Crear '.date("Y").'" data-id="'.date("Y").'" name="Crear Nuevo AÑO" class="btn btn-block btn-success"  title="" type="button"> <div id="brr"><br></div>';
					}
					echo ' <input id="idAnnio'.$item['bbh_annio_lotaip'].'" data-id="'.$item['bbh_annio_lotaip'].'" value="'.$item['bbh_annio_lotaip'].'" name="'.$item['bbh_annio_lotaip'].'" class="btn btn-block btn-primary lotaipannio"  title="" type="button">';

				}else{	

					echo ' <input id="idAnnio'.$item['bbh_annio_lotaip'].'" data-id="'.$item['bbh_annio_lotaip'].'" value="'.$item['bbh_annio_lotaip'].'" name="'.$item['bbh_annio_lotaip'].'" class="btn btn-block btn-primary lotaipannio"  title="" type="button">';

				}	

				$i++;
			}

			
		}

	}//mostrarAnniosLotaipController


	public function creaNuevoAnnioController($datos){

		$idUser = $_SESSION['idUsuario'];

		$meses = array('enero','febrero','marzo','abril','mayo','junio','julio',
               'agosto','septiembre','octubre','noviembre','diciembre');

		$respuesta = GestorLotaipModel::creaNuevoAnnioModel($datos, $idUser, "lotaip_annio");

		$respuesta1 = GestorLotaipModel::maxIdLotaipModel("lotaip_annio");

		for ($i=0; $i < count($meses) ; $i++) { 
			$respuesta2 = GestorLotaipModel::creaNuevoMesModel($meses[$i], $respuesta1['max'] ,$idUser, "lotaip_mes");
		}

		return $respuesta;

	}//creaNuevoAnnioController


	public function mostrarAnnioActual($dato){

		$html = "";

		$resp= GestorLotaipModel::ultimoAnnioModel($dato, "lotaip_annio");

		$idAnnio = $resp['bbh_id_annio_lotaip'];

		$respuesta = GestorLotaipModel::mostrarMesesModel($idAnnio, "lotaip_mes");

		foreach ($respuesta as $row => $item) {

			$respuesta1 = GestorLotaipModel::mostrarLiteralesModel($item['bbh_id_mes_lotaip'], "lotaip_literales");

			$html.='<div class="box-header with-border">

                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne'.$item['bbh_mes_lotaip'].'" aria-expanded="false" class="collapsed">
                          '.$dato.' - '.strtoupper($item['bbh_mes_lotaip']).'
                        </a>
                      </h4>

                  </div>
                  <div id="collapseOne'.$item['bbh_mes_lotaip'].'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                  <input id="idLiteran'.$dato.' - '.strtoupper($item['bbh_mes_lotaip']).'" data-id="'.$item['bbh_id_mes_lotaip'].'" value="Agregar Nuevo Literal" name="Agregar Nuevo Literal" class="btn btn-block btn-warning datasLiteral"  title="" type="button">
                    <div class="box-body">';
                     
                    foreach ($respuesta1 as $row => $item1) {
                    	$html.='<div class="col-md-10"> <a href="'.$item1['bbh_enlace'].'" target="_blank" class="literalmes"><i class="fa fa-chevron-circle-right"></i> '.$item1['bbh_literal'].'</a> </div>  
                    	<div class="col-md-2"> 
                    	<button type="button" id="idLiteran'.$dato.' - '.strtoupper($item['bbh_mes_lotaip']).'" data-id="'.$item1['bbh_id_literales_lotaip'].'@'.$item1['bbh_enlace'].'@'.$item1['bbh_descipcion_literal'].'" class="btn btn-success btn-sm editarItemLotaip" > <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </button> 
                    	<button type="button" class="btn btn-danger btn-sm eliminarItemLotaip" data-id="'.$item1['bbh_id_literales_lotaip'].'"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </button> </div>
                    	 <br><br>';
                    }

                    $html.='</div>
                  </div>';

		}

		echo $html;

	}//mostrarAnnioActual


	public function guardarLiteralController(){

		if (isset($_POST['literalDes'])) {
			
			$literalDes	= $_POST['literalDes'];
			$literalDoc	= $_POST['literalDoc'];
			$idMes		= $_POST['idMes'];


			$datosController = array('Descripcion' => $literalDes,
						 					'url'  => $literalDoc,
						 					'idmes'=> $idMes);

			$respuesta = GestorLotaipModel::guardarLiteralModel($datosController,"lotaip_literales");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El literal se agrego correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "lotaip";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}


		}
	}//guardarLiteralController


	public function eliminarLiteral($datos){

		$respuesta = GestorLotaipModel::eliminarLiteralModel($datos,"lotaip_literales");

		return $respuesta;

	}//eliminarLiteral


	public function editarLiteralController(){

		if (isset($_POST['literalDes1'])) {
			
			$literalDes	= $_POST['literalDes1'];
			$literalDoc	= $_POST['literalDoc1'];
			$idMes		= $_POST['nuevoId'];


			$datosController = array('Descripcion' => $literalDes,
						 					'url'  => $literalDoc,
						 					'idmes'=> $idMes);

			$respuesta = GestorLotaipModel::editarLiteralModel($datosController,"lotaip_literales");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El literal se Actualizo correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "lotaip";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}


		}
	}//editarLiteralController

}//GestorLotaipController
