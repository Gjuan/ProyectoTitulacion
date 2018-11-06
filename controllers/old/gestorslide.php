<?php


/**
* 
*/
class GestorSlide
{
	

	public function mostrarImagenController($datos){
		

		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);

		if ($ancho < 1600  || $alto < 600) {
			echo 0;
		}else{

			$aleatorio = mt_rand(100, 9999);

			$ruta = "../../../views/images/slide/slide".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>600]);

			imagejpeg($destino, $ruta);

			GestorSlideModel::subirImagenSlideModel($ruta, "banner");

			$respuesta = GestorSlideModel::mostrarImagenSlideModel($ruta, "banner");

			$enviarDatos  = array('ruta' => $respuesta["bbh_imagen"]);

			echo json_encode($enviarDatos);
		}

	}//mostrarImagenController


	#Mostrar Imagenes en la vista

	public function mostrarImagenVistaController(){

		$respuesta = GestorSlideModel::mostrarImagenVistaModel("banner");

		foreach ($respuesta as $row => $item) {
		
			echo '<li class="bloqueSlide" id="'.$item['bbh_idbanner'].'"><span class="fa fa-times eliminarItemSlide" ruta="'.$item['bbh_imagen'].'"></span><img src="'.substr($item['bbh_imagen'],6).'" class="handleImg"></li>';

		}

	}//mostrarImagenVistaController


	#ELIMINAR ITEM DEL SLIDE

	public function eliminarSlideController($datos){

		$respuesta = GestorSlideModel::eliminarSlideModel($datos, "banner");

		unlink($datos['rutaSlide']);

		echo $respuesta;
	}//eliminarSlideController



	public function mostrarImagenVistaSlideController(){

	$respuesta = GestorSlideModel::mostrarImagenVistaSlideModel("banner");

	$cont =0;

	foreach ($respuesta as $row => $item) {
		$cont++;
		if ($cont == 1) {
			$class = 'active';
		}else{
			$class = '';
		}
		echo '<div class="item '.$class.'"><img src="'.substr($item['bbh_imagen'],6).'" alt="First slide"> <div class="carousel-caption"> Slide  # '.$cont.'</div></div>';

	}

	}//mostrarImagenVistaSlideController


	public function actualizarOrdenController($datos){

		$respuesta = GestorSlideModel::actualizarOrdenModel($datos,"banner");

	}//actualizarOrdenController

	
}