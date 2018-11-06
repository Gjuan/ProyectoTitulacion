<?php

/**
* 
*/
class GestorCategoriaController{

	public function mostarCategoria(){

		$html = '<option value="">Seleccione una opcion...</option>';

		$respuesta = GestorCategoriaModel::mostrarCategoriaModel("categoria");

			foreach ($respuesta as $row => $item) {

			$html .='<option id="cat-'.$item['bbh_id_categoria'].'" value="'.$item['bbh_id_categoria'].'">'.$item['bbh_categoria'].'</option>';

			}

		echo $html;
	}//mostarCategoria

}//GestorCategoriaController