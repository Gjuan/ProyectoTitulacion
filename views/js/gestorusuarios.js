/*VISTA PREVIA DE LA IMAGEN*/;

// if ($("#imagen").val() == '') {

// 	/*CAMBIAR IMAGEN*/
// 	$("#optionsRadios1").click(function(){
// 	console.log("HOMBRE");
// 		$("#imagenUser").attr({"src":"views/dist/img/avatar5.png"});
// 	});

// 	/*CAMBIAR IMAGEN*/
// 	$("#optionsRadios2").click(function(){
// 	console.log("MUJER");
// 	$("#imagenUser").attr({"src":"views/dist/img/avatar2.png"});
// 	});

// }

// $("#imagen").change(function(){

// 	imgUrl = $("#imagenUser").attr("src");

// 	$("#img1").html('<img src="'+imgUrl+'" id="img2" width="100%" height="100%">');

// 	$("#imagenUser").remove();

// 	imagen = this.files[0];
// 	//TIPO DE LA IMAGEN
// 	var	imagenType = imagen.type;
// 	//TAMANO DE LA IMAGEN
// 	var	imagenSize = imagen.size;
// 	peso = 2000000;
// 	imgType = "image/jpeg";

// 	if (imagenType != imgType || imagenSize > peso)  {
// 		$(".alerta").remove();
// 		//TIPO DE LA IMAGEN
// 		if (imagenType != imgType) {
// 			$("#imagenuser").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>');
// 				$("#img2").remove();
// 				$("#img1").html('<img src="views/dist/img/avatar5.png" id="imagenUser" width="100%" height="100%">'); 
// 		}
// 		//TIPO DE LA IMAGEN
// 		if (imagenSize > peso) {
// 		$("#imagenuser").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
// 			$("#img2").remove();
// 			$("#img1").html('<img src="views/dist/img/avatar5.png" id="imagenUser" width="100%" height="100%">'); 
// 		}
// 	}else{
// 		$(".alerta").remove();
// 		var datos = new FormData();
// 		datos.append("imagen", imagen);
// 		$.ajax({
// 			url:"views/ajax/gestorusuarios.php",
// 			method:"POST",
// 			data:datos,
// 			cache:false,
// 			contentType:false,
// 			processData:false,
// 			beforeSend:function(){
// 				$("#imagenuser").before('<img src"views/images/status.gif" id="status">');
// 			},
// 			success:function(respuesta){
// 				$("#status").remove();
// 				if (respuesta == 0) {
// 					$("#imagenuser").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 160 * 160 px.</div>'); 
// 						$("#img2").remove();
// 						$("#img1").html('<img src="views/dist/img/avatar5.png" id="imagenUser" width="100%" height="100%">');
// 				}else{
// 					$("#img1").html('<img src="'+respuesta.slice(6)+'" id="img1" width="100%" height="100%">');
// 					console.log(respuesta);
// 				}
// 			}
// 		});
// 	}

// });


// /*COMPROBAR USUARIOS*/
// $("#Cedula").change(function(){

// 	cedulaval = $("#Cedula").val();

// 		var datos = new FormData();
// 		datos.append("cedulaval", cedulaval);

// 		$.ajax({
// 			url:"views/ajax/gestorusuarios.php",
// 			method:"POST",
// 			data:datos,
// 			cache:false,
// 			contentType:false,
// 			processData:false,
// 			success:function(respuesta){

// 				if (respuesta == 1) {
// 					$("#Cedula").addClass("ced");
// 					$('#nUsuario').attr("disabled", true);

// 					swal({
// 						title: "¡Error!",
// 						text: "¡Esta cedula ya esta ingresada en el sistema!",
// 						type: "warning",
// 						confirmButtonText: "Cerrar",
// 						closeOnCancel: false
// 						});	

// 				}else{
// 					$('#nUsuario').attr("disabled", false);
// 					$("#Cedula").removeClass("ced");
// 				}
// 			}
// 		});

// });
// /*COMPROBAR USUARIOS*/

/*ELIMINAR USUARIO*/

