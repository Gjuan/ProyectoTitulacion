<?php

/**
* 
*/
class GestorRadio {

	
	public function mostrarImagenRadioController($datos){
		

		list($ancho, $alto) = getimagesize($datos['imagenradio']);

		if ($ancho < 800  || $alto < 400) {

			echo 0;

		}else{

			$aleatorio = mt_rand(100, 9999);

			$nImagen = 'radio'.$aleatorio.'.jpg';

			$ruta = "../../../views/images/radio/radio".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($datos['imagenradio']);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

			$enviarDatos  = array('ruta' => $nImagen);

			echo json_encode($enviarDatos);
		}

	}//mostrarImagenNoticiaController


	public function eliminarImagenCarpetaController($datos){

		$ruta = '../../../views/images/radio/'.$datos;

		unlink($ruta);

		echo "ok";

	}//eliminarImagenCarpetaController

		
	public function guardarArticulosController(){

		$fecha = date("Y-m-d");

		if (isset($_POST['tituloRadio'])) {

			$datosController = array('titulo' => $_POST['tituloRadio'],
									 'resumen' => $_POST['Resumen'],
									 'urlaudio' => $_POST['urlaudio'],
									 'Exponente' => $_POST['Exponente'],
									 'imagenes' => $_POST['imagenes'],
									 'usuario' => $_SESSION['idUsuario'],
									 'fechaPublicacion'=>$fecha);

			$respuesta = GestorRadioModel::guardarRadioModel($datosController,"radio");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El audio se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "edradio";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//guardarArticulosController
	#SUBIR NOTICIA A LA BASE DE DATOS


	public function mostrarAudiosController(){

		$respuesta = GestorRadioModel::mostrarRadioVistaModel("listaradio");

		foreach ($respuesta as $row => $item) {
		
			echo ' <tr>
	                  <td>'.$item['bbh_titulo_radio'].'</td>
	                  <td>'.$item['bbh_fecha_ingreso'].'</td>
	                  <td>'.$item['nombres'].'</td>
	                  <td> <button type="button" class="btn btn-primary btn-xs edit_radio" value="'.$item['bbh_id_radio'].'"><i class="fa fa-fw fa-pencil-square-o"></i> Editar</button>  <button type="button" class="btn btn-primary btn-xs elimi_radio" data-id="'.$item['bbh_imagen_radio'].'"  value="'.$item['bbh_id_radio'].'"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
	                  </td>
                </tr>';

		}
	}//mostrarAudiosController


	public function eliminarAudioController($datos){

		$string = substr($datos['audioImagen'],1);
		$ruta = '../../../views/images/radio/'.$string;

		unlink($ruta);

		$id = $datos['audioId'];
		$respuesta = GestorRadioModel::eliminarAudioModel($id,"radio");
		echo $respuesta;

	}//eliminarAudioController


	public function editarItemRadioController($datos){

		$respuesta = GestorRadioModel::editarItemRadioModel($datos,"listaradio");

		$enviarDatos  = array('titulo' => $respuesta['bbh_titulo_radio'], 'resumen' => $respuesta['bbh_resumen_radio'], 'audio' => $respuesta['bbh_audio_url'], 'exponente' => $respuesta['bbh_exponente_radio'], 'imagen' => $respuesta['bbh_imagen_radio'], 'id' => $datos);

		echo json_encode($enviarDatos);

	}//editarItemRadioController


	public function actualizarArticulosController(){

		$fecha = date("Y-m-d");

		if (isset($_POST['tituloRadio1'])) {

			$datosController = array('titulo' => $_POST['tituloRadio1'],
									 'resumen' => $_POST['Resumen'],
									 'urlaudio' => $_POST['urlaudio'],
									 'Exponente' => $_POST['Exponente'],
									 'imagenes' => $_POST['imagenes'],
									 'usuario' => $_SESSION['idUsuario'],
									 'fechaPublicacion'=>$fecha,
									 'idRadio' => $_POST['idRadio']);

			$respuesta = GestorRadioModel::atualizarRadioModel($datosController,"radio");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El audio se Actualizo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "listaaudios";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//guardarArticulosController

}