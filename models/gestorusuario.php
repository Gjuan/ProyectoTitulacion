<?php
require_once "conexion.php";

/**
* 
*/
class GestorUsuarioModel{
	
	public function guardarUsuarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (nombres, apellidos, estado, ceduala,correo)VALUES(:Nombres, :Apellidos, 1, :Cedula, :correo)");

		$stmt -> bindParam(":Cedula", $datos['Cedula'], PDO::PARAM_STR);
		$stmt -> bindParam(":Nombres", $datos['Nombres'], PDO::PARAM_STR);
		$stmt -> bindParam(":Apellidos", $datos['Apellidos'], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datos['correo'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarUsuarioModel


	public function estadoUpdateModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (cuestionario_id)VALUES(:id);");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//estadoUpdateModel


	public function guardarUsuario2Model($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (nick_name, contrasena, id_persona, id_rol, estado)VALUES(:nick, :pass, :id_persona, :id_roll, :estado)");

		$stmt -> bindParam(":nick", $datos['nick'], PDO::PARAM_STR);
		$stmt -> bindParam(":pass", $datos['pass'], PDO::PARAM_STR);
		$stmt -> bindParam(":id_persona", $datos['id_persona'], PDO::PARAM_INT);
		$stmt -> bindParam(":id_roll", $datos['id_roll'], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarUsuario2Model

	public function getUltimoId($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("SELECT MAX($datos) AS idmax FROM  $tabla");

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();

	}//getUltimoId


	public function listaUsuariosModel($tabla){
			
		$stmt = Conexion::conectar()->Prepare("SELECT * FROM $tabla WHERE estado <> 3 and id_rol <> 1");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//listaUsuariosModel


	public function eliminarUsuarioModel($datos, $campo, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE $campo = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}//eliminarUsuarioModel

	public function guardarCuestionarioModel($datos, $canton, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (cod_cuestionario,  estado, canton_id)VALUES(:Tituloc,1,$canton);");

		$stmt -> bindParam(":Tituloc", $datos, PDO::PARAM_STR);
		

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarCuestionarioModel


	public function listaCuestionarioModel($tabla){
			
		$stmt = Conexion::conectar()->Prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//listaCuestionarioModel

	public function listaCantonesModel($tabla){
			
		$stmt = Conexion::conectar()->Prepare("SELECT id_canton, nombre_canton, cod_canton, provincia_id  FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}//listaCantonesModel	


	public function eliminarRegistroModel($datos, $campo, $tabla){

		$stmt = Conexion::conectar()->Prepare("DELETE FROM $tabla WHERE $campo = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}//eliminarUsuarioModel


	public function desactRegistroModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET estado = 2 WHERE id_cuestionario = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();		

	}//desactRegistroModel	

	public function acttRegistroModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("UPDATE $tabla SET estado = 1 WHERE id_cuestionario = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt -> execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();		

	}//acttRegistroModel		


	public function guardarEncabezadoCuestionarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (descripcion, estado, cuestionario_id, tipo )VALUES(:encabezado, :estado, :id_cuestionario, :tipo)");

		$stmt -> bindParam(":encabezado", $datos['encabezado'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
		$stmt -> bindParam(":id_cuestionario", $datos['id_cuestionario'], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo", $datos['tipo'], PDO::PARAM_STR);
		

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarEncabezadoCuestionarioModel


	public function guardarPreguntasCuestionarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (descripcion, id_tipo_pregunta, id_encabezado)VALUES( :descripcion, :id_tipo_pregunta, :id_encabezado)");

		$stmt -> bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":id_tipo_pregunta", $datos['id_tipo_pregunta'], PDO::PARAM_INT);
		$stmt -> bindParam(":id_encabezado", $datos['id_encabezado'], PDO::PARAM_INT);
		

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarPreguntasCuestionarioModel	


	public function guardarPlantillasCuestionarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (descripcion, codigo_opcion, num_plantilla, orden, ordenb)VALUES(:descripcion, :codigo_opcion, :num_plantilla, :orden, ordenb)");

		$stmt -> bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":codigo_opcion", $datos['codigo_opcion'], PDO::PARAM_INT);
		$stmt -> bindParam(":num_plantilla", $datos['num_plantilla'], PDO::PARAM_INT);
		$stmt -> bindParam(":orden", $datos['orden'], PDO::PARAM_INT);
		$stmt -> bindParam(":ordenb", $datos['ordenb'], PDO::PARAM_INT);
		

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarPlantillasCuestionarioModel	


	public function guardarOpcionesCuestionarioModel($datos, $tabla){

		$stmt = Conexion::conectar()->Prepare("INSERT INTO $tabla (id_pregunta, num_plantilla, descripcion, orden)VALUES(:id_pregunta, :num_plantilla, :descripcion, :orden)");

		$stmt -> bindParam(":id_pregunta", $datos['id_pregunta'], PDO::PARAM_INT);
		$stmt -> bindParam(":num_plantilla", $datos['num_plantilla'], PDO::PARAM_INT);
		$stmt -> bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $datos['orden'], PDO::PARAM_INT);
	

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();

	}//guardarOpcionesCuestionarioModel	

public function verificarmodel(){
			
		$stmt = Conexion::conectar()->Prepare("SELECT encabezado.descripcion AS en_des ,pregunta.descripcion AS pre, criterio,id_resultado,pregunta.id_pregunta 									AS id_pre, opcion.num_plantilla
												FROM resultado, pregunta, opcion, encabezado
												WHERE resultado.opcion_id=opcion.id_opcion 
												AND pregunta.id_pregunta=opcion.id_pregunta 
												AND criterio IS NOT NULL AND criterio <>'0'
												AND encabezado.id_encabezado=pregunta.id_encabezado");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}






public function exportarmodel(){
			
		$stmt = Conexion::conectar()->Prepare("SELECT  id_info_encuesta as id_info, sexo.descripcion AS sexo, edad.descripcion AS edad, educacion.descripcion AS edu, ocupacion.descripcion AS ocu, parroquia.descripcion AS parr FROM info_encuesta, sexo, edad, educacion,ocupacion ,parroquia  
WHERE info_encuesta.cod_sexo=sexo.id_sexo 
AND info_encuesta.cod_edad=edad.id_edad 
AND info_encuesta.cod_educacion=educacion.id_educacion
AND info_encuesta.cod_ocupacion=ocupacion.id_ocupacion
AND info_encuesta.cod_parroquia=parroquia.id_parroquia
");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}

public function preguntamodel($id){
			
		$stmt = Conexion::conectar()->Prepare("SELECT encabezado.descripcion AS en , plantilla.descripcion AS cri  FROM resultado, pregunta, opcion, plantilla, encabezado WHERE resultado.id_encuesta=$id 
AND resultado.id_plantilla=plantilla.id_plantilla 
AND resultado.opcion_id=opcion.id_opcion
AND opcion.id_pregunta=pregunta.id_pregunta
and pregunta.id_encabezado=encabezado.id_encabezado");


		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}

public function encabezadomodel($id){
			
		$stmt = Conexion::conectar()->Prepare("SELECT encabezado.descripcion AS en FROM  encabezado WHERE encabezado.cuestionario_id=$id ");


		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

	}



}//GestorUsuarioModel