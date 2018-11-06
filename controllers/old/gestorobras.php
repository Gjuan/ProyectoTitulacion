<?php

/**
* 
*/
class GestorObras
{
	
	
	public function mostrarImagenObraController($datos){
		

		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);

		if ($ancho < 1140  || $alto < 705) {
			echo 0;
		}else{

			$aleatorio = mt_rand(100, 9999);

			$nImagen = 'obra'.$aleatorio.'.jpg';

			$ruta = "../../../views/images/obras/obra".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1140, "height"=>705]);

			imagejpeg($destino, $ruta);

			$enviarDatos  = array('ruta' => $nImagen);

			echo json_encode($enviarDatos);
		}

	}//mostrarImagenObraController


	public function eliminarImagenCarpetaController($datos){

		$ruta = '../../../views/images/obras/'.$datos;

		unlink($ruta);

		echo "ok";

	}//eliminarImagenCarpetaController


	public function guardarObraController(){

		if (isset($_POST['Obra'])) {
			

			$datosController = array('obra' => $_POST['Obra'],
									 'descripcion' => $_POST['Resumen'],
									 'sector' => $_POST['Sector'],
									 'estadoObra' =>$_POST['estadoObra'],
									 'fechaInicio' =>$_POST['FechaInicio'],
									 'fechaFin' =>$_POST['FechaFin'],
									 'galeria' => $_POST['imagenes'],
									 'video' => $_POST['video'],
									 'contenido' => $_POST['Contenido'],
									 'usuario' => $_SESSION['idUsuario'],
									 'guardarComo'=>$_POST['guardarComo']);

			$respuesta = GestorObrasModel::guardarObrasModel($datosController,"obras");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡La Obra se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "obras";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//guardarObraController



	public function mostrarObrasController(){

		$respuesta = GestorObrasModel::mostrarObrasModell("listadoobras");

		foreach ($respuesta as $row => $item) {
		
			echo ' <tr>
                  <td>'.$item['users'].'</td>
                  <td>'.$item['bbh_obra'].'</td>
                  <td>'.$item['bbh_fecha_inicio'].'</td>
                  <td>'.$item['bbh_fecha_fin'].'</td>
                  <td>'.$item['EstadoAbance'].'</td>
                  <td>'.$item['EstadoPublicado'].'</td>
                  <td> <button type="button" class="btn btn-primary btn-xs edit_obr" value="'.$item['bbh_idobra'].'"><i class="fa fa-fw fa-pencil-square-o"></i> Editar</button>  
                  <button type="button" class="btn btn-primary btn-xs elimi_obr" data-id="'.$item['bbh_galeria'].'" value="'.$item['bbh_idobra'].'"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
                  </td>
                </tr>';

		}


	}//mostrarObrasController


	public function eliminarObraController($datos){

		$string = $datos['galeriaObra'];

		if (!empty($string )) {
			
			$cadena = substr($string, 1);

			$listaObras = explode('-', $cadena);

				foreach ($listaObras as $row => $valor) {
					
					$ruta = '../../../views/images/obras/'.$valor;

					unlink($ruta);

				}
		}


		$id = $datos['eliminarObraId'];


		$respuesta = GestorObrasModel::eliminarObrasModell($id,"obras");

		echo $respuesta;


	}//eliminarObraController



	public function editorObraController($datos){

		$listaUl = '';

		$respuesta = GestorObrasModel::editorObraModell($datos,"obras");

		if (!empty($respuesta["bbh_galeria"])) {
			
		$cadena = substr($respuesta["bbh_galeria"], 1);

		$listaObras = explode('-', $cadena);

				foreach ($listaObras as $row => $valor) {
					
					$listaUl .= '<li class="bloqueSlide" id="'.$valor.'"><span class="fa fa-times eliminarItemObra"></span><img src="../views/images/obras/'.$valor.'" class="handleImg"></li>';
					
				}
		}

			$enviarDatos  = array('id' => $respuesta["bbh_idobra"],'obra' => $respuesta["bbh_obra"], 'descripcion' => $respuesta["bbh_obradescripcion"], 'sector' => $respuesta["bbh_sector_obra"], 'estadoObra' => $respuesta["bbh_estado_obra"], 'fechaInicio' => $respuesta["bbh_fecha_inicio"], 'fechaFin' => $respuesta["bbh_fecha_fin"], 'galeria' => $respuesta["bbh_galeria"], 'video' => $respuesta["bbh_video"], 'contenido' => $respuesta["bbh_contenido"], 'estado' => $respuesta["bbh_estado"], 'galerialis' => $listaUl);

			echo json_encode($enviarDatos);

	}//editorObraController


	public function updateObraController(){

		if (isset($_POST['ObraUp'])) {
			
			$datosController = array('obra' 		=> $_POST['ObraUp'],
									 'descripcion' 	=> $_POST['Resumen'],
									 'sector' 		=> $_POST['Sector'],
									 'estadoObra' 	=> $_POST['estadoObra'],
									 'fechaInicio'	=> $_POST['FechaInicio'],
									 'fechaFin' 	=> $_POST['FechaFin'],
									 'galeria' 		=> $_POST['imagenes'],
									 'video' 		=> $_POST['video'],
									 'contenido' 	=> $_POST['Contenido'],
									 'usuario' 		=> $_SESSION['idUsuario'],
									 'guardarComo'	=> $_POST['guardarComo'],
									 'idobra'		=> $_POST['idobra']);


			$respuesta = GestorObrasModel::updateObraModell($datosController,"obras");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡La Obra se Actualizo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "listadoobras";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}
		
	}//updateObraController

}//GestorObras