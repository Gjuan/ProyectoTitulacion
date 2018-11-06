<?php

class proyectocontroller{


	public function lis_proyecto_controller(){
	   $respuesta = proyectomodel::lis_proyecto_model($_SESSION['id_c']);
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<tr>
				 <td>'.$item['proyecto'].'</td>
                  <td>'.$item['detalle'].'</td>
                  <td>'.$item['observacion'].'</td>
                  <td>'.$item['persona1'].'</td>
                  <td>'.$item['persona2'].'</td>
                  <td>'.$item['fecha_creacion'].'</td>
                  <td>'.$item['fecha_entrega'].'</td>
               		 <td><a href="'.RUTABASE.'/lis_evidencia/'.$item['id_asignacion'].'">Ver</a></td>
               		  <td>'.$item['porcentaje'].'</td>
                  <td> <a class="btnn btn-primary btn-xs  new_cuestion" id="valor" data-id="'.$item["proyecto"].'/'.$item['detalle'].'/'.$item['observacion'].'/'.$item['fecha_entrega'].'/'.$item['id_proyecto'].'"><i class="fa fa-fw fa-trash-o"></i> Editar</a> </td>
				 </tr>';

		}

	}

		public function lis_categoria_controller(){
	   $respuesta = proyectomodel::lis_categoria_model($_SESSION['id_c']);
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<tr>
				 <td>'.$item['categoria'].'</td>
                  <td>'.$item['estado'].'</td>
                <td> <a class="btnn btn-primary btn-xs  new_cuestion" id="valor" data-id="'.$item["id_categoria"].'/'.$item['categoria'].'"><i class="fa fa-fw fa-trash-o"></i> Editar</a> </td>
				 </tr>';

		}

	}
	public function combo_categoria(){
		
	 	$respuesta = proyectomodel::lis_categoria_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id_categoria"].'">'.$item["categoria"].'</option>';

		}

	}

public function combo_cat(){
		
	 	$respuesta = proyectomodel::combo_cat_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["cat"].'</option>';

		}

	}


