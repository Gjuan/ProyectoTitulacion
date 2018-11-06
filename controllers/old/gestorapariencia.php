<?php


/**
* 
*/
class GestorBannerController
{
	

	public function mostrarImagenController($datos){
		

		if ($datos['id'] == 'logopagina') {

			
			list($ancho, $alto) = getimagesize($datos["imagen"]);

			if ($ancho < 242  || $alto < 92) {
				echo 0;
			}else{

				

				$ruta = "../../../views/images/logo/logo.png";

				$origen = imagecreatefrompng($datos["imagen"]);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>242, "height"=>92]);

				imagejpeg($destino, $ruta);

				$enviarDatos  = array('ruta' => $ruta);

				echo json_encode($enviarDatos);

			}

			
		}else{

			list($ancho, $alto) = getimagesize($datos["imagen"]);

			if ($ancho < 1920  || $alto < 315) {
				echo 0;
			}else{

				$id 	= $datos["id"];

				if ($id == "rendicioncuentas") {
					$img="parallax-bg.jpg";
				}else{
					$img="parallax-bg-2.jpg";
				}

				$ruta = "../../../views/images/banners-seccion/".$img;
				
				$origen = imagecreatefromjpeg($datos["imagen"]);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1920, "height"=>315]);

				imagejpeg($destino, $ruta);

				$enviarDatos  = array('ruta' => $ruta);

				echo json_encode($enviarDatos);
			}

		}

	}//mostrarImagenController


}//GestorBannerController