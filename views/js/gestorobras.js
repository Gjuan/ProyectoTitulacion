/*
AREA DE ARRASTRE
*/
if ($("#columnasObra").html() == 0) {
	$("#columnasObra").css({"min-height" : "100px" });
	$('#borrador_nt').attr("disabled", true);
	$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
	$('#borrador_nt').tooltip();
}

if($("#columnasObra").html() != 0){
	$("#columnasObra").css({"height" : "auto" });

}
/*
AREA DE ARRASTRE
*/

/*
SUBIR IMAGEN
*/

$("#columnasObra").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#columnasObra").css({"background" : "url(views/images/pattern.jpg)"});
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
$("#columnasObra").on("drop", function(e){

	$('#borrador_nt').attr("disabled", false);
	$('#borrador_nt').tooltip('disable');

	e.preventDefault();
	e.stopPropagation();
	$("#columnasObra").css({"background" : "none"});
	

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
		$("#columnasObra").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
	}else{
		$(".alerta").remove();
	}
	//TIPO DE LA IMAGEN

	//TAMANO DE LA IMAGEN
	if (Number(imagenSize) > peso) {
		$("#columnasObra").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
	}else{ 
		$(".alerta").remove();
	} 
	//TAMANO DE LA IMAGEN
	
	
	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

		var datos = new FormData();

		datos.append("imagen1", imagen);
		
		$.ajax({
			url:"views/ajax/gestorobras.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			beforeSend:function(){
				$("#columnasObra").before('<img src"views/images/status.gif" id="status">');
			},
			success:function(respuesta){

				$("#status").remove();
 		
				if (respuesta == '') {

					$("#columnasObra").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1140px * 705px .</div>'); 

				}else{

					$("#columnasObra").append('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times eliminarItemObra"></span><img src="../views/images/obras/'+respuesta['ruta']+'" class="handleImg"></li>');

					
					
					 valorAnterior = $("#arr0").val();
					 valorAnterior = valorAnterior + '-' + respuesta['ruta'];
					 $("#arr0").val(valorAnterior);

					// console.log($("#arr0").val());

					/**ELIMINAR ITEM GALERIA OBRA**/

					$(".eliminarItemObra").click(function(){

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

							dato.append("idImagenObra", idImagenObra);

							$.ajax({
								url:"views/ajax/gestorobras.php",
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


						if ($("#columnasObra").html() == 0) {
							$("#columnasObra").css({"min-height" : "100px" });
							$('#borrador_nt').attr("disabled", true);
							$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
							$('#borrador_nt').tooltip("enable");
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

/*ELIMINAR OBRAS*/

$(".elimi_obr").click(function(){

	valor = $(this).val();
	valor2 = $(this).attr("data-id");

	var datos = new FormData();
    datos.append("eliminarObraId", valor);
    datos.append("galeriaObra", valor2);
    

    	swal({
	    title: 'Eliminar Obras!',
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
			            url:"views/ajax/gestorobras.php",
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

/*ELIMINAR OBRAS*/

/*EDITOR DE OBRAS*/

$(".edit_obr").click(function(){

	valor = $(this).val();
	var datos = new FormData();
    datos.append("editarObraValor", valor);

    			      
      $.ajax({
        url:"views/ajax/gestorobras.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

      //   	if (respuesta == 0) {

	    	// 	console.log("respuesta error");

	    	// }else{

	    		$("#contenobra").html('<section class="content"><div class="row"><div class="col-sm-12 col-md-4"><div class="box box-default color-palette-box"><div class="box-header with-border"><h3 class="box-title"><i class="fa fa-tag"></i> Galeria de Obras</h3></div><div class="box-body"><div class="row"><div id="imgSlide"  class="col-md-12"><p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, (tamaño recomendado: 1140px * 705px y peso recomendado 200kb)</p><ul id="columnasObra"></ul></div></div></div><div class="form-group"><label for="urlVideo">URL Video</label><textarea class="form-control" id="urlVideo" name="urlVideo" required></textarea></div></div></div><div class="col-sm-12 col-md-8"><div class="box box-info"><div class="box-header with-border"><i class="fa  fa-keyboard-o"></i><h3 class="box-title">Editor Area</h3></div><form role="form" method="post" id="obras" enctype="multipart/form-data"><div class="box-body"><div class="form-group"><label for="Obra">Obra</label><input class="form-control" id="ObraUp" name="ObraUp" placeholder="Obra" type="text" required></div><div class="form-group"><label for="Sector">Sector</label><input class="form-control" id="Sector" name="Sector" placeholder="Sector" type="text" required></div><div class="form-group"><label>Fecha Inicio de la Obra:</label><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control pull-right" id="datepicker" type="text" name="FechaInicio"></div></div><div class="form-group"><label>Fecha Fin de la Obra:</label><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control pull-right" id="datepicker2" type="text" name="FechaFin"></div></div><div class="form-group"><label for="estadoObra">Estado Obra</label><select class="form-control" name="estadoObra" required><option value="">Seleccione una opcion...</option><option id="op1" value="0">Proyecto</option><option  id="op2" value="1">Iniciado</option><option  id="op3" value="2">Finalizado</option></select></div><input type="hidden" name="imagenes" value="" id="arr0"><input type="hidden" name="video" value="" id="arr1">   <input type="hidden" name="idobra" value="" id="arr3">  <div class="form-group"><label for="Resumen">Resumen</label><textarea class="form-control" id="Resumen" name="Resumen" required></textarea></div><div class="form-group"><label for="Contenido">Contenido</label><textarea class="form-control" id="Contenido" name="Contenido" required></textarea></div><br><div class="form-group"><label for="modoguardar">Modo de Guardar</label><select class="form-control" name="guardarComo" required><option value="">Seleccione una opcion...</option><option id="opg1" value="0">Guardar como borrador</option><option id="opg2" value="1">Publicar Ahora</option></select></div></div><div class="col-md-4"><button type="button" class="btn btn-default pull-left editCancelar" data-dismiss="modal">Cancelar</button></div><div class="col-md-4"></div><div class="col-md-4"><input type="submit" id="borrador_nt" value="Publicar Obra" name="Publicar Obra" class="btn btn-block btn-info"></div><div class="box-footer"></div></form></div></div></div></section><script> CKEDITOR.replace( "Contenido" );</script>');

	    		$("#columnasObra").html(respuesta['galerialis']);
				$("#urlVideo").html(respuesta['video']);
				$("#ObraUp").val(respuesta['obra']);
				$("#Sector").val(respuesta['sector']);
				$("#datepicker").val(respuesta['fechaInicio']);
				$("#datepicker2").val(respuesta['fechaFin']);
				$("#arr0").val(respuesta['galeria']);
				$("#arr1").val(respuesta['video']);
				$("#arr3").val(respuesta['id']);
				$("#Resumen").val(respuesta['descripcion']);
				$("#Contenido").val(respuesta['contenido']);

				if (respuesta['estadoObra'] = '0') {

					$("#op1").attr({"selected" : "true"});

				}else if (respuesta['estadoObra'] = '1') {

					$("#op2").attr({"selected" : "true"});

				}else if (respuesta['estadoObra'] = '2') {

					$("#op3").attr({"selected" : "true"});

				}


				if (respuesta['estado'] = '0') {

					$("#opg1").attr({"selected" : "true"});

				}else if (respuesta['estado'] = '1') {

					$("#opg2").attr({"selected" : "true"});

				}


				/* quitar formulario de edicion */

				$('.editCancelar').click(function(){
					$("#contenobra").html('');
				});

				/* quitar formulario de edicion */


	    		$('html, body').animate( { scrollTop : 0 }, 500 ); //regresa la pagina al inicio
				    

									/**ELIMINAR ITEM GALERIA OBRA**/

									$(".eliminarItemObra").click(function(){

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

											dato.append("idImagenObra", idImagenObra);

											$.ajax({
												url:"views/ajax/gestorobras.php",
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


										if ($("#columnasObra").html() == 0) {
											$("#columnasObra").css({"min-height" : "100px" });
											$('#borrador_nt').attr("disabled", true);
											$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
											$('#borrador_nt').tooltip("enable");
										}

									});

			
									/**ELIMINAR ITEM GALERIA OBRA**/

				    //Date picker
				    $('#datepicker').datepicker({
				      autoclose: true
				    });

				   //Date picker2
				    $('#datepicker2').datepicker({
				      autoclose: true
				    });

	    		/*
				AREA DE ARRASTRE
				*/
				if ($("#columnasObra").html() == 0) {
					$("#columnasObra").css({"min-height" : "100px" });
					$('#borrador_nt').attr("disabled", true);
					$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
					$('#borrador_nt').tooltip();
				}

				if($("#columnasObra").html() != 0){
					$("#columnasObra").css({"height" : "auto" });

				}
				/*
				AREA DE ARRASTRE
				*/

				/*
				SUBIR IMAGEN
				*/

				$("#columnasObra").on("dragover", function(e){
					e.preventDefault();
					e.stopPropagation();
					$("#columnasObra").css({"background" : "url(views/images/pattern.jpg)"});
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
				$("#columnasObra").on("drop", function(e){

					$('#borrador_nt').attr("disabled", false);
					$('#borrador_nt').tooltip('disable');

					e.preventDefault();
					e.stopPropagation();
					$("#columnasObra").css({"background" : "none"});
					

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
						$("#columnasObra").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
					}else{
						$(".alerta").remove();
					}
					//TIPO DE LA IMAGEN

					//TAMANO DE LA IMAGEN
					if (Number(imagenSize) > peso) {
						$("#columnasObra").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
					}else{ 
						$(".alerta").remove();
					} 
					//TAMANO DE LA IMAGEN
					
					
					//SUBIR IMAGEN AL SERVIDOR

					if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

						var datos = new FormData();

						datos.append("imagen1", imagen);
						
						$.ajax({
							url:"views/ajax/gestorobras.php",
							method:"POST",
							data:datos,
							cache:false,
							contentType:false,
							processData:false,
							dataType:"json",
							beforeSend:function(){
								$("#columnasObra").before('<img src"views/images/status.gif" id="status">');
							},
							success:function(respuesta){

								$("#status").remove();
				 		
								if (respuesta == '') {

									$("#columnasObra").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1140px * 705px .</div>'); 

								}else{

									$("#columnasObra").append('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times eliminarItemObra"></span><img src="../views/images/obras/'+respuesta['ruta']+'" class="handleImg"></li>');

									
									
									 valorAnterior = $("#arr0").val();
									 valorAnterior = valorAnterior + '-' + respuesta['ruta'];
									 $("#arr0").val(valorAnterior);

									// console.log($("#arr0").val());

									/**ELIMINAR ITEM GALERIA OBRA**/

									$(".eliminarItemObra").click(function(){

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

											dato.append("idImagenObra", idImagenObra);

											$.ajax({
												url:"views/ajax/gestorobras.php",
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


										if ($("#columnasObra").html() == 0) {
											$("#columnasObra").css({"min-height" : "100px" });
											$('#borrador_nt').attr("disabled", true);
											$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
											$('#borrador_nt').tooltip("enable");
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

	    	// }

        }
      });

});

/*EDITOR DE OBRAS*/


