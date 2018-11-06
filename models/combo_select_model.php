<?php
class combo_model{
	public function combo_sexo_model(){
		$stmt= Conexion::conectar()->prepare("SELECT id_sexo AS id , descripcion AS des FROM sexo");
		$stmt->execute();
		return $stmt-> fetchAll();
	  $stmt->close();
  }
    public function combo_edad_model(){
    $stmt= Conexion::conectar()->prepare("SELECT id_edad AS id , descripcion AS des FROM edad");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }
    public function combo_edu_model(){
    $stmt= Conexion::conectar()->prepare("SELECT id_educacion AS id , descripcion AS des FROM educacion");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }
    public function combo_parro_model(){
    $stmt= Conexion::conectar()->prepare("SELECT id_parroquia AS id , descripcion AS des FROM parroquia");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }
    public function combo_ocu_model(){
    $stmt= Conexion::conectar()->prepare("SELECT id_ocupacion AS id , descripcion AS des FROM ocupacion");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }

}