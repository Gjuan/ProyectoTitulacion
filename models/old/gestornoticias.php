<?php
require_once "conexion.php";
/**
* 
*/
class GestorArticulosModel{
	
	public function guardarArticulosModel($datos, $tabla){
		
		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (bbh_titulonoticia, bbh_contenidonoticia, bbh_imagennoticia, bbh_fechapublicacion, bbh_idusuario, bbh_estado, bbh_fechacreacion, bbh_resumen, bbh_video, bbh_categoria_id)VALUES(:titulo, :contenido, :imagen, :fechaPublicacion, :usuario, :estado, :fechaCreacion, :resumen , :video, :categoria)");
		$stmt -> bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datos['contenido'], PDO::PARAM_STR);
		$stmt -> bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaPublicacion", $datos['fechaPublicacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaCreacion", $datos['fechaCreacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":resumen", $datos['resumen'], PDO::PARAM_STR);
		$stmt -> bindParam(":video", $datos['video'], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria", $datos['Categoria'], PDO::PARAM_INT);
		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();


	}//guardarArticulosModel



	public function mostrarNoticiasVistaModel($tabla, $tabla2){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idnoticia, bbh_titulonoticia,bbh_contenidonoticia,bbh_imagennoticia,bbh_fechacreacion, bbh_categoria, estado, usuario FROM listanoticias ORDER BY bbh_idnoticia ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//mostrarNoticiasVistaModel



	public function eliminarArticulosModel($datos, $tabla){
	
		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE bbh_idnoticia = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}//eliminarArticulosModel



	public function editarArticulosModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_idnoticia, bbh_titulonoticia,bbh_contenidonoticia, bbh_resumen, bbh_id_categoria, bbh_categoria, bbh_imagennoticia,bbh_fechacreacion,bbh_video, estado, usuario FROM listanoticias WHERE bbh_idnoticia = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();

	}//mostrarNoticiasVistaModel


	public function editorArticulosModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET bbh_titulonoticia = :titulo , bbh_contenidonoticia = :contenido , bbh_imagennoticia = :imagen , bbh_fechapublicacion = :fechaPublicacion , bbh_idusuario = :usuario , bbh_estado = :estado , bbh_fechacreacion = :fechaCreacion , bbh_resumen = :resumen, bbh_video = :video , bbh_categoria_id = :categoria WHERE	bbh_idnoticia = :id");

		$stmt -> bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datos['contenido'], PDO::PARAM_STR);
		$stmt -> bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaPublicacion", $datos['fechaPublicacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaCreacion", $datos['fechaCreacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":resumen", $datos['resumen'], PDO::PARAM_STR);
		$stmt -> bindParam(":video", $datos['video'], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria", $datos['Categoria'], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos['noticiaId'], PDO::PARAM_INT);


		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}	

		$stmt -> close();

	}

	public function mostrarCategoriaModel($tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT bbh_id_categoria,bbh_categoria FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();


	}//mostrarNoticiaVistaModel

}//GestorArticulosModel