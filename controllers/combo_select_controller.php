<?php

class combo_select_parametro{

public function combo_sexo(){
		
	 	$respuesta = combo_model::combo_sexo_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["des"].'</option>';

		}

	}


public function combo_edad(){
		
	 	$respuesta = combo_model::combo_edad_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["des"].'</option>';

		}

	}

	public function combo_edu(){
		
	 	$respuesta = combo_model::combo_edu_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["des"].'</option>';

		}

	}
	public function combo_parro(){
		
	 	$respuesta = combo_model::combo_parro_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["des"].'</option>';

		}

	}	
	public function combo_ocu(){
		
	 	$respuesta = combo_model::combo_ocu_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["des"].'</option>';

		}

	}
}