$(".elm_user").click(function(){

	idUsuario = $(this).val();
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	
	swal({
	    title: 'Eliminar Usuario!',
	    text: 'Seguro quiere eliminar este Usuario?',
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
			            url:"views/ajax/gestorusuarios.php",
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

/*ELIMINAR USUARIO*/

/*RESTABLECER USUARIO*/

// $(".res_user").click(function(){
	
// 	idUsuario = $(this).val();
// 	var datos = new FormData();
// 	datos.append("idUsuariorestablecer", idUsuario);

// 	swal({
// 	    title: 'Restablecer Usuario!',
// 	    text: 'Se restablecera el Nick y Clave del Usuario esta seguro de continuar?',
// 	    type: 'warning',
// 	    showCancelButton: true,
// 	    confirmButtonColor: "#DD6B55",
// 	    confirmButtonText: "¡Seguro!",
// 	    cancelButtonText: "No, Cancelar",
// 	    closeOnConfirm: false,
// 	    closeOnCancel: false },

// 			    function(isConfirm){//ifconfirm
// 			    if (isConfirm) {
// 			          $.ajax({
// 			            url:"views/ajax/gestorusuarios.php",
// 			            method: "POST",
// 			            data: datos,
// 			            cache: false,
// 			            contentType: false,
// 			            processData: false,
// 			            success: function(respuesta){
// 			                swal({
// 			                title: "¡OK!",
// 			                text: "¡La operacion fue un exito Usuario restablecido!",
// 			                type: "success",
// 			                timer: 1000,
// 			                showConfirmButton: false 
// 			                },function(){
// 			                  location.reload();
// 			                });
// 			            }
// 			          });
// 			    } else {//else

// 			      swal({
// 			      title: "¡Cancelado!",
// 			      text: "¡Has cancelado la operacion!",
// 			      type: "error",
// 			      timer: 1000,
// 			      showConfirmButton: false 
// 			      });
// 			    } //else
// 			  }//ifconfirm
//   		);//alseta principal

// });

/*RESTABLECER USUARIO*/


/*DESBLOQUEAR USUARIO*/

// $(".des_user").click(function(){

// 	idUsuario = $(this).val();
// 	var datos = new FormData();
// 	datos.append("idUsuariodesbloquear", idUsuario);

// 	swal({
// 	    title: 'Restablecer Usuario!',
// 	    text: 'Se habilitaran las Sessiones para este usuario?',
// 	    type: 'warning',
// 	    showCancelButton: true,
// 	    confirmButtonColor: "#DD6B55",
// 	    confirmButtonText: "¡Seguro!",
// 	    cancelButtonText: "No, Cancelar",
// 	    closeOnConfirm: false,
// 	    closeOnCancel: false },

// 			    function(isConfirm){//ifconfirm
// 			    if (isConfirm) {
// 			          $.ajax({
// 			            url:"views/ajax/gestorusuarios.php",
// 			            method: "POST",
// 			            data: datos,
// 			            cache: false,
// 			            contentType: false,
// 			            processData: false,
// 			            success: function(respuesta){
// 			                swal({
// 			                title: "¡OK!",
// 			                text: "¡La operacion fue un exito Usuario Desbloquado!",
// 			                type: "success",
// 			                timer: 1000,
// 			                showConfirmButton: false 
// 			                },function(){
// 			                  location.reload();
// 			                });
// 			            }
// 			          });
// 			    } else {//else

// 			      swal({
// 			      title: "¡Cancelado!",
// 			      text: "¡Has cancelado la operacion!",
// 			      type: "error",
// 			      timer: 1000,
// 			      showConfirmButton: false 
// 			      });
// 			    } //else
// 			  }//ifconfirm
//   		);//alseta principal

// });

/*DESBLOQUEAR USUARIO*/


/*ACTIVAR USUARIO*/
// $(".act_user").click(function(){

// 	idUsuario = $(this).val();
// 	var datos = new FormData();
// 	datos.append("idUsuarioActivar", idUsuario);

// 	swal({
// 	    title: 'Activar Usuario!',
// 	    text: 'Se habilitara el Usuario para el ingreso al sistema?',
// 	    type: 'warning',
// 	    showCancelButton: true,
// 	    confirmButtonColor: "#DD6B55",
// 	    confirmButtonText: "¡Seguro!",
// 	    cancelButtonText: "No, Cancelar",
// 	    closeOnConfirm: false,
// 	    closeOnCancel: false },

// 			    function(isConfirm){//ifconfirm
// 			    if (isConfirm) {
// 			          $.ajax({
// 			            url:"views/ajax/gestorusuarios.php",
// 			            method: "POST",
// 			            data: datos,
// 			            cache: false,
// 			            contentType: false,
// 			            processData: false,
// 			            success: function(respuesta){
// 			            	console.log(respuesta);
// 			                swal({
// 			                title: "¡OK!",
// 			                text: "¡La operacion fue un exito Usuario Activado!",
// 			                type: "success",
// 			                timer: 1000,
// 			                showConfirmButton: false 
// 			                },function(){
// 			                  location.reload();
// 			                });
// 			            }
// 			          });
// 			    } else {//else

// 			      swal({
// 			      title: "¡Cancelado!",
// 			      text: "¡Has cancelado la operacion!",
// 			      type: "error",
// 			      timer: 1000,
// 			      showConfirmButton: false 
// 			      });
// 			    } //else
// 			  }//ifconfirm
//   		);//alseta principal

// });
/*ACTIVAR USUARIO*/


/*DESACTIVAR USUARIO*/
// $(".inc_user").click(function(){

// 	idUsuario = $(this).val();
// 	var datos = new FormData();
// 	datos.append("idUsuarioInactivar", idUsuario);

// 	swal({
// 	    title: 'Desactivar Usuario!',
// 	    text: 'Se Desactivara el Usuario para el ingreso al sistema?',
// 	    type: 'warning',
// 	    showCancelButton: true,
// 	    confirmButtonColor: "#DD6B55",
// 	    confirmButtonText: "¡Seguro!",
// 	    cancelButtonText: "No, Cancelar",
// 	    closeOnConfirm: false,
// 	    closeOnCancel: false },

// 			    function(isConfirm){//ifconfirm
// 			    if (isConfirm) {
// 			          $.ajax({
// 			            url:"views/ajax/gestorusuarios.php",
// 			            method: "POST",
// 			            data: datos,
// 			            cache: false,
// 			            contentType: false,
// 			            processData: false,
// 			            success: function(respuesta){
// 			            swal({
// 			                title: "¡OK!",
// 			                text: "¡La operacion fue un exito Usuario Activado!",
// 			                type: "success",
// 			                timer: 1000,
// 			                showConfirmButton: false 
// 			                },function(){
// 			                  location.reload();
// 			                });
// 			            }
// 			          });
// 			    } else {//else

// 			      swal({
// 			      title: "¡Cancelado!",
// 			      text: "¡Has cancelado la operacion!",
// 			      type: "error",
// 			      timer: 1000,
// 			      showConfirmButton: false 
// 			      });

// 			    } //else
// 			  }//ifconfirm
//   		);//alseta principal

// });
/*DESACTIVAR USUARIO*/


/*EDITAR USUARIO*/
// $(".edt_user").click(function(){

// 	idUsuario = $(this).val();
// 	var datos = new FormData();
// 	datos.append("idUsuarioEditar", idUsuario);

// 	console.log(idUsuario);


// 	  $.ajax({
// 	    url:"views/ajax/gestorusuarios.php",
// 	    method: "POST",
// 	    data: datos,
// 	    cache: false,
// 	    contentType: false,
// 	    processData: false,
// 	    dataType:"json",
// 	    success: function(respuesta){

// 		    $("#CedulaUp").val(respuesta['cedula']);
// 		    $("#NombresUp").val(respuesta['nombres']);
// 		    $("#ApellidosUp").val(respuesta['apellidos']);
// 		    $("#EmailUp").val(respuesta['email']);
// 		    $("#idUserUp").val(respuesta['id']);
// 		    $("#imgAnt").val(respuesta['foto']);

// 		    if (respuesta['genero'] == "M") {
// 		    	$("#optionsRadios1").attr({"checked":"true"});
// 		    }else{
// 		    	$("#optionsRadios2").attr({"checked":"true"});
// 		    }

// 		    if (respuesta['roll'] == "1") {
// 		    	$("#apt1").attr({"selected":"true"});
// 		    }else{
// 		    	$("#opt2").attr({"selected":"true"});
// 		    }

// 		    if (respuesta['foto'] != '') {

// 		    	$("#imagenUser").remove();
// 		    	$("#img1").html('<img src="views/images/usuario/'+respuesta['foto'] +'" id="imagenUser2" width="100%" height="100%">');

// 		    }
// 	    }
// 	  });

// 	$("#modalUser").modal({
// 	   width: 850,
// 	   minWidth: 400,
// 	   maxWidth: 750,
// 	   show: "explode",
// 	   hide: "scale"
// 	});
	

// });
/*EDITAR USUARIO*/


// $("#cedula").change(function(){
// 	registro = $(this).val();
// 	if (registro != '' && registro.length == 10) {
// 		var Datos = new FormData();
// 		Datos.append("resgistro", registro);
// 		$.ajax({
// 				url:"views/ajax/_phpConsP.php",
// 				method:"POST",
// 				data:Datos,
// 				cache:false,
// 				contentType:false,
// 				processData:false,
// 				success:function(respuesta){
// 					if (respuesta == "1") {
// 						$("input").attr("disabled", false);
// 						$("#verific").val("ok");
// 						$("#aviso").html('');
// 					}else if(respuesta == "0"){
// 						$("#aviso").html('<div class="alert alert-info alert-dismissible" role="alert">Esta cedula ya se encuentra <strong>Registrada.</strong></div>');
// 					}else if(respuesta = "2"){
// 						$("#aviso").html('<div class="alert alert-info alert-dismissible" role="alert">Solo Puedes Ingresar <strong>Numeros y Letras</strong></div>');
// 					}
// 				}
// 		});
// 	}else if(registro.length != 10) {
// 		$("#nombres").attr("disabled", true)
// 		$("#apellidos").attr("disabled", true)
// 		$("#edad").attr("disabled", true)
// 		$("#celular").attr("disabled", true)
// 		$("#email").attr("disabled", true)
// 		$("#optionsRadios1").attr("disabled", true)
// 		$("#optionsRadios2").attr("disabled", true)
// 		$("#optionsRadios3").attr("disabled", true)
// 		$("#optionsRadios4").attr("disabled", true)
// 		$("#optionsRadios5").attr("disabled", true)
// 	}
// });


/*ELIMINAR USUARIO*/

// $(".elm_insc").click(function(){

// 	idUsuario = $(this).val();
// 	var datos = new FormData();
// 	datos.append("idInscr", idUsuario);

	
// 	swal({
// 	    title: 'Eliminar Usuario!',
// 	    text: 'Seguro quiere eliminar este Registro?',
// 	    type: 'warning',
// 	    showCancelButton: true,
// 	    confirmButtonColor: "#DD6B55",
// 	    confirmButtonText: "¡Seguro!",
// 	    cancelButtonText: "No, Cancelar",
// 	    closeOnConfirm: false,
// 	    closeOnCancel: false },

// 			    function(isConfirm){//ifconfirm
// 			    if (isConfirm) {
// 			          $.ajax({
// 			            url:"views/ajax/gestorusuarios.php",
// 			            method: "POST",
// 			            data: datos,
// 			            cache: false,
// 			            contentType: false,
// 			            processData: false,
// 			            success: function(respuesta){
// 			                swal({
// 			                title: "¡OK!",
// 			                text: "¡La operacion fue un exito!",
// 			                type: "success",
// 			                timer: 1000,
// 			                showConfirmButton: false 
// 			                },function(){
// 			                  location.reload();
// 			                });
// 			            }
// 			          });
// 			    } else {//else

// 			      swal({
// 			      title: "¡Cancelado!",
// 			      text: "¡Has cancelado la operacion!",
// 			      type: "error",
// 			      timer: 1000,
// 			      showConfirmButton: false 
// 			      });
// 			    } //else
// 			  }//ifconfirm
//   		);//alseta principal



// });

/*ELIMINAR USUARIO*/


$(".new_cuestion").click(function(){

	$("#modalCuestionario").modal({
	   show: "explode",
	   hide: "scale"
	});

});


/*ELIMINAR CUESTIONARIO*/

$(".elm_ct").click(function(){

	idCuestionario = $(this).val();
	var datos = new FormData();
	datos.append("idCuestionario", idCuestionario);

	
	swal({
	    title: 'Eliminar Usuario!',
	    text: 'Seguro quiere eliminar este Cuestionario?',
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
			            url:"views/ajax/gestorusuarios.php",
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

/*ELIMINAR CUESTIONARIO*/

/*DESACTIVAR CUESTIONARIO*/

$(".inc_ct").click(function(){

	id_desac_Cuestionario = $(this).val();
	var datos = new FormData();
	datos.append("id_desac_Cuestionario", id_desac_Cuestionario);

      $.ajax({
        url:"views/ajax/gestorusuarios.php",
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

});

/*DESACTIVAR CUESTIONARIO*/

/*DESACTIVAR CUESTIONARIO*/

$(".act_ct").click(function(){

	id_act_Cuestionario = $(this).val();
	var datos = new FormData();
	datos.append("id_act_Cuestionario", id_act_Cuestionario);

      $.ajax({
        url:"views/ajax/gestorusuarios.php",
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

});

/*DESACTIVAR CUESTIONARIO*/


$(".btnencabezado").click(function(){

	$("#modalencabezados").modal({
	   show: "explode",
	   hide: "scale"
	});

});

$(".btnpreguntas").click(function(){

	$("#modalpreguntas").modal({
	   show: "explode",
	   hide: "scale"
	});

});

$(".btplantillas").click(function(){

	$("#modalplantillas").modal({
	   show: "explode",
	   hide: "scale"
	});

});

$(".btnopciones").click(function(){

	$("#modalopciones").modal({
	   show: "explode",
	   hide: "scale"
	});

});