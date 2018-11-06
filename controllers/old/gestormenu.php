<?php

/**
* 
*/
class GestorMenuController
{

	public function menuPrincipalController(){
		
		$html = '';
		$i=1;
		$respuesta = GestorMenupModel::menuPrincipalModel("menu");
		
			foreach ($respuesta as $row => $item) {

				// if ($item['bbh_tipo'] != 'S') {
				// 	$cl = "selectMenu";
				// }else{
				// 	$cl = "";
				// }

				$html.='<li class="selectMenu"  id="'.$item['bbh_idmenu'].'" data-id="'.$item['bbh_idmenu'].'">
		                  <span class="handle">
		                    <i class="fa fa-ellipsis-v"></i>
		                    <i class="fa fa-ellipsis-v"></i>
		                  </span>

		                  <span class="text" ">'.$i.' - '.$item['bbh_descripcion'].'</span>
		                  <div class="tools">
		                  ';
		                  
		                  if ($i > '6' ) {
		                  	$html.='<i class="fa fa-trash-o emenu" title="Eliminar" data-text="'.$item['bbh_tipo'].'" data-id="'.$item['bbh_idmenu'].'"></i>';
		                  }

		        			$html.='<i class="fa fa-edit pmenu" title="Editar" data-text="'.$item['bbh_tipo'].'" data-id="'.$item['bbh_idmenu'].'"></i>
		                  </div>

		                </li>';
		    $i++;
			}

		echo $html;
	}//menuPrincipalController


	public function aggMenuController(){
		
		if (isset($_POST['tipemenu'])) {
			
			$datosController = array('tipemenu' => $_POST['tipemenu'],
									 'Descripcion' => $_POST['Descripcion'],
									 'URL' => $_POST['URL'],
									 'tmenu' => $_POST['tmenu'],
									 'contendest' => $_POST['contendest'],
									 'estadomenu'=>$_POST['estadomenu']);

			$respuesta = GestorMenupModel::aggMenuModel($datosController,"menu");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Menu se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "menus";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}
		
			
	}//aggMenuController	

	public function editPrincipalMenuController($datos){
		$respuesta = GestorMenupModel::editPrincipalMenuModel($datos,"menu");

		$enviarDatos  = array('bbh_idmenu' => $respuesta["bbh_idmenu"], 'bbh_descripcion' => $respuesta["bbh_descripcion"], 'bbh_url' => $respuesta["bbh_url"], 'bbh_tipo' => $respuesta["bbh_tipo"], 'bbh_estado' => $respuesta["bbh_estado"], 'bbh_titulo' => $respuesta["bbh_titulo"], 'bbh_contenido' => $respuesta["bbh_contenido"]);

		echo json_encode($enviarDatos);

	}//editPrincipalMenuController

	public function dropPrincipalMenuController($datos){

		$respuesta = GestorMenupModel::dropPrincipalMenuModel($datos, "menu");

		return $respuesta;
	}//dropPrincipalMenuController


	public function upMenuController(){
		
		if (isset($_POST['tipemenu1'])) {
			
			$datosController = array('tipemenu' => $_POST['tipemenu1'],
									 'Descripcion' => $_POST['Descripcion'],
									 'URL' => $_POST['URL'],
									 'tmenu' => $_POST['tmenu'],
									 'contendest' => $_POST['contendest'],
									 'estadomenu'=>$_POST['estadomenu'],
									 'id_menu'=>$_POST['id_menu']);

			$respuesta = GestorMenupModel::upMenuModel($datosController,"menu");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Menu se Actualizo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "menus";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}
		
			
	}//upMenuController	


	public function callSubMenuController($datos){
		$html = '';
		$respuesta = GestorMenupModel::callSubmenuPrincipalModel($datos, "submenu");
		if (empty($respuesta)) {
			$html = '';
		}else{
			$html.='<div class="box box-primary">
			            <div class="box-header">
			              <i class="ion ion-clipboard"></i>
			              <h3 class="box-title">Lista Sub-Menu  - Menu Seleccionado</h3>
			            </div>
			            <div class="box-body">
			              <ul class="todo-list">';

				foreach ($respuesta as $row => $item) {
					$html.='<li class="selectMenu" data-id="'.$item['bbh_idsubmenu'].'">
			                  <span class="handle">
			                    <i class="fa fa-ellipsis-v"></i>
			                    <i class="fa fa-ellipsis-v"></i>
			                  </span>

			                  <span class="text" ">'.$item['bbh_subdescripcion'].'</span>

			                  <div class="tools">
			                  <i class="fa fa-trash-o subemenu" title="Eliminar" data-id="'.$item['bbh_idsubmenu'].'"></i>
				              <i class="fa fa-edit subpmenu" title="Editar" data-id="'.$item['bbh_idsubmenu'].'"></i>
			                  </div>

			                </li>';
				}

			$html.='       </ul>
			            </div>
			            <div class="box-footer clearfix no-border">
			              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modalSubMenu"><i class="fa fa-plus"></i>Agg Sub-Menu</button>
			            </div>
			          </div>';
		 echo $html;
		}
	}//callSubMenuController


	public function aggSubMenuController(){
		
		if (isset($_POST['SubDescripcion'])) {
			
			$datosController = array('SubDescripcion' => $_POST['SubDescripcion'],
									 'SubURL' => $_POST['SubURL'],
									 'estadomenu' => $_POST['estadomenu'],
									 'idmenu'=> $_POST['id_submenu']);

			$respuesta = GestorMenupModel::aggSubMenuModel($datosController,"submenu");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Sub-Menu se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "menus";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}
		
			
	}//aggSubMenuController	

	public function dropSecundarioMenuController($datos){

		$respuesta = GestorMenupModel::dropSecundarioMenuModell($datos, "submenu");

		return $respuesta;
	}//dropSecundarioMenuController


	public function upSecundarioMenuController($datos){
		$respuesta = GestorMenupModel::upSecundarioMenuModell($datos,"submenu");

		$enviarDatos  = array('bbh_idsubmenu' => $respuesta["bbh_idsubmenu"], 'bbh_subdescripcion' => $respuesta["bbh_subdescripcion"], 'bbh_suburl' => $respuesta["bbh_suburl"], 'bbh_subestado' => $respuesta["bbh_subestado"], 'bbh_idmenu' => $respuesta["bbh_idmenu"]);

		echo json_encode($enviarDatos);

	}//upSecundarioMenuController


	public function uppSubMenuController(){
		
		if (isset($_POST['SubDescripcion1'])) {
			
			$datosController = array('SubDescripcion' => $_POST['SubDescripcion1'],
									 'SubURL' => $_POST['SubURL'],
									 'estadomenu' => $_POST['estadomenu'],
									 'idmenu'=> $_POST['id_submenu']);

			$respuesta = GestorMenupModel::uppSubMenuModel($datosController,"submenu");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Sub-Menu se Actualizo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "menus";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}
		}
	}//uppSubMenuController

	public function actualizarOrdenController($datos){

		$respuesta = GestorMenupModel::actualizarOrdenModel($datos,"menu");

	}//actualizarOrdenController


}//GestorMenuController