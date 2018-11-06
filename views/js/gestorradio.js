/*
AREA DE ARRASTRE
*/
if ($("#columnasRadio").html() == 0) {
	$("#columnasRadio").css({"min-height" : "100px" });
	$('#borrador_nt0').attr("disabled", true);
	$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
	$('#borrador_nt0').tooltip();
}

if($("#columnasRadio").html() != 0){
	$("#columnasRadio").css({"height" : "auto" });

}
/*
AREA DE ARRASTRE
*/

/*
SUBIR IMAGEN
*/

$("#columnasRadio").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#columnasRadio").css({"background" : "url(views/images/pattern.jpg)"});
});
/*
SUBIR IMAGEN
*/


/*
SOLTAR IMAGEN
*/
$("#columnasRadio").on("drop", function(e){

	$('#borrador_nt0').attr("disabled", false);
	$('#borrador_nt0').tooltip('disable');

	e.preventDefault();
	e.stopPropagation();
	$("#columnasRadio").css({"background" : "none"});
	
	if ($("#columnasRadio").html() == 0) {

	var archivo = e.originalEvent.dataTransfer.files;
	var	imagen = archivo[0];

	//TIPO DE LA IMAGEN
	var	imagenType = imagen.type;
	//TAMANO DE LA IMAGEN
	var	imagenSize = imagen.size;
	peso = 200000;

//console.log(imagenType + imagenSize)
	
	//TIPO DE LA IMAGEN
	if (imagenType != "image/jpeg" ) {
		$("#columnasRadio").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
	}else{
		$(".alerta").remove();
	}
	//TIPO DE LA IMAGEN

	//TAMANO DE LA IMAGEN
	if (Number(imagenSize) > peso) {
		$("#columnasRadio").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
	}else{ 
		$(".alerta").remove();
	} 
	//TAMANO DE LA IMAGEN
	
	
	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

		var datos = new FormData();

		datos.append("imagenradio", imagen);
		
		$.ajax({
			url:"views/ajax/gestorradio.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			beforeSend:function(){
				$("#columnasRadio").before('<img src"views/images/status.gif" id="status">');
			},
			success:function(respuesta){

				$("#status").remove();
 		
				if (respuesta == '') {

					$("#columnasRadio").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 800px * 400px .</div>'); 

				}else{

					$("#columnasRadio").append('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times eliminarItemRadio"></span><img src="../views/images/radio/'+respuesta['ruta']+'" class="handleImg"></li>');

					
					
					 valorAnterior = $("#arr0").val();
					 valorAnterior = valorAnterior + '-' + respuesta['ruta'];
					 $("#arr0").val(valorAnterior);

					// console.log($("#arr0").val());

					/**ELIMINAR ITEM GALERIA OBRA**/

					$(".eliminarItemRadio").click(function(){

						idImagenObra = $(this).parent().attr("id");

						arrImagen = $("#arr0").val();

						arrImagen = arrImagen.slice(1);

						arrImagen1 = arrImagen.split("-");

						nuevaCadena = '';

						for (var i = 0; i <= arrImagen1.length -1; i++) {
							
							
							if (arrImagen1[i] != idImagenObra) {
								nuevaCadena = nuevaCadena + '-' + arrImagen1[i];
							}
								

						}

						$("#arr0").val(nuevaCadena);

							var dato = new FormData();

							dato.append("idImagenRadio", idImagenObra);

							$.ajax({
								url:"views/ajax/gestorradio.php",
								method:"POST",
								data:dato,
								cache:false,
								contentType:false,
								processData:false,
								success:function(respuesta){
									//console.log(respuesta);
								}
							});

							$(this).parent().remove();


						if ($("#columnasRadio").html() == 0) {
							$("#columnasRadio").css({"min-height" : "100px" });
							$('#borrador_nt0').attr("disabled", true);
							$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt0').tooltip("enable");
						}

					});



					
					/**ELIMINAR ITEM GALERIA OBRA**/

					
				}

			}
		});
	}

	//SUBIR IMAGEN AL SERVIDOR

	}else{

		console.log('ya subiste una imagen')
	}


	//console.log(imagenType);
}); 
/*
SOLTAR IMAGEN
*/


/*Eliminar noticias*/

