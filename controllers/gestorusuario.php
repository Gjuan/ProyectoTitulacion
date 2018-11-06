<?php	
/**
* 
*/
class gestorUsuarios{
	
	public function guardarUsuarioController(){

		if (isset($_POST['Cedula'])) {
			
			$Cedula = $_POST['Cedula'];
			$Roll = $_POST['Roll'];

			$datosController = array('Cedula' 		=> $Cedula,
									 'Nombres' 		=> $_POST['Nombres'],
									  'correo' 	    => $_POST['correo'],
									 'Apellidos' 	=> $_POST['Apellidos']);

			GestorUsuarioModel::guardarUsuarioModel($datosController,"persona");

			$respuesta = GestorUsuarioModel::getUltimoId("id_persona", "persona");

			//var_dump($respuesta);




			$ape = explode(" ", $_POST['Apellidos']);
			$nic=substr($_POST['Nombres'],0,1).''.$ape[0];


			$datosController1 = array('nick' 		=> $nic,
									  'pass' 		=> md5($Cedula),
									  'id_persona' 	=> $respuesta['idmax'],
									  'id_roll'		=> $Roll,
									  'estado'		=> 1);
			var_dump($datosController1);

			$respuesta1 = GestorUsuarioModel::guardarUsuario2Model($datosController1,"usuario");

			if ($respuesta1=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Usuario se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "nuevousuario";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}

	}//guardarUsuarioController


	public function listaUsuariosController(){

		$respuesta = GestorUsuarioModel::listaUsuariosModel("show_user");

		foreach ($respuesta as $row => $item) {


		if ($item['estado'] == "Activo") {
			$botonestado = '<button type="button" class="btn btn-primary btn-xs inc_user" value="'.$item['id_usuario'].'"><i class="fa fa-fw fa-circle-thin"></i> Desactivar</button>';
		}else{
			$botonestado = '<button type="button" class="btn btn-primary btn-xs act_user" value="'.$item['id_usuario'].'"><i class="fa fa-fw fa-circle"></i> Activar</button>';
		}

			echo ' <tr>
                  <td>'.$item['nick_name'].'</td>
                  <td>'.$item['nombrespersona'].'</td>
                  <td>'.$item['estadouser'].'</td>
                  <td>'.$item['descripcion'].'</td>
                  <td>
                  <button type="button" class="btn btn-primary btn-xs elm_user" value="'.$item['id_usuario'].'"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
                  
                  </td>
                </tr>';

		}

	}//listaUsuariosController


	public function eliminarUsuarioController($datos){

		$respuesta = GestorUsuarioModel::eliminarUsuarioModel($datos,"id_usuario","usuario");

		echo $respuesta;

	}//eliminarUsuarioController


	public function comboCantonController(){

		$respuesta = GestorUsuarioModel::listaCantonesModel("canton");

		$html='';

		foreach ($respuesta as $key => $item) {
			$html.='<option value="'.$item['id_canton'].'">'.$item['nombre_canton'].'</option>';
		}
		echo $html;

	}//comboCantonController




	public function guardarCuestionarioController(){

		if (isset($_POST['Tituloc'])) {
			
			$Tituloc = $_POST['Tituloc'];
			$canton = $_POST['canton'];


			$respuesta = GestorUsuarioModel::guardarCuestionarioModel($Tituloc,$canton, "cuestionario");

			$maxid = GestorUsuarioModel::getUltimoId("id_cuestionario", "cuestionario");

			GestorUsuarioModel::estadoUpdateModel($maxid, "actualizaciones");

			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡El Cuestionario se guardo Corectamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "cuestionario";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}

	}//guardarCuestionarioController


	public function listaCuestionarioController(){

		$respuesta = GestorUsuarioModel::listaCuestionarioModel("show_cuestionario");

		foreach ($respuesta as $row => $item) {


		if ($item['cuestionario_estado'] == "Activo") {
			$botonestado = '<button type="button" class="btn btn-primary btn-xs inc_ct" value="'.$item['id_cuestionario'].'"><i class="fa fa-fw fa-circle-thin"></i> Desactivar</button>';
		}else{
			$botonestado = '<button type="button" class="btn btn-primary btn-xs act_ct" value="'.$item['id_cuestionario'].'"><i class="fa fa-fw fa-circle"></i> Activar</button>';
		}

			echo ' <tr>
                  <td>'.$item['cod_cuestionario'].'</td>
                  <td>'.$item['cuestionario_estado'].'</td>
                 
                  <td>
                  <button type="button" class="btn btn-primary btn-xs elm_ct" value="'.$item['id_cuestionario'].'"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button> 
                  '.$botonestado.'
                  </td>
                  <td>
                  <a href="'.RUTABASE.'/tabulacion/'.$item['id_cuestionario'].'"> ver</a>
                  </td>
                    <td>
                  <a href="'.RUTABASE.'/tab/'.$item['id_cuestionario'].'"> ver</a>
                  </td>
                  <td>
                  <a href="'.RUTABASE.'/exportar/'.$item['id_cuestionario'].'"> ver</a>
                  </td>
                </tr>';


		}

	}//listaCuestionarioController


	public function dropRegistroController($datos){

		$respuesta = GestorUsuarioModel::eliminarRegistroModel($datos, "id_cuestionario", "cuestionario");

			GestorUsuarioModel::estadoUpdateModel($datos, "actualizaciones");

		echo $respuesta;

	}//dropRegistroController


	public function desactRegistroController($datos){

		$respuesta = GestorUsuarioModel::desactRegistroModel($datos, "cuestionario");

		GestorUsuarioModel::estadoUpdateModel($datos, "actualizaciones");

		echo $respuesta;

	}//desactRegistroController

	public function acttRegistroController($datos){

		$respuesta = GestorUsuarioModel::acttRegistroModel($datos, "cuestionario");
		GestorUsuarioModel::estadoUpdateModel($datos, "actualizaciones");
		echo $respuesta;

	}//acttRegistroController	



	public function cargarEncabezadosController(){

		$num = 0;

	    if(isset($_FILES['encabezados']))
	    {
	         $fname = $_FILES['encabezados']['name'];

	         $chk_ext = explode(".",$fname);
	 
	         if(strtolower(end($chk_ext)) == "csv")
	         {
	             $filename = $_FILES['encabezados']['tmp_name'];
	             $handle = fopen($filename, "r");
	 			


	             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
	             {
	             	if ($num >0) {

	             		$datos = array('encabezado' => $data[1],
	             						'estado' => $data[2],
	             						'id_cuestionario' => $data[3],
	             						'tipo' => $data[4]);

		             
		             	$respuesta = GestorUsuarioModel::guardarEncabezadoCuestionarioModel($datos, "encabezado");

					}
	              	
	              	$num++;
	             }

	             fclose($handle);

	           
	             	echo '
						<script>
			 				swal({
								title: "¡OK!",
								text: "¡Datos Cargados Correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "remote";
									}
							});	
						</script>
						';

	           

	         }else{
	             echo "Archivo invalido!";
	         }
	    }


	}//cargarEncabezadosController


