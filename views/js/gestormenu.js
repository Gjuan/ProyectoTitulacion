$(".AggM").click(function(){

	$("#modalMenuP").modal({
	   show: "explode",
	   hide: "scale"
	});

});



$("#tipemenu").change(function(){

	if($(this).val() == 'S'){
		// ACTIVO
		$("#menu_desc").removeClass('bkl');
		$("#menu_url").removeClass('bkl');
		$("#menu_estado").removeClass('bkl');
		// ACTIVO

		// INACTIVO
		$("#menu_centen").addClass('bkl');
		$("#menu_titulo").addClass('bkl');
		// INACTIVO
	}

	if($(this).val() == 'P'){

		// ACTIVO
		$("#menu_desc").removeClass('bkl');
		$("#menu_estado").removeClass('bkl');		
		// ACTIVO

		// INACTIVO
		$("#menu_url").addClass('bkl');
		$("#menu_centen").addClass('bkl');
		$("#menu_titulo").addClass('bkl');
		// INACTIVO
	}

	if($(this).val() == 'G'){
		// ACTIVO
		$("#menu_desc").removeClass('bkl');
		$("#menu_titulo").removeClass('bkl');
		$("#menu_centen").removeClass('bkl');
		$("#menu_estado").removeClass('bkl');
		// ACTIVO

		// INACTIVO
		$("#menu_url").addClass('bkl');
		// INACTIVO		
	}

});


$(".pmenu").click(function(){

	//$('#tipemenu').removeAttr('name');

	id = $(this).attr("data-id");
	
	cambio = $(this).attr("data-text");

	//$("#"+cambio).attr({"selected":"selected"});


	if(cambio == 'S'){
		// ACTIVO
		$("#menu_desc").removeClass('bkl');
		$("#menu_url").removeClass('bkl');
		$("#menu_estado").removeClass('bkl');
		// ACTIVO

		// INACTIVO
		$("#menu_centen").addClass('bkl');
		$("#menu_titulo").addClass('bkl');
		// INACTIVO
	}

	if(cambio == 'P'){

		// ACTIVO
		$("#menu_desc").removeClass('bkl');
		$("#menu_estado").removeClass('bkl');		
		// ACTIVO

		// INACTIVO
		$("#menu_url").addClass('bkl');
		$("#menu_centen").addClass('bkl');
		$("#menu_titulo").addClass('bkl');
		// INACTIVO
	}

	if(cambio == 'G'){
		// ACTIVO
		$("#menu_desc").removeClass('bkl');
		$("#menu_titulo").removeClass('bkl');
		$("#menu_centen").removeClass('bkl');
		$("#menu_estado").removeClass('bkl');
		// ACTIVO

		// INACTIVO
		$("#menu_url").addClass('bkl');
		// INACTIVO		
	}

	var datos = new FormData();
    datos.append("menuid", id);	

	  $.ajax({
	    url:"views/ajax/gestormenus.php",
	    method: "POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"json",
	    success: function(respuesta){

	    	$("#tipemenu").attr({"name":"tipemenu1"});
	    	$("#menuIdn").val(id);
	    	$("#"+respuesta['bbh_tipo']).attr({"selected":"selected"});
	    	$("#Descripcion").val(respuesta['bbh_descripcion']);
	    	$("#URL").val(respuesta['bbh_url']);
	    	$("#tmenu").val(respuesta['bbh_titulo']);
	    	$("#conten").html(respuesta['bbh_contenido']);

		    	if (respuesta['bbh_estado'] = 'A') {
		    		$("#estadom1").attr({"selected":"selected"});
		    	}else if (respuesta['bbh_estado'] = 'I') {
		    		$("#estadom2").attr({"selected":"selected"});
		    	}
	    }
	  });

	$("#modalMenuP").modal({
	   show: "explode",
	   hide: "scale"
	});

});


