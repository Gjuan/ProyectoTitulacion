<?php
/**
* 
*/
class GestorRendicion
{

		public function guardarRendicionController(){

		$fecha = date("Y-m-d");

		if (isset($_POST['annior'])) {
			
			$datosController = array('periodo' => $_POST['annior'],
									 'url' => $_POST['url']);

			$respuesta = GestorRendicionModel::guardarRendicionModel($datosController,"rendicioncuentas");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Nuevo Año se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "rendicion";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//guardarRendicionController



	public function listadoRendicionController(){

		$respuesta = GestorRendicionModel::listaRendicionModel("rendicioncuentas");

		foreach ($respuesta as $row => $item) {
		
			echo ' <tr>
                  <td>'.$item['bbh_periodo'].'</td>
                  <td><a href="'.$item['bbh_url_rendicion'].'" >'.$item['bbh_periodo'].'</a></td>
                  <td> <button type="button" class="btn btn-primary btn-xs elimi_cuenta" data-id="'.$item['bbh_id_rendicion'].'" ><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
                  </td>
                </tr>';

		}

	}//listadoRendicionController


	public function eliminarRendicionController($datos){

		$respuesta = GestorRendicionModel::eliminarRendicionModel($datos,"rendicioncuentas");

	}//eliminarRendicionController

}//GestorRendicion