public function combo_per(){
		
	 	$respuesta = proyectomodel::combo_persona_model();
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';

		}

	}

	public function lis_evidencia_controller(){
	   $respuesta = proyectomodel::lis_evidencia_model($_SESSION['id_c']);
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<tr>
				 <td>'.$item['proyecto'].'</td>
                  <td>'.$item['detalle'].'</td>
                  <td>'.$item['persona1'].'</td> 
                  <td>'.$item['fecha_creacion'].'</td>
                  <td>'.$item['fecha_entrega'].'</td>
                  <td>'.$item['porcentaje_evi'].'</td>
                   <td>'.$item['fecha_evi'].'</td>
               	  <td>'.$item['evi'].'</td>
                  <td><a target="_blank" href="'.RUTABASE.'/views/documentos/'.$item['ruta_doc'].'"> ver</a></td>
				 </tr>';

		}

	}


		public function lisuser_proyecto_controller(){
	   $respuesta = proyectomodel::lisuser_proyecto_model($_SESSION['id_c'],$_SESSION['idUsuario']);
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<tr>
				 <td>'.$item['proyecto'].'</td>
                  <td>'.$item['detalle'].'</td>
                  <td>'.$item['observacion'].'</td>
                  <td>'.$item['persona1'].'</td>
                  <td>'.$item['persona2'].'</td>
                  <td>'.$item['fecha_creacion'].'</td>
                  <td>'.$item['fecha_entrega'].'</td>
               		 <td><a href="'.RUTABASE.'/lis_evidencia/'.$item['id_asignacion'].'">Ver</a></td>
               		  <td>'.$item['porcentaje'].'</td>
                 <td>';
                 	if($_SESSION['id_c']=='1'){
                 	echo '<a class="btnn btn-primary btn-xs  new_cuestion" id="valor" data-id="'.$item["id_asignacion"].'-'.$item['id_proyecto'].'-'.$item['id_persona'].'-'.$item['proyecto'].'"> Subir</a> ';
      	                 	}else {
      	                 		echo '<a class="btn-primary btn-xs" id="valor" > Denegado</a> ';
      	                 	}
          
         echo '</td>     
				 </tr>';
				

		}

	}
	public function lis_subcategoria_controller(){
	   $respuesta = proyectomodel::lis_subcategoria_model($_SESSION['id_c']);
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
			echo'<tr>
				 <td>'.$item['categoria'].'</td>
				  <td>'.$item['sub_cat'].'</td>
                  <td>'.$item['estado'].'</td>
                 <td> <a class="btnn btn-primary btn-xs  new_cuestion" id="valor" data-id="'.$item["id_sub_categoria"].'/'.$item['sub_cat'].'"><i class="fa fa-fw fa-trash-o"></i> Editar</a> </td>
				 </tr>';

		}

	}





	public function lis_proyectogeneral_controller(){
	   $respuesta = proyectomodel::lis_proyectogeneral_model();
	   	$cadena="['Task', 'Hours per Day']";

		

			
		foreach($respuesta as $row => $item){
			if ($item['estado']==1){
				$proyecto='En Proceso';
			}elseif ($item['estado']==2) {
				$proyecto='Finalizado';
				# code...
			}elseif ($item['estado']==3) {
				$proyecto='Caducados';
				# code...
			}
			 $cadena=$cadena.',["'.$proyecto.' '.$item['valor'].'",'.$item['valor'].' ]';

			echo'<tr>
				<td>'.$proyecto.'</td>
                <td>'.$item['valor'].'</td>
                <td><a href="'.RUTABASE.'/lis_proyecto/'.$item['estado'].'">Ver</a></td>
               	</tr>';

		}
		echo'</tbody>
              </table>';
?>


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	<?php echo $cadena; ?>
         
        ]);

        var options = {
          title: 'Grafico Demostrativo',
          is3D:true,
          //slices: {0: {color: 'red'}, 1:{color: 'blue'}, 2:{color: 'green'}, 3: {color: 'green'}, 4:{color: 'grey'}}
     
     
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
   <center>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
</center>
<?php


	}


public function lis_usergeneral_controller(){
	   $respuesta = proyectomodel::lis_usergeneral_model();
	   	$cadena="['Task', 'Hours per Day']";

		

			
		foreach($respuesta as $row => $item){
			
			 $cadena=$cadena.',["'.$item['nombres'].' '.$item['apellidos'].'",'.$item['valor'].' ]';

			echo'<tr>
				<td>'.$item['nombres'].' '.$item['apellidos'].'</td>
                <td>'.$item['valor'].'</td>
                <td><a href="'.RUTABASE.'/lis_user_proyecto/'.$item['usuario'].'">Ver</a></td>
               	</tr>';

		}
		echo'</tbody>
              </table>';
?>


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	<?php echo $cadena; ?>
         
        ]);

        var options = {
          title: 'Grafico Demostrativo',
          is3D:true,
          //slices: {0: {color: 'red'}, 1:{color: 'blue'}, 2:{color: 'green'}, 3: {color: 'green'}, 4:{color: 'grey'}}
     
     
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
   <center>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
</center>
<?php


	}