$(".elimi_radio").click(function(){

	valor = $(this).val();
	valor2 = $(this).attr("data-id");
	var datos = new FormData();
    datos.append("audioId", valor);
    datos.append("audioImagen", valor2);

	swal({
	    title: 'Eliminar Audio!',
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
			            url:"views/ajax/gestorradio.php",
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

/*Eliminar noticias*/



/*Editar Noticia*/

$(".edit_radio").click(function(){

	valor = $(this).val();
	var datos = new FormData();


    datos.append("editRadioValor", valor);

	  $.ajax({
	    url:"views/ajax/gestorradio.php",
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

	    		$("#contenaudio").html('<section class="content"><div class="row"><div class="col-sm-12 col-md-4"><div class="box box-default color-palette-box"><div class="box-header with-border"><h3 class="box-title"><i class="fa fa-tag"></i> Imagen</h3></div><div class="box-body"><div class="row"><div id="imgSlide"  class="col-md-12"><p><span class="fa fa-arrow-down"></span>  Arrastra aquí una imagen, (tamaño recomendado: 800px * 400px y peso recomendado 200kb)</p><ul id="columnasRadio"></ul></div></div></div></div></div><div class="col-sm-12 col-md-8"><div class="box box-info"><div class="box-header with-border"><i class="fa  fa-keyboard-o"></i><h3 class="box-title">Editor Area</h3></div><form role="form" method="post" id="radio" enctype="multipart/form-data"><div class="box-body"><div class="form-group"><label for="tituloRadio">Titulo de Noticia</label><input class="form-control" id="tituloRadio1" name="tituloRadio1" maxlength="35" placeholder="Titulo de Noticia" type="text" required></div><div class="form-group"><label for="Resumen">Resumen</label><textarea class="form-control" id="Resumen" maxlength="170" name="Resumen" required></textarea></div><div class="form-group"><label for="urlVideo">URL Audio</label><textarea class="form-control" id="urlaudio" name="urlaudio" required></textarea></div><div class="form-group"><label for="Exponente">Exponente</label><input class="form-control" id="Exponente" name="Exponente" maxlength="35" placeholder="Exponente" type="text" required></div><input type="hidden" name="imagenes" value="" id="arr0"><input type="hidden" name="idRadio" value="" id="arr3"></div><div class="col-md-4"><button type="button" class="btn btn-default pull-left editCancelar" data-dismiss="modal">Cancelar</button></div><div class="col-md-4"></div><div class="col-md-4"><input type="submit" id="borrador_nt0" value="Publicar" name="Publicar" class="btn btn-block btn-info"></div><div class="box-footer"></div></form></div></div></div></section>');

	    		$('html, body').animate( { scrollTop : 0 }, 500 ); //regresa la pagina al inicio
		    			
	    				$("#columnasRadio").html('<li class="bloqueSlide" id="'+respuesta['imagen'].slice(1)+'"><span class="fa fa-times eliminarItemRadio"></span><img src="../views/images/radio/'+respuesta['imagen'].slice(1)+'" class="handleImg"></li>');
	    				$("#tituloRadio1").val(respuesta['titulo']);
	    				$("#Resumen").val(respuesta['resumen']);
	    				$("#urlaudio").val(respuesta['audio']);
	    				$("#Exponente").val(respuesta['exponente']);
	    				$("#arr0").val(respuesta['imagen']);
	    				$("#arr3").val(respuesta['id']);

					/**ELIMINAR ITEM GALERIA OBRA**/

					$(".eliminarItemRadio").click(function(){

						idImagenObra = $(this).parent().attr("id");

						arrImagen = $("#arr0").val();

						arrImagen = arrImagen.slice(1);

						arrImagen1 = arrImagen.split("-");

						nuevaCadena = '';

						for (var i = 0; i <= arrImagen1.length -1; i++) {
							
							
							if (arrImagen1[i] != idImagenObra) {
								nuevaCadena = nuevaCadena + '-' + arrImagen1[i];
							}
								

						}

						$("#arr0").val(nuevaCadena);

							var dato = new FormData();

							dato.append("idImagenRadio", idImagenObra);

							$.ajax({
								url:"views/ajax/gestorradio.php",
								method:"POST",
								data:dato,
								cache:false,
								contentType:false,
								processData:false,
								success:function(respuesta){
									//console.log(respuesta);
								}
							});

							$(this).parent().remove();


						if ($("#columnasRadio").html() == 0) {
							$("#columnasRadio").css({"min-height" : "100px" });
							$('#borrador_nt0').attr("disabled", true);
							$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt0').tooltip("enable");
						}

					});




					
					/**ELIMINAR ITEM GALERIA OBRA**/

						$('.editCancelar').click(function(){
							$("#contenaudio").html('');
						});

						/* quitar formulario de edicion */

						/*
						AREA DE ARRASTRE
						*/
						if ($("#columnasRadio").html() == 0) {
							$("#columnasRadio").css({"min-height" : "100px" });
							$('#borrador_nt0').attr("disabled", true);
							$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt0').tooltip();
						}

						if($("#columnasRadio").html() != 0){
							$("#columnasRadio").css({"height" : "auto" });

						}
						/*
						AREA DE ARRASTRE
						*/

						/*
						SUBIR IMAGEN
						*/

						$("#columnasRadio").on("dragover", function(e){
							e.preventDefault();
							e.stopPropagation();
							$("#columnasRadio").css({"background" : "url(views/images/pattern.jpg)"});
						});
						/*
						SUBIR IMAGEN
						*/


							/*
							SOLTAR IMAGEN
							*/
							$("#columnasRadio").on("drop", function(e){

								$('#borrador_nt0').attr("disabled", false);
								$('#borrador_nt0').tooltip('disable');

								e.preventDefault();
								e.stopPropagation();
								$("#columnasRadio").css({"background" : "none"});
								
								if ($("#columnasRadio").html() == 0) {

								var archivo = e.originalEvent.dataTransfer.files;
								var	imagen = archivo[0];

								//TIPO DE LA IMAGEN
								var	imagenType = imagen.type;
								//TAMANO DE LA IMAGEN
								var	imagenSize = imagen.size;
								peso = 200000;

							//console.log(imagenType + imagenSize)
								
								//TIPO DE LA IMAGEN
								if (imagenType != "image/jpeg" ) {
									$("#columnasRadio").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
								}else{
									$(".alerta").remove();
								}
								//TIPO DE LA IMAGEN

								//TAMANO DE LA IMAGEN
								if (Number(imagenSize) > peso) {
									$("#columnasRadio").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
								}else{ 
									$(".alerta").remove();
								} 
								//TAMANO DE LA IMAGEN
								
								
								//SUBIR IMAGEN AL SERVIDOR

								if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

									var datos = new FormData();

									datos.append("imagenradio", imagen);
									
									$.ajax({
										url:"views/ajax/gestorradio.php",
										method:"POST",
										data:datos,
										cache:false,
										contentType:false,
										processData:false,
										dataType:"json",
										beforeSend:function(){
											$("#columnasRadio").before('<img src"views/images/status.gif" id="status">');
										},
										success:function(respuesta){

											$("#status").remove();
							 		
											if (respuesta == '') {

												$("#columnasRadio").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 800px * 400px .</div>'); 

											}else{

												$("#columnasRadio").append('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times eliminarItemRadio"></span><img src="../views/images/radio/'+respuesta['ruta']+'" class="handleImg"></li>');

												
												
												 valorAnterior = $("#arr0").val();
												 valorAnterior = valorAnterior + '-' + respuesta['ruta'];
												 $("#arr0").val(valorAnterior);

												// console.log($("#arr0").val());

												/**ELIMINAR ITEM GALERIA OBRA**/

												$(".eliminarItemRadio").click(function(){

													idImagenObra = $(this).parent().attr("id");

													arrImagen = $("#arr0").val();

													arrImagen = arrImagen.slice(1);

													arrImagen1 = arrImagen.split("-");

													nuevaCadena = '';

													for (var i = 0; i <= arrImagen1.length -1; i++) {
														
														
														if (arrImagen1[i] != idImagenObra) {
															nuevaCadena = nuevaCadena + '-' + arrImagen1[i];
														}
															

													}

													$("#arr0").val(nuevaCadena);

														var dato = new FormData();

														dato.append("idImagenRadio", idImagenObra);

														$.ajax({
															url:"views/ajax/gestorradio.php",
															method:"POST",
															data:dato,
															cache:false,
															contentType:false,
															processData:false,
															success:function(respuesta){
																//console.log(respuesta);
															}
														});

														$(this).parent().remove();


													if ($("#columnasRadio").html() == 0) {
														$("#columnasRadio").css({"min-height" : "100px" });
														$('#borrador_nt0').attr("disabled", true);
														$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
														$('#borrador_nt0').tooltip("enable");
													}

												});



												
												/**ELIMINAR ITEM GALERIA OBRA**/

												
											}

										}
									});
								}

								//SUBIR IMAGEN AL SERVIDOR

								}else{

									console.log('ya subiste una imagen')
								}


								//console.log(imagenType);
							}); 
							/*
							SOLTAR IMAGEN
							*/

	    	}//else

	    }
	  });

});
