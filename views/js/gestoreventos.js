/*
AREA DE ARRASTRE
*/
if ($("#columnasGaleria").html() == 0) {
	$("#columnasGaleria").css({"min-height" : "100px" });
	$('#borrador_nt').attr("disabled", true);
	$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
	$('#borrador_nt').tooltip();
}

if($("#columnasGaleria").html() != 0){
	$("#columnasGaleria").css({"height" : "auto" });

}
/*
AREA DE ARRASTRE
*/

/*
SUBIR IMAGEN
*/

$("#columnasGaleria").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#columnasGaleria").css({"background" : "url(views/images/pattern.jpg)"});
});
/*
SUBIR IMAGEN
*/


/*
SOLTAR IMAGEN
*/
$("#columnasGaleria").on("drop", function(e){

	$('#borrador_nt').attr("disabled", false);
	$('#borrador_nt').tooltip('disable');

	e.preventDefault();
	e.stopPropagation();
	$("#columnasGaleria").css({"background" : "none"});
	

	var archivo = e.originalEvent.dataTransfer.files;
	var	imagen = archivo[0];

	//TIPO DE LA IMAGEN
	var	imagenType = imagen.type;
	//TAMANO DE LA IMAGEN
	var	imagenSize = imagen.size;
	peso = 200000;


	
	//TIPO DE LA IMAGEN
	if (imagenType != "image/jpeg" ) {
		$("#columnasGaleria").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
	}else{
		$(".alerta").remove();
	}
	//TIPO DE LA IMAGEN

	//TAMANO DE LA IMAGEN
	if (Number(imagenSize) > peso) {
		$("#columnasGaleria").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
	}else{ 
		$(".alerta").remove();
	} 
	//TAMANO DE LA IMAGEN
	
	
	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

		var datos = new FormData();

		datos.append("imagen1", imagen);
		
		$.ajax({
			url:"views/ajax/gestoreventos.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			beforeSend:function(){
				$("#columnasGaleria").before('<img src"views/images/status.gif" id="status">');
			},
			success:function(respuesta){

				$("#status").remove();
 		
				if (respuesta == '') {

					$("#columnasGaleria").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1140px * 705px .</div>'); 

				}else{

					$("#columnasGaleria").append('<li class="bloqueSlide" id="'+respuesta['id']+'"><span class="fa fa-times eliminarItemGaleria"></span><img src="../views/images/galeriaeventos/'+respuesta['ruta']+'" class="handleImg"></li>');

					//
					valorAnterior = $("#arr").val();
					valorAnterior = valorAnterior + '-' + respuesta['id'];
					$("#arr").val(valorAnterior);


					/**ELIMINAR ITEM SLIDE**/
					$(".eliminarItemGaleria").click(function(){

						idGaleria = $(this).parent().attr("id");
						rutaGaleria = respuesta['ruta'];
						
						$(this).parent().remove();	

						var	borrarItem = new FormData();

						borrarItem.append("idGaleria", idGaleria);
						borrarItem.append("rutaGaleria", rutaGaleria);

						$.ajax({
								
								url:"views/ajax/gestoreventos.php",
								method:"POST",
								data:borrarItem,
								cache:false,
								contentType:false,
								processData:false,
								success:function(respuesta){

									//console.log(respuesta);
								}

						});

						if ($("#columnasGaleria").html() == 0) {
							$("#columnasGaleria").css({"min-height" : "100px" });
							$('#borrador_nt').attr("disabled", true);
							$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt').tooltip("enable");
						}

					});
					/**ELIMINAR ITEM SLIDE**/

					//console.log(valorAnterior.slice(1));
				}

			}
		});
	}

	//SUBIR IMAGEN AL SERVIDOR




	//console.log(imagenType);
}); 
/*
SOLTAR IMAGEN
*/



