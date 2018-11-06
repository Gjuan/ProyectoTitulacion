<?php


/**
* 
*/
class GestorBannerController
{
	

	public function mostrarImagenController($datos){
		

		list($ancho, $alto) = getimagesize($datos["imagen"]);

		if ($ancho < 1583  || $alto < 400) {
			echo 0;
		}else{

			$aleatorio = mt_rand(100, 9999);

			$ruta = "../../../views/images/banners/banners".$aleatorio.".jpg";

			$imagen = "banners".$aleatorio.".jpg";

			$id 	= $datos["id"];

			$origen = imagecreatefromjpeg($datos["imagen"]);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1583, "height"=>400]);

			imagejpeg($destino, $ruta);

			GestorBannerModell::subirImagenSlideModel($imagen, $id, "seccionbanner");

			$respuesta = GestorBannerModell::mostrarImagenSlideModel($id, "seccionbanner");

			$enviarDatos  = array('ruta' => $respuesta["bbh_imagen_sec"]);

			echo json_encode($enviarDatos);
		}

	}//mostrarImagenController



	public function eliminarBannerController($datos){

		$respuesta = GestorBannerModell::eliminarBannerModel($datos, "seccionbanner");

		$ruta = "../../../views/images/banners/".$datos;

		unlink($ruta);

		echo $respuesta;
	}//eliminarBannerController


	public function MostrarImagenBannerController($datos){

		$respuesta = GestorBannerModell::mostrarImagenSlideModel($datos, "seccionbanner");

		if ($respuesta["bbh_imagen_sec"] <> ''){
			echo '<li class="bloqueSlide" id="'.$respuesta["bbh_imagen_sec"].'"><span class="fa fa-times elmin_banners"></span><img src="../views/images/banners/'.$respuesta["bbh_imagen_sec"].'" class="handleImg"></li>';
		}
		//echo $respuesta;
	}//MostrarImagenBannerController

}