$(".emenu").click(function(){

	id = $(this).attr("data-id");
	var datos = new FormData();
    datos.append("menu_elim", id);	

	swal({
	    title: 'Eliminar Menu!',
	    text: 'Seguro quiere eliminar este Menu?',
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
	            url:"views/ajax/gestormenus.php",
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

$(".selectMenu").click(function(){
	idmenu = $(this).attr("data-id");
	$("#submenuIdn").val(idmenu);
	var datos = new FormData();
    datos.append("submenuid", idmenu);	

	  $.ajax({
	    url:"views/ajax/gestormenus.php",
	    method: "POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success: function(respuesta){

	    	if (respuesta!='') {
	    		$("#listsubmenu").html(respuesta);
	    	}else{
	    		$("#listsubmenu").html("");
	    	}
	  
	    	/*ELIMINAR SUB MENUS*/
			$(".subemenu").click(function(){
				submenuIdE = $(this).attr("data-id");
				var datossub = new FormData();
    			datossub.append("dropsubmenu", submenuIdE);	
					swal({
					    title: 'Eliminar Sub-Menu!',
					    text: 'Seguro quiere eliminar este Sub-Menu?',
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
					            url:"views/ajax/gestormenus.php",
					            method: "POST",
					            data: datossub,
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
			/*ELIMINAR SUB MENUS*/

			/*MODIFICAR MENU*/
			$(".subpmenu").click(function(){
				submenuIdM = $(this).attr("data-id");
				console.log(submenuIdM);
				var datossub = new FormData();
    			datossub.append("uppsubmenu", submenuIdM);	

		          $.ajax({
		            url:"views/ajax/gestormenus.php",
		            method: "POST",
		            data: datossub,
		            cache: false,
		            contentType: false,
		            processData: false,
		            dataType:"json",
		            success: function(respuesta){
		            	
		            	$("#SubDescripcion").attr({"name":"SubDescripcion1"});
	    				$("#SubDescripcion").val(respuesta['bbh_subdescripcion']);
	    				$("#SubURL").val(respuesta['bbh_suburl']);
	    				$("#submenuIdn").val(respuesta['bbh_idsubmenu']);

	    				if (respuesta['bbh_subestado'] = 'A') {
				    		$("#estadosm1").attr({"selected":"selected"});
				    	}else if (respuesta['bbh_subestado'] = 'I') {
				    		$("#estadosm2").attr({"selected":"selected"});
				    	}

		            }
		          });

    			$("#modalSubMenu").modal({
				   show: "explode",
				   hide: "scale"
				});
			});
			/*MODIFICAR MENU*/
  		}
	  });
});


/***********************ORDENAR SLIDE**************************/
var almacenarOrdenId = new Array(); 
var ordenItem = new Array(); 

$("#ordenarMenu").click(function(){
	$("#ordenarMenu").hide();
	$("#gurardarorden").show();

	$("#columnamenu").css({"cursor":"move"});

	$("#columnamenu").sortable({
		revert: true,
		connectWith: ".selectMenu",
		handle: ".handle",
		stop: function(event){

			for (var i = 0; i < $("#columnamenu li").length; i++) {
				
				almacenarOrdenId[i] = event.target.children[i].id;
				console.log(almacenarOrdenId[i]);
				ordenItem[i] = i+1;
				console.log(ordenItem[i]);

			}

		}

	});

});


$("#gurardarorden").click(function(){
	$("#gurardarorden").hide();
	$("#ordenarMenu").show();

	for (var i = 0; i < $("#columnamenu li").length; i++) {
		
		var actualizarOrdenM = new FormData();
		actualizarOrdenM.append("actualizarOrdenSlide",almacenarOrdenId[i]);
		actualizarOrdenM.append("actualizarOrdenItem",ordenItem[i]);

		$.ajax({

			url:"views/ajax/gestormenus.php",
			method:"POST",
			data:actualizarOrdenM,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){
				console.log(respuesta);
				swal({
					title: "¡OK!",
					text: "¡Guardar Orden Slide!",
					type: "success",
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					},
					function(isConfirm){
						if (isConfirm){
							window.location = "menus";
						}
				});				

			}

		});

	}

});


/***********************ORDENAR SLIDE**************************/