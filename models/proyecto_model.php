<?php
class proyectomodel{
	public function lis_proyecto_model($id){
		$stmt= Conexion::conectar()->prepare("SELECT proyecto.id_proyecto,proyecto.proyecto , proyecto.detalle, observacion, fecha_creacion,fecha_entrega, porcentaje, CONCAT(per1.nombres,' ',per1.apellidos) AS persona1 ,CONCAT(per2.nombres,' ',per2.apellidos) AS persona2, id_asignacion
FROM proyecto, usuario AS user1 ,usuario AS user2 ,persona AS per1,persona AS per2, asignacion 
WHERE proyecto.id_usuario=user1.id_usuario 
AND proyecto.estado=$id
AND per1.id_persona=user1.id_persona 
AND per2.id_persona=user2.id_persona 
AND user2.id_usuario=asignacion.id_usuario  
AND proyecto.id_proyecto=asignacion.id_proyecto
");
		$stmt->execute();
		return $stmt-> fetchAll();
	    $stmt->close();
  }
   
    public function lis_categoria_model(){
        $stmt= Conexion::conectar()->prepare("SELECT * FROM categoria ");
        $stmt->execute();
        return $stmt-> fetchAll();
        $stmt->close();
  }
 
  public function combo_cat_model(){
    $stmt= Conexion::conectar()->prepare("SELECT id_sub_categoria AS id , sub_cat AS cat FROM sub_categoria where estado='A'");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }
    public function combo_persona_model(){
    $stmt= Conexion::conectar()->prepare("SELECT id_usuario AS id , nombres ,apellidos FROM persona,usuario WHERE persona.id_persona=usuario.id_persona");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }


    public function lis_evidencia_model($id){
    $stmt= Conexion::conectar()->prepare("

SELECT proyecto.id_proyecto, proyecto.detalle,porcentaje_evi,proyecto.proyecto,fecha_evi,  fecha_creacion,fecha_entrega, porcentaje, CONCAT(persona.nombres,' ',persona.apellidos) AS persona1, evidencia.detalle AS evi, evidencia.ruta_doc
FROM proyecto, usuario,persona , asignacion,evidencia
WHERE  proyecto.id_proyecto=asignacion.id_proyecto
AND  usuario.id_usuario=asignacion.id_usuario 
AND  persona.id_persona=usuario.id_persona 
AND evidencia.id_asignacion=asignacion.id_asignacion
AND asignacion.id_asignacion=$id

");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }
   
  public function lisuser_proyecto_model($id,$user){
    $stmt= Conexion::conectar()->prepare("SELECT per1.id_persona, proyecto.id_proyecto,proyecto.proyecto , proyecto.detalle, observacion, fecha_creacion,fecha_entrega, porcentaje, CONCAT(per1.nombres,' ',per1.apellidos) AS persona1 ,CONCAT(per2.nombres,' ',per2.apellidos) AS persona2, id_asignacion
FROM proyecto, usuario AS user1 ,usuario AS user2 ,persona AS per1,persona AS per2, asignacion 
WHERE proyecto.id_usuario=user1.id_usuario 
AND proyecto.estado=$id
AND per1.id_persona=user1.id_persona 
AND per2.id_persona=user2.id_persona 
AND user2.id_usuario=asignacion.id_usuario  
AND proyecto.id_proyecto=asignacion.id_proyecto
and user2.id_usuario=$user
");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }



  public function lis_subcategoria_model(){
        $stmt= Conexion::conectar()->prepare("SELECT id_sub_categoria, categoria,sub_cat, sub_categoria.estado  FROM categoria,sub_categoria where categoria.id_categoria=sub_categoria.id_categoria");
        $stmt->execute();
        return $stmt-> fetchAll();
        $stmt->close();
  }
 
  public function lis_proyectogeneral_model(){
    $stmt= Conexion::conectar()->prepare("SELECT COUNT(id_proyecto) as valor, estado FROM proyecto GROUP BY estado");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }

    public function lis_usergeneral_model(){
    $stmt= Conexion::conectar()->prepare("SELECT COUNT(proyecto.id_proyecto) AS valor, persona.nombres, persona.apellidos , usuario.id_usuario as usuario FROM proyecto,usuario,persona,asignacion 
WHERE proyecto.id_proyecto=asignacion.id_proyecto 
AND usuario.id_usuario=asignacion.id_usuario 
AND persona.id_persona=usuario.id_persona 
GROUP BY usuario.id_usuario");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }


  public function lis_proyecto_usuario_model($id){
    $stmt= Conexion::conectar()->prepare("SELECT proyecto.id_proyecto,proyecto.proyecto , proyecto.detalle, observacion, fecha_creacion,fecha_entrega, porcentaje, CONCAT(per1.nombres,' ',per1.apellidos) AS persona1 ,CONCAT(per2.nombres,' ',per2.apellidos) AS persona2, id_asignacion,proyecto.estado
FROM proyecto, usuario AS user1 ,usuario AS user2 ,persona AS per1,persona AS per2, asignacion 
WHERE proyecto.id_usuario=user1.id_usuario 
and user2.id_usuario=$id
AND per1.id_persona=user1.id_persona 
AND per2.id_persona=user2.id_persona 
AND user2.id_usuario=asignacion.id_usuario  
AND proyecto.id_proyecto=asignacion.id_proyecto
");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }

public function guardarproyectoModel($datos){

    $stmt = Conexion::conectar()->Prepare("INSERT INTO proyecto ( proyecto,  fecha_entrega,   id_sub_categoria,   id_usuario,   observacion,   detalle,   estado,   porcentaje)VALUES(:proyecto, :fecha, :cat,:usuario, :observacion, :detalle,1 ,0)");

    $stmt -> bindParam(":proyecto", $datos['proyecto'], PDO::PARAM_STR);
    $stmt -> bindParam(":detalle", $datos['detalle'], PDO::PARAM_STR);
    $stmt -> bindParam(":observacion", $datos['observacion'], PDO::PARAM_STR);
      $stmt -> bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
    $stmt -> bindParam(":cat", $datos['cat'], PDO::PARAM_STR);
    $stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }
   public function lis_user_proyecto_model(){
    $stmt= Conexion::conectar()->prepare("SELECT COUNT(proyecto.id_proyecto) AS valor, persona.nombres, persona.apellidos , usuario.id_usuario as usuario FROM proyecto,usuario,persona,asignacion 
WHERE proyecto.id_proyecto=asignacion.id_proyecto 
AND usuario.id_usuario=asignacion.id_usuario 
AND persona.id_persona=usuario.id_persona 
GROUP BY usuario.id_usuario");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }



public function correoModel($id){
    $stmt= Conexion::conectar()->prepare("SELECT correo,nombres,apellidos FROM persona where id_persona=$id");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }



public function correo1Model($id){
    $stmt= Conexion::conectar()->prepare("SELECT correo,nombres,apellidos FROM persona,usuario where usuario.id_persona=persona.id_persona and usuario.id_usuario=$id");
    $stmt->execute();
    return $stmt-> fetchAll();
    $stmt->close();
  }









  //////////////////////////////////////////////////////////////////////////INGRESOS////////////////////////////////////////////////////////////////////////////////////

public function guardarAsignacionModel($datos){

    $stmt = Conexion::conectar()->Prepare("INSERT INTO asignacion (id_proyecto,  id_usuario,  estado,  detalle)VALUES(:id_proyecto, :id_usuario, 'A','Ninguno')");

    $stmt -> bindParam(":id_proyecto", $datos['id_proyecto'], PDO::PARAM_INT);
    $stmt -> bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);


    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }//guardarproyectoModel


public function guardarcatModel($datos){

    $stmt = Conexion::conectar()->Prepare("INSERT INTO categoria (categoria,  estado)VALUES(:cat, 'A')");

    $stmt -> bindParam(":cat", $datos, PDO::PARAM_STR);


    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }//guardarproyectoModel

public function guardarsubcatModel($sub,$cat){

    $stmt = Conexion::conectar()->Prepare("INSERT INTO sub_categoria (sub_cat,  estado, id_categoria)VALUES(:cat, 'A',:idcat)");

    $stmt -> bindParam(":cat", $sub, PDO::PARAM_STR);
       $stmt -> bindParam(":idcat", $cat, PDO::PARAM_STR);


    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }//guardarproyectoModel







public function guardarEvidenciaModel($id,$detalle,$ruta,$por){

    $stmt = Conexion::conectar()->Prepare("INSERT INTO evidencia (detalle, id_asignacion, ruta_doc ,porcentaje_evi)VALUES(:detalle, :id ,:ruta,:por)");

   
    $stmt -> bindParam(":detalle", $detalle, PDO::PARAM_STR);
     $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
    $stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
        $stmt -> bindParam(":por", $por, PDO::PARAM_STR);


    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }



public function update_porcentaje_Model($id,$por){

    $stmt = Conexion::conectar()->Prepare("UPDATE proyecto SET  porcentaje=$por WHERE id_proyecto=$id");



    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }
public function update_pro_Model($id){

    $stmt = Conexion::conectar()->Prepare("UPDATE proyecto SET  estado=2 WHERE id_proyecto=$id");



    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }

  public function update_pro_caducado_Model($fecha){

    $stmt = Conexion::conectar()->Prepare("UPDATE proyecto SET  estado=3 WHERE fecha_entrega < :fecha AND estado='1' ");
     $stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
   
//echo $fecha;

    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }

  public function ActualizarProyectoModel($datos){
      

    $stmt = Conexion::conectar()->Prepare("UPDATE proyecto SET proyecto=:proyecto, detalle=:detalle, observacion=:observacion ,fecha_entrega=:fecha, id_sub_categoria=:cat , estado=:estado WHERE id_proyecto=:id ");
    $stmt -> bindParam(":id", $datos['id'], PDO::PARAM_STR);
    $stmt -> bindParam(":proyecto", $datos['proyecto'], PDO::PARAM_STR);
    $stmt -> bindParam(":detalle", $datos['detalle'], PDO::PARAM_STR);
    $stmt -> bindParam(":observacion", $datos['observacion'], PDO::PARAM_STR);
    $stmt -> bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
    $stmt -> bindParam(":cat", $datos['cat'], PDO::PARAM_STR);
     $stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);



//echo $fecha;

    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }

public function ActulizarAsignacionModel($datos){

    $stmt = Conexion::conectar()->Prepare("UPDATE asignacion SET  id_usuario=:id_usuario WHERE id_proyecto= :id_proyecto");

    $stmt -> bindParam(":id_proyecto", $datos['id'], PDO::PARAM_INT);
    $stmt -> bindParam(":id_usuario", $datos['usuario'], PDO::PARAM_INT);


    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }//guardarproyectoModel



public function ActualizarCatProyectoModel($datos){

    $stmt = Conexion::conectar()->Prepare("UPDATE categoria  SET  categoria=:cat , estado=:estado WHERE id_categoria=:id");
    $stmt -> bindParam(":id", $datos['id'], PDO::PARAM_INT);
    $stmt -> bindParam(":cat", $datos['cat'], PDO::PARAM_STR);
    $stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }


public function ActualizarSubCatProyectoModel($datos){

    $stmt = Conexion::conectar()->Prepare("UPDATE sub_categoria  SET  sub_cat=:sub , id_categoria=:id_cat , estado=:estado WHERE id_sub_categoria=:id");

      $stmt -> bindParam(":id", $datos['id'], PDO::PARAM_INT);
      $stmt -> bindParam(":id_cat", $datos['idcat'], PDO::PARAM_INT);
      $stmt -> bindParam(":sub", $datos['subcat'], PDO::PARAM_STR);
      $stmt -> bindParam(":estado", $datos['estado'], PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }

  public function ActualizarEvidenciaProyectoModel($datos){

    $stmt = Conexion::conectar()->Prepare("UPDATE evidencia  SET  detalle=:detalle , ruta=:ruta , porcentaje=:por WHERE id_categoria=:id");

    $stmt -> bindParam(":id", $datos['id'], PDO::PARAM_INT);
    $stmt -> bindParam(":cat", $datos['detalle'], PDO::PARAM_STR);
    $stmt -> bindParam(":estado", $datos['ruta'], PDO::PARAM_STR);
    $stmt -> bindParam(":por", $datos['por'], PDO::PARAM_STR);
    if ($stmt -> execute()) {
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();

  }


   public function lis_proyecto_x_usuario_model($id){
    $stmt= Conexion::conectar()->prepare("SELECT COUNT(proyecto.id_proyecto) AS valor, proyecto.estado, persona.nombres , persona.apellidos 
 FROM proyecto,usuario,persona,asignacion 
WHERE proyecto.id_proyecto=asignacion.id_proyecto 
AND usuario.id_usuario=asignacion.id_usuario 
AND persona.id_persona=usuario.id_persona
AND usuario.id_usuario=$id
GROUP BY proyecto.estado");
    $stmt->execute();
    return $stmt-> fetchAll();
      $stmt->close();
  }

}

?>