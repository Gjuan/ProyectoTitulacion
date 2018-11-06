//console.log($("#columnasSlide").html());

/*
AREA DE ARRASTRE
*/
if ($("#columnasSlide").html() == 0) {
	$("#columnasSlide").css({"min-height" : "100px" });
}

if($("#columnasSlide").html() != 0){
	$("#columnasSlide").css({"height" : "auto" });
}
/*
AREA DE ARRASTRE
*/


/*
SUBIR IMAGEN
*/

$("#columnasSlide").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#columnasSlide").css({"background" : "url(views/images/pattern.jpg)"});
});
/*
SUBIR IMAGEN
*/

/*
SOLTAR IMAGEN
*/
$("#columnasSlide").on("drop", function(e){
	e.preventDefault();
	e.stopPropagation();
	$("#columnasSlide").css({"background" : "none"});

	var archivo = e.originalEvent.dataTransfer.files;
	var	imagen = archivo[0];

	//TIPO DE LA IMAGEN
	var	imagenType = imagen.type;
	//TAMANO DE LA IMAGEN
	var	imagenSize = imagen.size;
	peso = 200000;

	
	//TIPO DE LA IMAGEN
	if (imagenType != "image/jpeg" ) {
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
	}else{
		$(".alerta").remove();
	}
	//TIPO DE LA IMAGEN

	//TAMANO DE LA IMAGEN
	if (Number(imagenSize) > peso) {
		$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
	}else{ 
		$(".alerta").remove();
	} 
	//TAMANO DE LA IMAGEN
	

	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/gestorslide.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			beforeSend:function(){
				$("#columnasSlide").before('<img src"views/images/status.gif" id="status">');
			},
			success:function(respuesta){

				$("#status").remove();

				if (respuesta == 0) {

					$("#columnasSlide").before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1600 * 600 px.</div>'); 

				}else{

					$("#columnasSlide").append('<li class="bloqueSlide"><span class="fa fa-times"></span><img src="'+respuesta['ruta'].slice(6)+'" class="handleImg"></li>');
					console.log(respuesta);

						swal({
							title: "¡OK!",
							text: "¡La imagen se subió correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "slider";
								}
						});


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



/**ELIMINAR ITEM SLIDE**/
$(".eliminarItemSlide").click(function(){

	idSlide = $(this).parent().attr("id");
	rutaSlide = $(this).attr("ruta");
	
	$(this).parent().remove();	

	var	borrarItem = new FormData();

	borrarItem.append("idSlide", idSlide);
	borrarItem.append("rutaSlide", rutaSlide);

	$.ajax({
			
			url:"views/ajax/gestorslide.php",
			method:"POST",
			data:borrarItem,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){

				//console.log(respuesta);
			}

	});

});
/**ELIMINAR ITEM SLIDE**/


/***********************ORDENAR SLIDE**************************/
var almacenarOrdenId = new Array(); 
var ordenItem = new Array(); 
$("#ordenarSlide").click(function(){
	$("#ordenarSlide").hide();
	$("#guardarSlide").show();

	$("#columnasSlide").css({"cursor":"move"});
	$("#columnasSlide span").hide();

	$("#columnasSlide").sortable({
		revert: true,
		connectWith: ".bloqueSlide",
		handle: ".handleImg",
		stop: function(event){

			for (var i = 0; i < $("#columnasSlide li").length; i++) {
				
				almacenarOrdenId[i] = event.target.children[i].id;
				console.log(almacenarOrdenId[i]);
				ordenItem[i] = i+1;
				console.log(ordenItem[i]);

			}

		}

	});

});


$("#guardarSlide").click(function(){
	$("#guardarSlide").hide();
	$("#ordenarSlide").show();

	for (var i = 0; i < $("#columnasSlide li").length; i++) {
		
		var actualizarOrden = new FormData();
		actualizarOrden.append("actualizarOrdenSlide",almacenarOrdenId[i]);
		actualizarOrden.append("actualizarOrdenItem",ordenItem[i]);

		$.ajax({

			url:"views/ajax/gestorslide.php",
			method:"POST",
			data:actualizarOrden,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){

				swal({
					title: "¡OK!",
					text: "¡Guardar Orden Slide!",
					type: "success",
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					},
					function(isConfirm){
						if (isConfirm){
							window.location = "slider";
						}
				});				

			}

		});

	}

});


/***********************ORDENAR SLIDE**************************/