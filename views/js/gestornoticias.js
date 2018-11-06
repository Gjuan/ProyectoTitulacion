/*VISTA PREVIA DE LA IMAGEN*/
$("#fotoNoticia").change(function(){
	imagen = this.files[0];
	//TIPO DE LA IMAGEN
	var	imagenType = imagen.type;
	//TAMANO DE LA IMAGEN
	var	imagenSize = imagen.size;
	peso = 2000000;
	imgType = "image/jpeg";
	//TIPO DE LA IMAGEN
	if (imagenType != imgType || imagenSize > peso)  {
		$(".alerta").remove();
		//TIPO DE LA IMAGEN
		if (imagenType != imgType) {
			$("#imagenArticulo").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
		}
		//TIPO DE LA IMAGEN
		if (imagenSize > peso) {
		$("#imagenArticulo").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
		}
	}else{
		$(".alerta").remove();
		var datos = new FormData();
		datos.append("imagen", imagen);
		$.ajax({
			url:"views/ajax/gestornoticias.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			beforeSend:function(){
				$("#imagenArticulo").before('<img src"views/images/status.gif" id="status">');
			},
			success:function(respuesta){
				$("#status").remove();
				if (respuesta == 0) {
					$("#imagenArticulo").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1600 * 600 px.</div>'); 
				}else{
					$("#imgnot").html('<div style="border: solid 0px; width: auto; margin-left: 10px; margin-right: 10px;"><img src="'+respuesta.slice(6)+'" width="100%" height="auto"></div>');
					console.log(respuesta);
				}
			}
		});
	}
});
/*VISTA PREVIA DE LA IMAGEN*/


/*Eliminar noticias*/

$(".elimi_not").click(function(){

	valor = $(this).val();
	var datos = new FormData();
    datos.append("noticiavalor", valor);

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

	    		$("#contennoticia").html('<section class="content"><div class="row"><div class="col-sm-12 col-md-3"><div class="box box-warning"><div class="box-header with-border"><i class="fa fa-file-photo-o"></i><h3 class="box-title">Imagen Noticia</h3></div><br><div class="row"><div class="col-md-12" id="imgnot">   <div style="border: solid 0px; width: auto; margin-left: 10px; margin-right: 10px;"><img src="../views/images/noticias/'+respuesta['bbh_imagennoticia']+'" width="100%" height="auto"><br></div>   </div></div></div></div><div class="col-sm-12 col-md-9"><div class="box box-info"><div class="box-header with-border"><i class="fa  fa-keyboard-o"></i><h3 class="box-title">Editor Area</h3></div><form role="form" method="post" id="noticia" enctype="multipart/form-data"><div class="box-body"><div class="form-group"><label for="tituloNoticia">Titulo de Noticia</label><input class="form-control" id="tituloNoticia" name="tituloNoticia" maxlength="35" value="'+respuesta['bbh_titulonoticia']+'" placeholder="Titulo de Noticia" type="text" required></div><div class="form-group"><label for="resumenNoticia">Resumen Notica</label><textarea class="form-control" id="resumenNoticia" name="resumenNoticia" maxlength="170" required>'+respuesta['bbh_resumen']+'</textarea></div><div class="form-group"><label for="contenidoNoticia">Contenido Notica</label><textarea class="form-control" id="contenidoNoticia" name="contenidoNoticia" required>'+respuesta['bbh_contenidonoticia']+'</textarea></div><div class="form-group" id="imagenArticulo"><label for="fotoNoticia">Foto de Portada</label><input class="btn btn-primary" id="fotoNoticia" name="fotoNoticia" type="file"><p class="help-block">Esta imagen debe ser de 600px * 400px en formato jpg y no pesar mas de 950ks.</p></div><br><div class="form-group"><label for="modoguardar">Modo de Guardar</label><select class="form-control" name="guardarComo" required><option value="">Seleccione una opcion...</option><option value="0">Guardar como borrador</option><option value="1">Publicar Ahora</option></select>  <input type="hidden" name="noticiaId" value="'+respuesta['bbh_idnoticia']+'"> <input type="hidden" name="noticiaImagen" value="'+respuesta['bbh_imagennoticia']+'"> </div></div><div class="col-md-4"><button type="button" class="btn btn-default pull-left editCancelar" data-dismiss="modal">Cancelar</button></div><div class="col-md-4"></div><div class="col-md-4"><input type="submit" id="borrador_nt" value="Actualizar Noticia" name="Publicar Noticia" class="btn btn-block btn-info"></div><div class="box-footer"></div></form></div></div></div></section><script>CKEDITOR.replace("contenidoNoticia");</script>');

	    		$('html, body').animate( { scrollTop : 0 }, 500 ); //regresa la pagina al inicio
		    			
		    			/*VISTA PREVIA DE LA IMAGEN*/
						$("#fotoNoticia").change(function(){
							imagen = this.files[0];
							//TIPO DE LA IMAGEN
							var	imagenType = imagen.type;
							//TAMANO DE LA IMAGEN
							var	imagenSize = imagen.size;
							peso = 2000000;
							imgType = "image/jpeg";
							//TIPO DE LA IMAGEN
							if (imagenType != imgType || imagenSize > peso)  {
								$(".alerta").remove();
								//TIPO DE LA IMAGEN
								if (imagenType != imgType) {
									$("#imagenArticulo").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
								}
								//TIPO DE LA IMAGEN
								if (imagenSize > peso) {
									$("#imagenArticulo").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
								}
							}else{
								$(".alerta").remove();
								var datos = new FormData();
								datos.append("imagen", imagen);
								$.ajax({
									url:"views/ajax/gestornoticias.php",
									method:"POST",
									data:datos,
									cache:false,
									contentType:false,
									processData:false,
									beforeSend:function(){
										$("#imagenArticulo").before('<img src"views/images/status.gif" id="status">');
									},
									success:function(respuesta){
										$("#status").remove();
										if (respuesta == 0) {
											$("#imagenArticulo").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1600 * 600 px.</div>'); 
										}else{
											$("#imgnot").html('<div style="border: solid 0px; width: auto; margin-left: 10px; margin-right: 10px;"><img src="'+respuesta.slice(6)+'" width="100%" height="auto"></div>');
											console.log(respuesta);
										}
									}
								});
							}
						});
						/*VISTA PREVIA DE LA IMAGEN*/


						/* quitar formulario de edicion */

						$('.editCancelar').click(function(){
							$("#contennoticia").html('');
						});

						/* quitar formulario de edicion */


	    	}

	    }
	  });

});


