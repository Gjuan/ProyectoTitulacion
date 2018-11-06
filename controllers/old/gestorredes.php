<?php


/**
* 
*/
class GestorRedesSociales
{

	public function listaRedesController(){

		$html = '';

		$respuesta = GestorRedesSocialesModell::lestaRedesModell("social");

		foreach ($respuesta as $row => $item) {

			$html.='  <div class="col-sm-12 col-md-6">
		                <div class="form-group">
		                  <label for="'.$item['bbh_nombre_red'].'">'.$item['bbh_nombre_red'].'</label>
		                  <input class="form-control social_red" id="'.$item['bbh_nombre_red'].'" name="'.$item['bbh_nombre_red'].'" value="'.$item['bbh_url_red'].'" maxlength="" placeholder="url -> '.$item['bbh_nombre_red'].'" type="text" required>
		                </div>
		              </div>';

		}

		echo $html;

	}//listaRedesController


	public function updateRed($dartos){

		$respuesta = GestorRedesSocialesModell::updateRedModell($dartos, "social");

		return $respuesta;
	}//updateRed
		
}//GestorRedesSociales