public function lis_proyecto_usuario_controller(){
	   $respuesta = proyectomodel::lis_proyecto_usuario_model($_SESSION['id_c']);
	   //var_dump($respuesta);
		foreach($respuesta as $row => $item){
				if ($item['estado']==1){
				$proyecto='En Proceso';
			}elseif ($item['estado']==2) {
				$proyecto='Finalizado';
				# code...
			}elseif ($item['estado']==3) {
				$proyecto='Caducados';
				# code...
			}
			echo'<tr>
				 <td>'.$item['proyecto'].'</td>
                  <td>'.$item['detalle'].'</td>
                  <td>'.$item['observacion'].'</td>
                  <td>'.$item['persona1'].'</td>
                  <td>'.$item['persona2'].'</td>
                  <td>'.$item['fecha_creacion'].'</td>
                  <td>'.$item['fecha_entrega'].'</td>
               		 <td><a href="'.RUTABASE.'/lis_evidencia/'.$item['id_asignacion'].'">Ver</a></td>
               		  <td>'.$item['porcentaje'].'</td>
                  <td>'.$proyecto.'</td>
				 </tr>';

		}

	}




	public function lis_proyecto_x_usuario_controller(){
	   $respuesta = proyectomodel::lis_proyecto_x_usuario_model($_SESSION['idUsuario']);
	   	$cadena="['Task', 'Hours per Day']";

		

			
		foreach($respuesta as $row => $item){
			if ($item['estado']==1){
				$proyecto='En Proceso';
			}elseif ($item['estado']==2) {
				$proyecto='Finalizado';
				# code...
			}elseif ($item['estado']==3) {
				$proyecto='Caducados';
				# code...
			}
			 $cadena=$cadena.',["'.$proyecto.' '.$item['valor'].'",'.$item['valor'].' ]';

			echo'<tr>
				<td>'.$proyecto.'</td>
                <td>'.$item['valor'].'</td>
                 <td>'.$item['nombres'].' '.$item['apellidos'].'</td>
                
               	</tr>';

		}
		echo'</tbody>
              </table>';
?>


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	<?php echo $cadena; ?>
         
        ]);

        var options = {
          title: 'Grafico Demostrativo',
          is3D:true,
          //slices: {0: {color: 'red'}, 1:{color: 'blue'}, 2:{color: 'green'}, 3: {color: 'green'}, 4:{color: 'grey'}}
     
     
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
   <center>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
</center>
<?php


	}






















