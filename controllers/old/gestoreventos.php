<?php
/**
* 
*/
class GestorEventoController{
	
	public function mostrarImagenController1($datos){
		

		list($ancho, $alto) = getimagesize($datos);

		if ($ancho < 1140  || $alto < 705) {
			echo 0;
		}else{

			$aleatorio = mt_rand(100, 9999);

			$ruta = "../../../views/images/galeriaeventos/imageEvent".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($datos);

			$nomImagen = "imageEvent".$aleatorio.".jpg";

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1140, "height"=>705]);

			imagejpeg($destino, $ruta);

			GestorEventoModel::subirImagenEventoModel($nomImagen, "galeriaeventos");

			$respuesta = GestorEventoModel::mostrarImagenEvento($nomImagen, "galeriaeventos");

			$enviarDatos  = array('ruta' => $respuesta["bbh_imagem"], 'id' => $respuesta["bbh_idgaleria"]);

			echo json_encode($enviarDatos);
		}

	}//mostrarImagenController1


	public function eliminarImagenGaleriaController1($datos){

		$respuesta = GestorEventoModel::eliminarImagenGaleriaModel($datos, "galeriaeventos");

		$ruta = "../../../views/images/galeriaeventos/".$datos['rutaGaleria'];

		unlink($ruta);

		echo $respuesta;

	}//eliminarImagenGaleriaController1


	
	public function guardarImagenGaleriaController(){

		$boll = 0;

		if (isset($_POST['fechaEvento'])) {
			

			$datosController = array('tituloEvento' => $_POST['tituloEvento'],
									 'fechaEvento' => $_POST['fechaEvento'],
									 'horaEvento' => $_POST['horaEvento'],
									 'resumenEvento' => $_POST['resumenEvento'],
									 'contenidoEvento' => $_POST['contenidoEvento'],
									 'usuario' => $_SESSION['idUsuario'],
									 'lugarEvento'=> $_POST['lugarEvento'],
									 'guardarComo' => $_POST['guardarComo'],
									 'Video' => $_POST['Video']);

			$respuesta = GestorEventoModel::guardarImagenGaleriaModel($datosController,"evento");
			
			if ($respuesta=='ok') {

				$respuesta1 = GestorEventoModel::maxImagenGaleriaModel("evento");

				$cadena = substr($_POST['imagenes'], 1);

				$idevento = $respuesta1['idmax'];

				$ImagenesArr = explode("-", $cadena);

				foreach ($ImagenesArr as $row => $valor) {
					
					 $respuesta2 = GestorEventoModel::upIdImagenGaleriaModel($idevento , $valor, "galeriaeventos");

					 if ($respuesta2 == "ok"){
					 	$boll =1;
					 }
					
				}

			}


			if ($boll==1) {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Evento se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "eventos";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//guardarImagenGaleriaController



	public function mostrarEventosController(){

		$respuesta = GestorEventoModel::mostrarEventosVistaModel("listaeventos");

		foreach ($respuesta as $row => $item) {
		
			echo ' <tr>
                  <td>'.$item['nombres'].'</td>
                  <td>'.$item['bbh_tituloevento'].'</td>
                  <td>'.$item['fecha'].'</td>
                  <td>'.$item['bbh_horaevento'].'</td>
                  <td>'.$item['estado'].'</td>
                  <td>'.$item['estadoevento'].'</td>
                  <td> <button type="button" class="btn btn-primary btn-xs edit_event" value="'.$item['bbh_idevento'].'"><i class="fa fa-fw fa-pencil-square-o"></i> Editar</button>  <button type="button" class="btn btn-primary btn-xs elimi_event"  value="'.$item['bbh_idevento'].'"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
                  </td>
                </tr>';

		}
	}//mostrarEventosController


	public function eliminarEventoController($datos){

		$respuesta = GestorEventoModel::eliminarGaleriaEventoModel($datos,"galeriaeventos");

		foreach ($respuesta as $row => $item) {

			$ruta = "../../../views/images/galeriaeventos/".$item['bbh_imagem'];

			unlink($ruta);

			$datoElimimar = $item['bbh_idgaleria'];

			GestorEventoModel::eliminarBaseGaleriaEventoModel($datoElimimar,"galeriaeventos");

		}

		$respuesta = GestorEventoModel::eliminarEventoModel($datos,"evento");
		echo $respuesta;

	}//eliminarEventoController



	public function consultaEventoController($datos){

		$listaUl = '';

		

		$respuesta2 = GestorEventoModel::consultaImagenGaleriaEventoModel($datos,"galeriaeventos");

		foreach ($respuesta2 as $row => $item) {

			$listaUl .= $listas = '<li class="bloqueSlide" id="'.$item["bbh_idgaleria"].'" data-id="'.$item["bbh_imagem"].'"><span class="fa fa-times eliminarItemGaleria"></span><img src="../views/images/galeriaeventos/'.$item["bbh_imagem"].'" class="handleImg"></li>';

		}

		$respuesta = GestorEventoModel::consultaGaleriaEventoModel($datos,"evento");

			$enviarDatos  = array('id' => $respuesta["bbh_idevento"],'titulo' => $respuesta["bbh_tituloevento"], 'fecha' => $respuesta["bbh_fechaevento"], 'hora' => $respuesta["bbh_horaevento"], 'lugar' => $respuesta["bbh_lugarevento"], 'resumen' => $respuesta["bbh_descripcion"], 'centenido' => $respuesta["bbh_contenido"], 'estado' => $respuesta["bbh_estadoevento"],  'galeria' => $listaUl);

			echo json_encode($enviarDatos);


	}//consultaEventoController



	public function reUpGaleriaImagenController1($datos){
		
		$evento = $datos['idevento'];

		list($ancho, $alto) = getimagesize($datos['imagenTemporal2']);

		if ($ancho < 1140  || $alto < 705) {
			echo 0;
		}else{

			$aleatorio = mt_rand(100, 9999);

			$ruta = "../../../views/images/galeriaeventos/imageEvent".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($datos['imagenTemporal2']);

			$nomImagen = "imageEvent".$aleatorio.".jpg";

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1140, "height"=>705]);

			imagejpeg($destino, $ruta);

			GestorEventoModel::resubirImagenEventoModel($nomImagen, $evento, "galeriaeventos");

			$respuesta = GestorEventoModel::mostrarImagenEvento($nomImagen, "galeriaeventos");

			$enviarDatos  = array('ruta' => $respuesta["bbh_imagem"], 'id' => $respuesta["bbh_idgaleria"]);

			echo json_encode($enviarDatos);

		}

	}//reUpGaleriaImagenController1


	public function actualizarEventoController(){

		if (isset($_POST['tituloEventoed'])) {
			
			$datosController = array('idevento' => $_POST['idupevento'],
									 'tituloEvento' => $_POST['tituloEventoed'],
									 'fechaEvento' => $_POST['fechaEventoed'],
									 'horaEvento' => $_POST['horaEventoed'],
									 'resumenEvento' => $_POST['resumenEventoed'],
									 'contenidoEvento' => $_POST['contenidoEventoed'],
									 'usuario' => $_SESSION['idUsuario'],
									 'lugarEvento'=> $_POST['lugarEventoed'],
									 'guardarComo' => $_POST['guardarComoed'],
									 'Video' => $_POST['Video']);

			$respuesta = GestorEventoModel::actualizarEventosModel($datosController,"evento");
			
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Evento se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "listadoeventos";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//actualizarEventoController


}//GestorEventoController