 <?php
/**
* 
*/
class Ingreso
{
	
	public function ingresoController()
	{
		if (isset($_POST["usuarioIngreso"])) {
		
		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["claveIngreso"]) ) {
			
	
			$datosController = array ("usuario" => $_POST["usuarioIngreso"], "clave" => $_POST["claveIngreso"]);

			$respuesta = IngresoModels::ingresoModel($datosController,'show_user');

				$rolDescripcion 	= $respuesta['descripcion'];
				$rolId 				= $respuesta['id_rol'];
				$nombres			= $respuesta['nombrespersona'];
				$cedula				= $respuesta['ceduala'];
				$estadoDescripcion 	= $respuesta['estadouser'];
				$estadoId 		   	= $respuesta['estado'];
				$user 				= $respuesta['nick_name'];
				$idUser 			= $respuesta['id_usuario'];
				$pass 				= $respuesta['contrasena'];

				if ($estadoDescripcion == 'Activo') {
				
				
					
						if($user == $_POST["usuarioIngreso"] && $pass == md5($_POST["claveIngreso"])){

							#inicio de session
							//session_start();
							$_SESSION['validar'] 	= true;
							$_SESSION['usuario'] 	= $user;
							$_SESSION['idUsuario'] 	= $idUser;
							$_SESSION['User_datos']	= array('rolDescripcion' 	=> $rolDescripcion,
															'rolId' 			=> $rolId,
															'nombres' 			=> $nombres,
															'cedula' 			=> $cedula,
															'estadoDescripcion' => $estadoDescripcion,
															'estadoId' 			=> $estadoId,
															'user' 				=> $user,
															'idUser' 			=> $idUser);

							if ($rolId == 1) {
								$_SESSION['admin'] 	= true;
							}else{
								$_SESSION['admin'] 	= false;
							}



							$fecha= date('Y-m-d');


							$pro=proyectomodel::update_pro_caducado_Model($fecha);






							$dir=RUTABASE.'/inicio';					#inicio de session
							header("location: ".$dir);

						}else{
							echo '<br><div class="alert alert-warning alert-dismissible">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						                <h4><i class="icon fa fa-warning"></i> Error!</h4>
						               USUARIO INCORRECTO.
						              </div>';
						}

				}else{

							echo '<br><div class="alert alert-warning alert-dismissible">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						                <h4><i class="icon fa fa-warning"></i> Error!</h4>
						                El usuario <b><u>'.$user.'</u></b>  Inactivo.
						              </div>';							
				}
			}

		}//si hay post
	}//ingresoController


	public function MingresoController()
	{
		if (isset($_POST["MusuarioIngreso"])) {
		
		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["MusuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["claveIngreso"]) ) {
			
	
			$datosController = array ("usuario" => $_POST["MusuarioIngreso"], "clave" => $_POST["claveIngreso"]);

			$respuesta = IngresoModels::ingresoModel($datosController,'show_user');

				$rolDescripcion 	= $respuesta['descripcion'];
				$rolId 				= $respuesta['id_rol'];
				$nombres			= $respuesta['nombrespersona'];
				$cedula				= $respuesta['ceduala'];
				$estadoDescripcion 	= $respuesta['estadouser'];
				$estadoId 		   	= $respuesta['estado'];
				$user 				= $respuesta['nick_name'];
				$idUser 			= $respuesta['id_usuario'];
				$pass 				= $respuesta['contrasena'];

				if ($estadoDescripcion == 'Activo') {
				
				
					
						if($user == $_POST["MusuarioIngreso"] && $pass == md5($_POST["claveIngreso"])){

							
							$datos	= array('rolDescripcion' 	=> $rolDescripcion,
															'rolId' 			=> $rolId,
															'nombres' 			=> $nombres,
															'cedula' 			=> $cedula,
															'estadoDescripcion' => $estadoDescripcion,
															'estadoId' 			=> $estadoId,
															'user' 				=> $user,
															'idUser' 			=> $idUser);

							echo json_encode($datos);

						}else{
							echo 'error usuario o clave incorrecta';
						}

				}else{

							echo 'usuario inactivo';							
				}
			}

		}//si hay post
	}//MingresoController	

}