/**ELIMINAR ITEM GALERIA**/
$(".eliminarItemGaleria").click(function(){

	idGaleria = $(this).parent().attr("id");
	rutaGaleria = $(this).attr("ruta");
	
	$(this).parent().remove();	

	var	borrarItem = new FormData();

	borrarItem.append("idGaleria", idGaleria);
	borrarItem.append("rutaGaleria", rutaGaleria);

	$.ajax({
			
			url:"views/ajax/gestoreventos.php",
			method:"POST",
			data:borrarItem,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){

				//console.log(respuesta);
			}

	});

	if ($("#columnasGaleria").html() == 0) {
		$("#columnasGaleria").css({"min-height" : "100px" });
		$('#borrador_nt').attr("disabled", true);
		$('#borrador_nt').attr({"title":"Llena la galeria primero"});
		$('#borrador_nt').tooltip();
	}

});
/**ELIMINAR ITEM GALERIA**/


/*# ELIMINAR EVENTO DE LA BASE #*/
$(".elimi_event").click(function(){

	valor = $(this).val();
	var datos = new FormData();
    datos.append("eventoId", valor);

	swal({
	    title: 'Eliminar Evento!',
	    text: 'Seguro quiere eliminar esta entrada?',
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "¡Seguro!",
	    cancelButtonText: "No, Cancelar",
	    closeOnConfirm: false,
	    closeOnCancel: false },

			    function(isConfirm){//ifconfirm
			    if (isConfirm) {
			          $.ajax({
			            url:"views/ajax/gestoreventos.php",
			            method: "POST",
			            data: datos,
			            cache: false,
			            contentType: false,
			            processData: false,
			            success: function(respuesta){
			                swal({
			                title: "¡OK!",
			                text: "¡La operacion fue un exito!",
			                type: "success",
			                timer: 1000,
			                showConfirmButton: false 
			                },function(){
			                  location.reload();
			                });
			            }
			          });
			    } else {//else

			      swal({
			      title: "¡Cancelado!",
			      text: "¡Has cancelado la operacion!",
			      type: "error",
			      timer: 1000,
			      showConfirmButton: false 
			      });
			    } //else
			  }//ifconfirm
  		);//alseta principal

});
/*# ELIMINAR EVENTO DE LA BASE #*/



/*# EDITAR EVENTO DE LA BASE #*/