////////////////////////////////////////////////////////////////////////////INGRESOS////////////////////////////////////////////////////////////////////////////////////

	public function guardarEvidenciaController(){

		if (isset($_POST['evi'])) {
			$id = $_POST['evi'];
			$detalle=$_POST['detalle'];
			$porcentaje=$_POST['por'];
			$proyect=$_POST['pro'];
			$persona=$_POST['per'];
			$ruta=$_FILES['archivo']['name'];
			 move_uploaded_file($_FILES['archivo']['tmp_name'],"views/documentos/".$ruta);

			$res= proyectomodel::update_porcentaje_Model($_POST['proy'],$porcentaje);
			if($porcentaje=='100'){
			$res= proyectomodel::update_pro_Model($_POST['proy']);
			 $res=proyectomodel::correoModel($persona);
				 //////////// correo /////////////////
				 include ('views/email/mail.php');
				 foreach($res as $row => $item){
						$Email=$item['correo'];
						$body='ESTIMADO.'.$item['nombres'].' '. $item['apellidos'].':  <br>Ha Finalizado el proyecto:'.$proyect .' con la fecha de finalizaccion: '.date('Y-m-d').'<br>
<br><img src="views/images/escudoNaves.jpg"  width="" height=""> ';
						sendgmail($Email,$Nombre,$body);
						////////// correo//////////////
					}
				
			}

			$respuesta = proyectomodel::guardarEvidenciaModel($id,$detalle,$ruta,$porcentaje);

			if ($respuesta=='ok') {



				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/lisuser_proyecto/1";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}

	}//guardarUsuarioController




		public function guardarproyectoController(){

		if (isset($_POST['proyecto'])) {
			

			$fec = explode("/", $_POST['f1']);
			echo $fecha= $fec[2].'-'.$fec[0].'-'.$fec[1];



			$proyecto = $_POST['proyecto'];
			$detalle = $_POST['detalle'];
			$observacion = $_POST['opservacion'];
		
			$cat = $_POST['cat'];
			$encargado = $_POST['Encargado'];
			$usuario = $_SESSION['idUsuario'] ;

			$datosController = array('proyecto' 	=> $proyecto,
									 'detalle' 		=> $detalle,
									 'observacion'	=> $observacion,
									 'fecha' 		=> $fecha,
									 'cat' 			=> $cat,
									 'usuario' 	    => $usuario);

			proyectomodel::guardarproyectoModel($datosController);

			$respuesta = GestorUsuarioModel::getUltimoId("id_proyecto", "proyecto");
			
			$datosController1 = array('id_proyecto' 	=> $respuesta['idmax'],
									  'id_usuario' 		=> $encargado);
			//var_dump($datosController1);

			$respuesta1 = proyectomodel::guardarAsignacionModel($datosController1);

			if ($respuesta1=='ok') {

			     $res=proyectomodel::correo1Model($encargado);
				 include ('views/email/mail.php');
				 foreach($res as $row => $item){
						$Email=$item['correo'];
						$Nombre='ControlProyet';
						$body='ESTIMADO.'.$item['nombres'].' '.$item['apellidos'].':  <br>Se ha asignado el siguiente proyecto a su cargo<br>
						'.$proyecto .' la fecha de entrega sera '.$fecha.' <br>Por favor finalizarlo antes del tiempo especificado<br>
						<img src="views/images/escudoNaves.jpg"  width="" height="">';
						sendgmail($Email,$Nombre,$body);
					}


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
								window.location = "'.RUTABASE.'/new_proyecto";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}

	}//guardarUsuarioController

	public function guardarcatController(){

		if (isset($_POST['cat'])) {
			$cat = $_POST['cat'];
			$respuesta = proyectomodel::guardarcatModel($cat);
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/new_cat";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}

	}//guardarUsuarioController

	public function guardarsubcatController(){

		if (isset($_POST['cat'])) {
			$sub = $_POST['subcat'];
			$cat = $_POST['cat'];
			$respuesta = proyectomodel::guardarsubcatModel($sub,$cat);
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/new_cat";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}

		}

	}//guardarUsuarioController
	public function ActualizarProyectoController(){

		if (isset($_POST['pro'])) {
			$fec = explode("/", $_POST['fecha']);
			$fecha= $fec[2].'-'.$fec[0].'-'.$fec[1];

			$datos = array('id' 	        => $_POST['pro'],
						   'proyecto' 	    => $_POST['proyecto'],
						   'detalle' 		=> $_POST['detalle'],
						   'observacion'	=> $_POST['observacion'],
						   'fecha' 		    => $fecha,
						   'cat' 			=> $_POST['cat'],
						   'estado' 		=> $_POST['estado'],
						   'usuario' 	    => $_POST['Encargado']);

			$res = proyectomodel::ActulizarAsignacionModel($datos);
			if ($res=='ok') {
			$respuesta = proyectomodel::ActualizarProyectoModel($datos);
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/lis_proyecto/<?php echo $_SESSION["id_c"];?>";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}
		}else{
				echo "error";
			}
			}

		}

	
public function ActualizarCatController(){

		if (isset($_POST['cat'])) {
		

			$datos = array('id' 	        => $_POST['id_cat'],
						   'cat' 	    => $_POST['cat'],
						   'estado' 		=> $_POST['estado']);

			
			$respuesta = proyectomodel::ActualizarCatProyectoModel($datos);
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/lis_cat";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}
		
			}

		}

public function ActualizarSubCatController(){

		if (isset($_POST['subcat'])) {
		

			$datos = array('id' 	        => $_POST['id_sub'],
						   'idcat' 	    => $_POST['cat'],
						   'subcat' 	    => $_POST['subcat'],
						   'estado' 		=> $_POST['estado']);

			
			$respuesta = proyectomodel::ActualizarSubCatProyectoModel($datos);
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/lissub_cat";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}
		
			}

		}

public function ActualizarEvidenciaController(){

		if (isset($_POST['cat'])) {
		

			$datos = array('id' 	        => $_POST['id'],
						   'detalle' 	    => $_POST['detalle'],
						   'ruta' 	    => $_POST['ruta'],
						   'por' 		=> $_POST['por']);

			
			$respuesta = proyectomodel::ActualizarEvidenciaProyectoModel($datos);
			if ($respuesta=='ok') {
				echo '
				<script>
	 				swal({
						title: "¡OK!",
						text: "¡Categoria Guardada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "'.RUTABASE.'/lis_";
							}
					});	
				</script>
				';
			}else{
				echo "error";
			}
		
			}

		}


}


?> 