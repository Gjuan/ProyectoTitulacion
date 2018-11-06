<?php
session_start();
/**
* 
*/
class GestorArticulos{
	
	// #MOSTRAR IMAGEN ANTES DE GUARDAR
	// public function mostrarImagenController($datos){

	// 	list($ancho, $alto) = getimagesize($datos);
		
	// 	if ($ancho < 800  || $alto < 400) {
	// 		echo 0;
	// 	}else{

	// 		$aleatorio = mt_rand(100, 9999);

	// 		$ruta = "../../../views/images/noticias/temp/tmp_noticia".$aleatorio.".jpg";

	// 		$origen = imagecreatefromjpeg($datos);

	// 		$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

	// 		imagejpeg($destino, $ruta);


	// 		echo $ruta;
	// 	}

	// }//mostrarImagenController

	public function mostrarImagenNoticiaController($datos){
		

		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);

		if ($ancho < 800  || $alto < 400) {
			echo 0;
		}else{

			$aleatorio = mt_rand(100, 9999);

			$nImagen = 'noticia'.$aleatorio.'.jpg';

			$ruta = "../../../views/images/noticias/noticia".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

			$enviarDatos  = array('ruta' => $nImagen);

			echo json_encode($enviarDatos);
		}

	}//mostrarImagenNoticiaController


	public function eliminarImagenCarpetaController($datos){

		$ruta = '../../../views/images/noticias/'.$datos;

		unlink($ruta);

		echo "ok";

	}//eliminarImagenCarpetaController

	#SUBIR NOTICIA A LA BASE DE DATOS

	public function guardarArticulosController(){

		$fecha = date("Y-m-d");

		if (isset($_POST['tituloNoticia'])) {
			
			// $imagen = $_FILES["fotoNoticia"]["tmp_name"];
			// $borrar = glob("../views/images/noticias/temp/*");

			// foreach ($borrar as $file) {
			// 	unlink($file);
			// }

			// if ($_POST['guardarComo'] == 0) {
			// 	$fechaPublicacion = '';
			// }else{
			// 	$fechaPublicacion = date("Y-m-d");
			// }

			// $aleatorio = mt_rand(100, 9999);

			// $ruta = "../views/images/noticias/noticia".$aleatorio.".jpg";

			// $origen = imagecreatefromjpeg($imagen);

			// $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			// imagejpeg($destino, $ruta);
			// $nImg = "noticia".$aleatorio.".jpg";

			$datosController = array('titulo' => $_POST['tituloNoticia'],
									 'resumen' => $_POST['resumenNoticia'],
									 'contenido' => $_POST['contenidoNoticia'],
									 'imagen' => $_POST['imagenes'],
									 'estado' => $_POST['guardarComo'],
									 'fechaCreacion' =>  $fecha,
									 'usuario' => $_SESSION['idUsuario'],
									 'fechaPublicacion'=>$fechaPublicacion,
									 'video'=>$_POST['video'],
									 'Categoria'=>$_POST['Categoria']);

			$respuesta = GestorArticulosModel::guardarArticulosModel($datosController,"noticia");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡La noticia se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "entrada";
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



	public function mostrarArticulosController(){

		$respuesta = GestorArticulosModel::mostrarNoticiasVistaModel("noticia", "usuario");

		foreach ($respuesta as $row => $item) {
		
			echo ' <tr>
                  <td>'.$item['bbh_titulonoticia'].'</td>
                  <td>'.$item['usuario'].'</td>
                  <td>'.$item['bbh_fechacreacion'].'</td>
                  <td>'.$item['bbh_categoria'].'</td>
                  <td>'.$item['estado'].'</td>
                  <td> <button type="button" class="btn btn-primary btn-xs edit_not" value="'.$item['bbh_idnoticia'].'"><i class="fa fa-fw fa-pencil-square-o"></i> Editar</button>  <button type="button" class="btn btn-primary btn-xs elimi_not" data-id="'.$item['bbh_imagennoticia'].'"  value="'.$item['bbh_idnoticia'].'"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
                  </td>
                </tr>';

		}
	}//mostrarArticulosController



	public function eliminarArticuloController($datos){
		
		$string = $datos['noticiagaleria'];
		
		if (!empty($string )) {
			
			$cadena = substr($string, 1);

			$listaObras = explode('-', $cadena);

				foreach ($listaObras as $row => $valor) {
					
					$ruta = '../../../views/images/noticias/'.$valor;

					unlink($ruta);

				}
		}


		$id = $datos['noticiavalor'];

		$respuesta = GestorArticulosModel::eliminarArticulosModel($id,"noticia");
		echo $respuesta;

	}//eliminarArticuloController

	public function editarArticuloController($datos){
		
		$listaUl = '';
		$option = '<option value="">Seleccione una opcion...</option>';

		$respuesta = GestorArticulosModel::editarArticulosModel($datos,"listanoticias");



		if (!empty($respuesta["bbh_imagennoticia"])) {
			
		$cadena = substr($respuesta["bbh_imagennoticia"], 1);

		$listaObras = explode('-', $cadena);

				foreach ($listaObras as $row => $valor) {
					
					$listaUl .= '<li class="bloqueSlide" id="'.$valor.'"><span class="fa fa-times eliminarItemNoticia"></span><img src="../views/images/noticias/'.$valor.'" class="handleImg"></li>';
					
				}
		}


		$respuesta2 = GestorArticulosModel::mostrarCategoriaModel("categoria");

		foreach ($respuesta2 as $row => $item) {
			
			if ($respuesta['bbh_id_categoria'] == $item['bbh_id_categoria']) {
				$option .='<option id="cat-'.$item['bbh_id_categoria'].'" value="'.$item['bbh_id_categoria'].'" selected>'.$item['bbh_categoria'].'</option>';
			}else{
				$option .='<option id="cat-'.$item['bbh_id_categoria'].'" value="'.$item['bbh_id_categoria'].'">'.$item['bbh_categoria'].'</option>';
			}			
		}


		$enviarDatos  = array('bbh_idnoticia' => $respuesta["bbh_idnoticia"], 'bbh_titulonoticia' => $respuesta["bbh_titulonoticia"], 'bbh_contenidonoticia' => $respuesta["bbh_contenidonoticia"], 'bbh_imagennoticia' => $respuesta["bbh_imagennoticia"], 'bbh_resumen' => $respuesta["bbh_resumen"], 'bbh_video' => $respuesta["bbh_video"], 'estado' => $respuesta["estado"], 'galerialis' => $listaUl, 'option'=>$option);

		echo json_encode($enviarDatos);

	}//editarArticuloController


	#EDITAR NOTICIA A LA BASE DE DATOS

	public function editarArticulosController(){

		$fechaUpdate = date("Y-m-d");

		if (isset($_POST['tituloNoticia'])) {

			if ($_POST['guardarComo'] == 0) {
				$fechaPublicacion = '';
			}else{
				$fechaPublicacion = date("Y-m-d");
			}

			$datosController = array('titulo' => $_POST['tituloNoticia'],
									 'resumen' => $_POST['resumenNoticia'],
									 'contenido' => $_POST['contenidoNoticia'],
									 'imagen' => $_POST['imagenes'],
									 'estado' => $_POST['guardarComo'],
									 'fechaCreacion' =>  $fechaUpdate,
									 'usuario' => $_SESSION['idUsuario'],
									 'noticiaId' => $_POST['idnoticia'],
									 'fechaPublicacion'=>$fechaPublicacion,
									 'video'=>$_POST['video'],
									 'Categoria'=>$_POST['Categoria']);

			$respuesta = GestorArticulosModel::editorArticulosModel($datosController,"noticia");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡La noticia se Actualizo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "noticias";
							}
					});	
				</script>
				';
			}
			else{
				echo "error";
			}

		}

	}//editarArticulosController
	#EDITAR NOTICIA A LA BASE DE DATOS


}//GestorArticulos