$(".edit_event").click(function(){
	var idevento = '';
	valor = $(this).val();
	var datos = new FormData();
    datos.append("editEventoValor", valor);

	  $.ajax({
	    url:"views/ajax/gestoreventos.php",
	    method: "POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"json",
	    success: function(respuesta){

	    	if (respuesta == 0) {

	    		console.log("respuesta error");

	    	}else{


	    		$("#contenevento").html('<section class="content"><div class="row"><div class="col-sm-12 col-md-4"><div class="box box-default color-palette-box"><div class="box-header with-border"><h3 class="box-title"><i class="fa fa-tag"></i> Galeria de Imagemdes de Evento</h3></div><div class="box-body"><div class="row"><div id="imgSlide"  class="col-md-12"><p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, (tamaño recomendado: 1140px * 705px y peso recomendado 200kb)</p><ul id="columnasGaleria"></ul></div></div></div></div></div><div class="col-sm-12 col-md-8"><div class="box box-info"><div class="box-header with-border"><i class="fa  fa-keyboard-o"></i><h3 class="box-title">Editor Area</h3></div><form role="form" method="post" id="evento" enctype="multipart/form-data"><div class="box-body"><div class="form-group"><label for="tituloEvento">Titulo de Evento</label><input class="form-control" id="tituloEvento" name="tituloEventoed" placeholder="Titulo de Evento" type="text" required></div><div class="form-group"><label>Fecha del Evento:</label><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control pull-right" id="datepicker" type="text" name="fechaEventoed"></div></div><div class="form-group"><label>Hora del Evento:</label><div class="input-group"><input class="form-control" type="text" id="horaEvento" name="horaEventoed" placeholder="08:00 AM" ><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div></div><input type="hidden" name="idupevento" value="'+respuesta["id"]+'" ><div class="form-group"><label for="lugarEvento">Lugar Evento</label><input class="form-control" id="lugarEvento" name="lugarEventoed" placeholder="Lugar de Evento" type="text" required></div><div class="form-group"><label for="resumenEvento">Resumen Evento</label><textarea class="form-control" id="resumenEvento" name="resumenEventoed" required></textarea></div><div class="form-group"><label for="contenidoEvento">Contenido Evento</label><textarea class="form-control" id="contenidoEvento" name="contenidoEventoed" required>'+respuesta["centenido"]+'</textarea></div><br><div class="form-group"><label for="modoguardar">Modo de Guardar</label><select class="form-control" name="guardarComoed" required><option value="">Seleccione una opcion...</option><option id="apt1" value="0">Guardar como borrador</option><option id="apt2" value="1">Publicar Ahora</option></select></div></div><div class="col-md-4"><button type="button" class="btn btn-default pull-left editCancelar" data-dismiss="modal">Cancelar</button></div><div class="col-md-4"></div><div class="col-md-4"><input type="submit" id="borrador_nt" value="Publicar Evento" name="Actualizar Evento" class="btn btn-block btn-info"></div><div class="box-footer"></div></form></div></div></div></section><script>CKEDITOR.replace("contenidoEvento");</script>');

	    				 $("#tituloEvento").val(respuesta['titulo']);
						 $("#datepicker").val(respuesta['fecha']);
						 $("#horaEvento").val(respuesta['hora']);
						 $("#lugarEvento").val(respuesta['lugar']);
						 $("#resumenEvento").val(respuesta['resumen']);

						 idevento = respuesta['id'];

						 	if (respuesta['estado'] == "1") {
						    	$("#apt2").attr({"selected":"true"});
						    }else{
						    	$("#apt1").attr({"selected":"true"});
						    }

						    $("#columnasGaleria").html(respuesta['galeria']);

							/**ELIMINAR ITEM SLIDE**/
							$(".eliminarItemGaleria").click(function(){

								idGaleria = $(this).parent().attr("id");
								rutaGaleria = $(this).parent().attr("data-id");
								//rutaGaleria = respuesta['ruta'];
								
								$(this).parent().remove();	

								var	borrarItem = new FormData();

								borrarItem.append("idGaleria", idGaleria);
								borrarItem.append("rutaGaleria", rutaGaleria);

								$.ajax({
										
										url:"views/ajax/gestoreventos.php",
										method:"POST",
										data:borrarItem,
										cache:false,
										contentType:false,
										processData:false,
										success:function(respuesta){

											//console.log(respuesta);
										}

								});

								if ($("#columnasGaleria").html() == 0) {
									$("#columnasGaleria").css({"min-height" : "100px" });
									$('#borrador_nt').attr("disabled", true);
									$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
									$('#borrador_nt').tooltip("enable");
								}

							});
							/**ELIMINAR ITEM SLIDE**/


						  

	    				/*#  LLAMA AL CALENDARIO PARA EL FORMULARIO VIRTUAL  #*/
	    			    $('#datepicker').datepicker({
     						 autoclose: true
    					});
						/*#  LLAMA AL CALENDARIO PARA EL FORMULARIO VIRTUAL  #*/

						/*##  PROCESO REPETIDO SUBIR IMAGEN DE GALERIA DE EVENTO  ##*/

							/*
							SUBIR IMAGEN
							*/

							$("#columnasGaleria").on("dragover", function(e){
								e.preventDefault();
								e.stopPropagation();
								$("#columnasGaleria").css({"background" : "url(views/images/pattern.jpg)"});
							});
							/*
							SUBIR IMAGEN
							*/


							/*
							SOLTAR IMAGEN
							*/
							$("#columnasGaleria").on("drop", function(e){

								$('#borrador_nt').attr("disabled", false);
								$('#borrador_nt').tooltip('disable');

								e.preventDefault();
								e.stopPropagation();
								$("#columnasGaleria").css({"background" : "none"});
								

								var archivo = e.originalEvent.dataTransfer.files;
								var	imagen = archivo[0];

								//TIPO DE LA IMAGEN
								var	imagenType = imagen.type;
								//TAMANO DE LA IMAGEN
								var	imagenSize = imagen.size;
								peso = 200000;


								
								//TIPO DE LA IMAGEN
								if (imagenType != "image/jpeg" ) {
									$("#columnasGaleria").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
								}else{
									$(".alerta").remove();
								}
								//TIPO DE LA IMAGEN

								//TAMANO DE LA IMAGEN
								if (Number(imagenSize) > peso) {
									$("#columnasGaleria").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
								}else{ 
									$(".alerta").remove();
								} 
								//TAMANO DE LA IMAGEN
								
								
								//SUBIR IMAGEN AL SERVIDOR

								if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

									var datos = new FormData();

									datos.append("imagen2", imagen);
									datos.append("idevento", idevento);
									
									$.ajax({
										url:"views/ajax/gestoreventos.php",
										method:"POST",
										data:datos,
										cache:false,
										contentType:false,
										processData:false,
										dataType:"json",
										beforeSend:function(){
											$("#columnasGaleria").before('<img src"views/images/status.gif" id="status">');
										},
										success:function(respuesta){

											$("#status").remove();
							 		
											if (respuesta == '') {

												$("#columnasGaleria").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1140px * 705px .</div>'); 

											}else{

												$("#columnasGaleria").append('<li class="bloqueSlide" id="'+respuesta['id']+'"><span class="fa fa-times eliminarItemGaleria"></span><img src="../views/images/galeriaeventos/'+respuesta['ruta']+'" class="handleImg"></li>');

												//
												valorAnterior = $("#arr").val();
												valorAnterior = valorAnterior + '-' + respuesta['id'];
												$("#arr").val(valorAnterior);


												/**ELIMINAR ITEM SLIDE**/
												$(".eliminarItemGaleria").click(function(){

													idGaleria = $(this).parent().attr("id");
													rutaGaleria = respuesta['ruta'];
													
													$(this).parent().remove();	

													var	borrarItem = new FormData();

													borrarItem.append("idGaleria", idGaleria);
													borrarItem.append("rutaGaleria", rutaGaleria);

													$.ajax({
															
															url:"views/ajax/gestoreventos.php",
															method:"POST",
															data:borrarItem,
															cache:false,
															contentType:false,
															processData:false,
															success:function(respuesta){

																//console.log(respuesta);
															}

													});

													if ($("#columnasGaleria").html() == 0) {
														$("#columnasGaleria").css({"min-height" : "100px" });
														$('#borrador_nt').attr("disabled", true);
														$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
														$('#borrador_nt').tooltip("enable");
													}

												});
												/**ELIMINAR ITEM SLIDE**/

												//console.log(valorAnterior.slice(1));
											}

										}
									});
								}

								//SUBIR IMAGEN AL SERVIDOR




								//console.log(imagenType);
							}); 
							/*
							SOLTAR IMAGEN
							*/


						/*##  PROCESO REPETIDO SUBIR IMAGEN DE GALERIA DE EVENTO  ##*/

					/*
					AREA DE ARRASTRE
					*/
					if ($("#columnasGaleria").html() == 0) {
						$("#columnasGaleria").css({"min-height" : "100px" });
						$('#borrador_nt').attr("disabled", true);
						$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
						$('#borrador_nt').tooltip();
					}

					if($("#columnasGaleria").html() != 0){
						$("#columnasGaleria").css({"height" : "auto" });

					}
					/*
					AREA DE ARRASTRE
					*/

	    				$('html, body').animate( { scrollTop : 0 }, 500 ); //regresa la pagina al inicio
		    			

						/* quitar formulario de edicion */

						$('.editCancelar').click(function(){
							$("#contenevento").html('');
						});

						/* quitar formulario de edicion */


	    	}

	    }
	  });

});


/*# EDITAR EVENTO DE LA BASE #*/