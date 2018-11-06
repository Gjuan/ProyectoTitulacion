$("#annioNuevo").click(function(){

	annio = $(this).attr("data-id");

	$("#brr").after('<input id="idAnnio'+annio+'" data-id="'+annio+'" value="'+annio+'" name="'+annio+'" class="btn btn-block btn-primary lotaipannio"  title="" type="button">'); 
	$("#annioNuevo").remove();

		var dato = new FormData();

		dato.append("annio", annio);

		$.ajax({
			url:"views/ajax/getorlotaip.php",
			method:"POST",
			data:dato,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){
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


$(".lotaipannio").click(function(){

	annio = $(this).attr("data-id");

	$("#annioliteral").html("AÑO - "+ annio);

	var dato = new FormData();
	dato.append("annio1", annio);

		$.ajax({
			url:"views/ajax/getorlotaip.php",
			method:"POST",
			data:dato,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){
				
				$("#mesesliterales").html(respuesta);


				$(".datasLiteral").click(function(){

					$("#idMes").val($(this).attr("data-id"));

					valrecorte = $(this).attr("id").slice(9);

					$("#titlemes").html(valrecorte +' '+  'Agregar Nuevo Literal.');

					$("#literalDes").val('');
					$("#literalDoc").val('');

					$("#modalAnnio").modal({
					   width: 850,
					   minWidth: 400,
					   maxWidth: 750,
					   show: "explode",
					   hide: "scale"
					});

				});


				/**/
				$(".eliminarItemLotaip").click(function(){

						idItemLotaip = $(this).attr("data-id");

							var dato = new FormData();
							dato.append("idItemLotaip", idItemLotaip);


						swal({
						    title: 'Eliminar Item!',
						    text: 'Seguro?',
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
								            url:"views/ajax/getorlotaip.php",
								            method: "POST",
								            data: dato,
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

				/**/

				$(".editarItemLotaip").click(function(){

					
					
					valor = $(this).attr("data-id");

					 cadena = valor.split('@');

					valrecorte = $(this).attr("id").slice(9);

					$("#titlemes").html(valrecorte +' '+  'Agregar Nuevo Literal.');


					$("#literalDes").val(cadena[2]);

					$("#literalDoc").val(cadena[1]);

					$("#idMes").val(cadena[0]);

					$("#idMes").attr({"name" : "nuevoId"});
					$("#literalDes").attr({"name" : "literalDes1"});
					$("#literalDoc").attr({"name" : "literalDoc1"});

					$("#modalAnnio").modal({
					   width: 850,
					   minWidth: 400,
					   maxWidth: 750,
					   show: "explode",
					   hide: "scale"
					});

				});
				 
				/**/
			}
		});

});


$(".datasLiteral").click(function(){

	$("#idMes").val($(this).attr("data-id"));

	valrecorte = $(this).attr("id").slice(9);

	$("#titlemes").html(valrecorte +' '+  'Agregar Nuevo Literal.');

	$("#literalDes").val('');
	$("#literalDoc").val('');
	

	$("#modalAnnio").modal({
	   width: 850,
	   minWidth: 400,
	   maxWidth: 750,
	   show: "explode",
	   hide: "scale"
	});

});

$(".eliminarItemLotaip").click(function(){

	idItemLotaip = $(this).attr("data-id");

		var dato = new FormData();
		dato.append("idItemLotaip", idItemLotaip);


	swal({
	    title: 'Eliminar Item!',
	    text: 'Seguro?',
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
			            url:"views/ajax/getorlotaip.php",
			            method: "POST",
			            data: dato,
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


$(".editarItemLotaip").click(function(){

	
	
	valor = $(this).attr("data-id");

	 cadena = valor.split('-');

	valrecorte = $(this).attr("id").slice(9);

	$("#titlemes").html(valrecorte +' '+  'Agregar Nuevo Literal.');


	$("#literalDes").val(cadena[2]);

	$("#literalDoc").val(cadena[1]);

	$("#idMes").val(cadena[0]);

	$("#idMes").attr({"name" : "nuevoId"});
	$("#literalDes").attr({"name" : "literalDes1"});
	$("#literalDoc").attr({"name" : "literalDoc1"});

	$("#modalAnnio").modal({
	   width: 850,
	   minWidth: 400,
	   maxWidth: 750,
	   show: "explode",
	   hide: "scale"
	});

});