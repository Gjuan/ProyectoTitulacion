/*
AREA DE ARRASTRE
*/
if ($("#columnasNoticia").html() == 0) {
	$("#columnasNoticia").css({"min-height" : "100px" });
	$('#borrador_nt0').attr("disabled", true);
	$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
	$('#borrador_nt0').tooltip();
}

if($("#columnasNoticia").html() != 0){
	$("#columnasNoticia").css({"height" : "auto" });

}
/*
AREA DE ARRASTRE
*/

/*
SUBIR IMAGEN
*/

$("#columnasNoticia").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#columnasNoticia").css({"background" : "url(views/images/pattern.jpg)"});
});
/*
SUBIR IMAGEN
*/


$("#urlVideo").on("change keyup paste", function() {
    var currentVal = $(this).val();
     $("#arr1").val(currentVal);
});



/*
SOLTAR IMAGEN
*/
$("#columnasNoticia").on("drop", function(e){

	$('#borrador_nt0').attr("disabled", false);
	$('#borrador_nt0').tooltip('disable');

	e.preventDefault();
	e.stopPropagation();
	$("#columnasNoticia").css({"background" : "none"});
	

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
		$("#columnasNoticia").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
	}else{
		$(".alerta").remove();
	}
	//TIPO DE LA IMAGEN

	//TAMANO DE LA IMAGEN
	if (Number(imagenSize) > peso) {
		$("#columnasNoticia").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
	}else{ 
		$(".alerta").remove();
	} 
	//TAMANO DE LA IMAGEN
	
	
	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

		var datos = new FormData();

		datos.append("imagen1", imagen);
		
		$.ajax({
			url:"views/ajax/gestornoticias.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			beforeSend:function(){
				$("#columnasNoticia").before('<img src"views/images/status.gif" id="status">');
			},
			success:function(respuesta){

				$("#status").remove();
 		
				if (respuesta == '') {

					$("#columnasNoticia").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 800px * 400px .</div>'); 

				}else{

					$("#columnasNoticia").append('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times eliminarItemNoticia"></span><img src="../views/images/noticias/'+respuesta['ruta']+'" class="handleImg"></li>');

					
					
					 valorAnterior = $("#arr0").val();
					 valorAnterior = valorAnterior + '-' + respuesta['ruta'];
					 $("#arr0").val(valorAnterior);

					// console.log($("#arr0").val());

					/**ELIMINAR ITEM GALERIA OBRA**/

					$(".eliminarItemNoticia").click(function(){

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

							dato.append("idImagenNoticia", idImagenObra);

							$.ajax({
								url:"views/ajax/gestornoticias.php",
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


						if ($("#columnasNoticia").html() == 0) {
							$("#columnasNoticia").css({"min-height" : "100px" });
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




	//console.log(imagenType);
}); 
/*
SOLTAR IMAGEN
*/

/*Eliminar noticias*/

$(".elimi_not").click(function(){

	valor = $(this).val();
	valor2 = $(this).attr("data-id");
	var datos = new FormData();
    datos.append("noticiavalor", valor);
    datos.append("noticiagaleria", valor2);

	swal({
	    title: 'Eliminar Noticia!',
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
			            url:"views/ajax/gestornoticias.php",
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

$(".edit_not").click(function(){

	valor = $(this).val();
	var datos = new FormData();
    datos.append("editNoticiaValor", valor);

	  $.ajax({
	    url:"views/ajax/gestornoticias.php",
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

	    		$("#contennoticia").html('<section class="content"><div class="row"><div class="col-sm-12 col-md-4"><div class="box box-default color-palette-box"><div class="box-header with-border"><h3 class="box-title"><i class="fa fa-tag"></i> Galeria de Noticias</h3></div><div class="box-body"><div class="row"><div id="imgSlide"  class="col-md-12"><p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, (tamaño recomendado: 800px * 400px y peso recomendado 200kb)</p><ul id="columnasNoticia"></ul></div></div></div><div class="form-group"><label for="urlVideo">URL Video</label><textarea class="form-control" id="urlVideo" name="urlVideo" required>'+respuesta['bbh_video']+'</textarea></div></div></div><div class="col-sm-12 col-md-8"><div class="box box-info"><div class="box-header with-border"><i class="fa  fa-keyboard-o"></i><h3 class="box-title">Editor Area</h3></div><form role="form" method="post" id="obra" enctype="multipart/form-data"><div class="box-body"><div class="form-group"><label for="tituloNoticia">Titulo de Noticia</label><input class="form-control" id="tituloNoticia" name="tituloNoticia" value="'+respuesta['bbh_titulonoticia']+'" placeholder="Titulo de Noticia" type="text" required></div><div class="form-group"><label for="resumenNoticia">Resumen Notica</label><textarea class="form-control" id="resumenNoticia" name="resumenNoticia" required>'+respuesta['bbh_resumen']+'</textarea></div><div class="form-group"><label for="contenidoNoticia">Contenido Notica</label><textarea class="form-control" id="contenidoNoticia" name="contenidoNoticia" required>'+respuesta['bbh_contenidonoticia']+'</textarea></div><input type="hidden" name="imagenes" value="" id="arr0"><input type="hidden" name="video" value="" id="arr1"><input type="hidden" name="idnoticia" value="" id="arr3"><br><div class="form-group"><label for="modoguardar">Categoria</label><select class="form-control" name="Categoria" id="Categoria" required></select></div><br><div class="form-group"><label for="modoguardar">Modo de Guardar</label><select class="form-control" name="guardarComo" required><option value="">Seleccione una opcion...</option><option value="0" id="optn1">Guardar como borrador</option><option id="optn2" value="1">Publicar Ahora</option></select></div></div><div class="col-md-4"><button type="button" class="btn btn-default pull-left editCancelar" data-dismiss="modal">Cancelar</button></div><div class="col-md-4"></div><div class="col-md-4"><input type="submit" id="borrador_nt0" value="Publicar Noticia" name="Publicar Noticia" class="btn btn-block btn-info"></div><div class="box-footer"></div></form></div></div></div></section><script>CKEDITOR.replace("contenidoNoticia");</script>');

	    		$('html, body').animate( { scrollTop : 0 }, 500 ); //regresa la pagina al inicio
		    			
	    				$("#columnasNoticia").html(respuesta['galerialis']);
	    				$("#arr3").val(respuesta['bbh_idnoticia']);
	    				$("#arr0").val(respuesta['bbh_imagennoticia']);
						$("#arr1").val(respuesta['bbh_video']);
						$("#Categoria").html(respuesta['option']);
						/* quitar formulario de edicion */

					if (respuesta['estado'] = 'Borrador') {

						$("#optn1").attr({"selected" : "true"});

					}else if (respuesta['estado'] = 'Publicado') {

						$("#optn1").attr({"selected" : "false"});
						$("#optn2").attr({"selected" : "true"});

					}

					/**ELIMINAR ITEM GALERIA OBRA**/

					$(".eliminarItemNoticia").click(function(){

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

							dato.append("idImagenNoticia", idImagenObra);

							$.ajax({
								url:"views/ajax/gestornoticias.php",
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


						if ($("#columnasNoticia").html() == 0) {
							$("#columnasNoticia").css({"min-height" : "100px" });
							$('#borrador_nt0').attr("disabled", true);
							$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt0').tooltip("enable");
						}

					});



					
					/**ELIMINAR ITEM GALERIA OBRA**/

						$('.editCancelar').click(function(){
							$("#contennoticia").html('');
						});

						/* quitar formulario de edicion */

						/*
						AREA DE ARRASTRE
						*/
						if ($("#columnasNoticia").html() == 0) {
							$("#columnasNoticia").css({"min-height" : "100px" });
							$('#borrador_nt0').attr("disabled", true);
							$('#borrador_nt0').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt0').tooltip();
						}

						if($("#columnasNoticia").html() != 0){
							$("#columnasNoticia").css({"height" : "auto" });

						}
						/*
						AREA DE ARRASTRE
						*/

						/*
						SUBIR IMAGEN
						*/

						$("#columnasNoticia").on("dragover", function(e){
							e.preventDefault();
							e.stopPropagation();
							$("#columnasNoticia").css({"background" : "url(views/images/pattern.jpg)"});
						});
						/*
						SUBIR IMAGEN
						*/


						$("#urlVideo").on("change keyup paste", function() {
						    var currentVal = $(this).val();
						     $("#arr1").val(currentVal);
						});


						/*
						SOLTAR IMAGEN
						*/
						$("#columnasNoticia").on("drop", function(e){

							$('#borrador_nt0').attr("disabled", false);
							$('#borrador_nt0').tooltip('disable');

							e.preventDefault();
							e.stopPropagation();
							$("#columnasNoticia").css({"background" : "none"});
							

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
								$("#columnasNoticia").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
							}else{
								$(".alerta").remove();
							}
							//TIPO DE LA IMAGEN

							//TAMANO DE LA IMAGEN
							if (Number(imagenSize) > peso) {
								$("#columnasNoticia").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
							}else{ 
								$(".alerta").remove();
							} 
							//TAMANO DE LA IMAGEN
							
							
							//SUBIR IMAGEN AL SERVIDOR

							if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

								var datos = new FormData();

								datos.append("imagen1", imagen);
								
								$.ajax({
									url:"views/ajax/gestornoticias.php",
									method:"POST",
									data:datos,
									cache:false,
									contentType:false,
									processData:false,
									dataType:"json",
									beforeSend:function(){
										$("#columnasNoticia").before('<img src"views/images/status.gif" id="status">');
									},
									success:function(respuesta){

										$("#status").remove();
						 		
										if (respuesta == '') {

											$("#columnasNoticia").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 800px * 400px .</div>'); 

										}else{

											$("#columnasNoticia").append('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times eliminarItemNoticia"></span><img src="../views/images/noticias/'+respuesta['ruta']+'" class="handleImg"></li>');

											
											
											 valorAnterior = $("#arr0").val();
											 valorAnterior = valorAnterior + '-' + respuesta['ruta'];
											 $("#arr0").val(valorAnterior);

											// console.log($("#arr0").val());

											/**ELIMINAR ITEM GALERIA OBRA**/

											$(".eliminarItemNoticia").click(function(){

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

													dato.append("idImagenNoticia", idImagenObra);

													$.ajax({
														url:"views/ajax/gestornoticias.php",
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


												if ($("#columnasNoticia").html() == 0) {
													$("#columnasNoticia").css({"min-height" : "100px" });
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




							//console.log(imagenType);
						}); 
						/*
						SOLTAR IMAGEN
						*/

	    	}//else

	    }
	  });

});