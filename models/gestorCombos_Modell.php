<?php

require_once "conexion.php";

class combosModell{

	public function mostrarProvinciaComboModell($table){
		$stmt= Conexion::conectar()->prepare("SELECT id_provincia, nombre_provincia, cod_provincia FROM $table");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//mostrarProvinciaComboModell

	public function mostrarCantonComboModell($dato, $table){
		$stmt= Conexion::conectar()->prepare("SELECT id_canton, nombre_canton, cod_canton, provincia_id FROM $table  WHERE provincia_id = $dato ");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//mostrarCantonComboModell

	public function mostrarParroquiaComboModell($dato, $table){
		$stmt= Conexion::conectar()->prepare("SELECT id_parroquia, descripcion, cod_parroquia, id_parroquia_categoria, canton_id FROM $table WHERE canton_id = $dato ");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//mostrarParroquiaComboModell  

	public function mostrarRecintoElectComboModell($dato, $table){
		$stmt= Conexion::conectar()->prepare("SELECT ctl_id_recinto, ctl_recinto, ctl_lat, ctl_long, ctl_zona, ctl_descripcion_zona FROM $table WHERE ctl_zona =  $dato ");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//mostrarRecintoElectComboModell    	

  	public function	listaJuntasSinIngresarModell($dato, $table){
  		$stmt= Conexion::conectar()->prepare("SELECT ctl_id_junta, ctl_numero_junta, ctl_genero, ctl_num_padrom, ctl_recinto_id FROM $table WHERE ctl_recinto_id = $dato AND ctl_id_junta NOT IN (SELECT ctl_junta_id FROM ctl_voto)");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//listaJuntasSinIngresarModell

  	public function	mostrarDignidadesComboModell($table){
  		$stmt= Conexion::conectar()->prepare("SELECT ctl_id_dignidad, ctl_dignidad, ctl_alcance FROM $table");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//mostrarDignidadesComboModell


  	public function	ListaCandidatosModell( $zona,$alcance, $table){
  		$stmt= Conexion::conectar()->prepare("SELECT ctl_id_postulacion, ctl_id_zona_postulada , ctl_id_candidato, ctl_candidato, ctl_lista, ctl_inicial, ctl_id_dignidad, ctl_dignidad, ctl_alcance FROM $table WHERE ctl_alcance = $alcance AND ctl_id_zona_postulada = $zona ");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//ListaCandidatosModell  	


  	  public function ListaCandidatosModell1( $canton, $alcance, $parroquia, $table){
  		$stmt= Conexion::conectar()->prepare("SELECT ctl_id_postulacion, ctl_id_zona_postulada, ctl_id_zona_canton, ctl_id_zona_parroquia, ctl_id_candidato, ctl_candidato, ctl_lista, ctl_inicial, ctl_id_dignidad, ctl_dignidad, ctl_alcance FROM listacandidatos WHERE ctl_alcance = $alcance AND ctl_id_zona_canton = $canton AND ctl_id_zona_parroquia = $parroquia OR ctl_id_zona_parroquia = 'U' ");
		$stmt->execute();
		return $stmt-> fetchAll();
	  	$stmt->close();
  	}//ListaCandidatosModell1  	  	


  	public function saveDataVotosModell($datos, $table){

  		$stmt = Conexion::conectar()->Prepare("INSERT INTO ctl_voto 
		  (ctl_junta_id, ctl_voto_blanco, ctl_voto_nulo, ctl_voto_valido, ctl_observacion, ctl_bool)
		  VALUES(:junta, :Blancos, :Nulos, :Validos, :obsc, '0')");

		$stmt -> bindParam(":junta", $datos['junta'], PDO::PARAM_INT);
		$stmt -> bindParam(":Blancos", $datos['Blancos'], PDO::PARAM_INT);
		$stmt -> bindParam(":Nulos", $datos['Nulos'], PDO::PARAM_INT);
		$stmt -> bindParam(":Validos", $datos['Validos'], PDO::PARAM_INT);
		$stmt -> bindParam(":obsc", $datos['obsc'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		
	  }//saveDataVotosModell
	  
	  public function getUltimoIdVotos_model($table){

		$stmt = Conexion::conectar()->Prepare("SELECT MAX(ctl_id_voto) AS idmax FROM  $table ");
		$stmt -> execute();
		return $stmt -> fetch();		
		$stmt -> close();

	}//getUltimoIdVotos_model


	  public function saveDataVotoSimplificadoModell($datos, $table){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $table 
		(ctl_postulacion_id, ctl_num_voto, ctl_voto_id)
		VALUES(:candidato, :votos, :idVoto)");

	  $stmt -> bindParam(":idVoto", $datos['idVoto'], PDO::PARAM_INT);
	  $stmt -> bindParam(":candidato", $datos['candidato'], PDO::PARAM_INT);
	  $stmt -> bindParam(":votos", $datos['votos'], PDO::PARAM_INT);

	  if ($stmt -> execute()) {
		  return "ok";
	  }else{
		  return "error";
	  }

	  $stmt -> close();
	  
	}//saveDataVotoSimplificadoModell


}//combosModell