	public function cargarPreguntasController(){

		$num = 0;

	    if(isset($_FILES['pregunstas']))
	    {
	         $fname = $_FILES['pregunstas']['name'];

	         $chk_ext = explode(".",$fname);
	 
	         if(strtolower(end($chk_ext)) == "csv")
	         {
	             $filename = $_FILES['pregunstas']['tmp_name'];
	             $handle = fopen($filename, "r");
	 			


	             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
	             {
	             	if ($num >0) {
		             	
	             		$datos = array('descripcion' => $data[1],
	             						'id_tipo_pregunta' => $data[3],
	             						'id_encabezado' => $data[2] );

		             	$respuesta = GestorUsuarioModel::guardarPreguntasCuestionarioModel($datos, "pregunta");

					}
	              	
	              	$num++;
	             }

	             fclose($handle);

	           
	             	echo '
						<script>
			 				swal({
								title: "¡OK!",
								text: "¡Datos Cargados Correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "remote";
									}
							});	
						</script>
						';

	           

	         }else{
	             echo "Archivo invalido!";
	         }
	    }


	}//cargarPreguntasController


	public function cargarPlantillaController(){

		$num = 0;

	    if(isset($_FILES['plantillas']))
	    {
	         $fname = $_FILES['plantillas']['name'];

	         $chk_ext = explode(".",$fname);
	 
	         if(strtolower(end($chk_ext)) == "csv")
	         {
	             $filename = $_FILES['plantillas']['tmp_name'];
	             $handle = fopen($filename, "r");
	 			


	             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
	             {
	             	if ($num >0) {
		             	
	             		$datos = array('descripcion' => $data[1],
	             						'codigo_opcion' => $data[3],
	             						'num_plantilla' => $data[2],
	             						'orden' => $data[4],
	             						'ordenb'=> $data[5] );

		             	$respuesta = GestorUsuarioModel::guardarPlantillasCuestionarioModel($datos, "plantilla");

					}
	              	
	              	$num++;
	             }

	             fclose($handle);

	           
	             	echo '
						<script>
			 				swal({
								title: "¡OK!",
								text: "¡Datos Cargados Correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "remote";
									}
							});	
						</script>
						';

	           

	         }else{
	             echo "Archivo invalido!";
	         }
	    }


	}//cargarPlantillaController


	public function cargarOpcionesController(){

		$num = 0;

	    if(isset($_FILES['opcionesup']))
	    {
	         $fname = $_FILES['opcionesup']['name'];

	         $chk_ext = explode(".",$fname);
	 
	         if(strtolower(end($chk_ext)) == "csv")
	         {
	             $filename = $_FILES['opcionesup']['tmp_name'];
	             $handle = fopen($filename, "r");
	 			


	             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
	             {
	             	if ($num >0) {
		             	
	             		$datos = array('id_pregunta' 	=> $data[1],
	             						'num_plantilla' => $data[2],
	             						'descripcion' 	=> $data[3],
	             						'orden' 		=> $data[4]);

		             	$respuesta = GestorUsuarioModel::guardarOpcionesCuestionarioModel($datos, "opcion");

					}
	              	
	              	$num++;
	             }

	             fclose($handle);

	           
	             	echo '
						<script>
			 				swal({
								title: "¡OK!",
								text: "¡Datos Cargados Correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},
								function(isConfirm){
									if (isConfirm){
										window.location = "remote";
									}
							});	
						</script>
						';

	           

	         }else{
	             echo "Archivo invalido!";
	         }
	    }


	}//cargarOpcionesController
public function verificar(){

		$respuesta = GestorUsuarioModel::verificarmodel();

		foreach ($respuesta as $row => $item) {

			
		
	echo ' <tr>
          <td>'.$item['en_des'].' '.$item['pre'].'</td>
          <td>'.$item['criterio'].'</td>
           <td>'.$item['num_plantilla'].'</td>
          <td>
       <a class="btn btn-primary btn-xs  new_cuestion" id="valor" data-id="'.$item["id_resultado"]."-".$item["criterio"]."-".$item["num_plantilla"].'"><i class="fa fa-fw fa-trash-o"></i> Valorar</a> 
          
          </td>
        
        </tr>';

		}

	}



public function exportar(){

	$respuesta = GestorUsuarioModel::exportarmodel();
	$res = GestorUsuarioModel::encabezadomodel($_SESSION['id_c']);
	$html='';
	foreach ($res as $r => $it) {
				$html.='<th>'.$it['en'].'</th>';
			}
	$html.='</tr>
            </thead>
            <tbody>';
            $i=0;
		foreach ($respuesta as $row => $item) {
			$i++;
		$html.=' <tr>
	          <td>'.$i.'</td>
	          <td>'.$item['sexo'].'</td>
	          <td>'.$item['edad'].'</td>
	          <td>'.$item['edu'].'</td>
              <td>'.$item['ocu'].'</td>
              <td>'.$item['parr'].'</td>';
        $res = GestorUsuarioModel::preguntamodel($item['id_info']);

			foreach ($res as $r => $it) {
				$html.='<td>'.$it['cri'].'</td>';

		}
		$html.='</tr>';
		
	}
	echo $html;
}
}//gestorUsuarios