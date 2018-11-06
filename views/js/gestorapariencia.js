$(".eliminar_item").click(function(){
	$(this).parent().remove();
});

/*
AREA DE ARRASTRE
*/
if ($(".bannerapariencia").html() == 0) {
	$(".bannerapariencia").css({"min-height" : "100px" });
	$('#borrador_nt').attr("disabled", true);
	$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
	$('#borrador_nt').tooltip();
}

if($(".bannerapariencia").html() != 0){
	$(".bannerapariencia").css({"min-height" : "100px" });
}
/*
AREA DE ARRASTRE
*/

/*
SUBIR IMAGEN
*/

$(".bannerapariencia").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();

	$(this).css({"background" : "url(views/images/pattern.jpg)"});
});
/*
SUBIR IMAGEN
*/




/*
SOLTAR IMAGEN
*/
$(".bannerapariencia").on("drop", function(e){
	e.preventDefault();
	e.stopPropagation();
	$(this).css({"background" : "none"});

	identificador = $(this).attr("id");

	var archivo = e.originalEvent.dataTransfer.files;
	var	imagen = archivo[0];

	//TIPO DE LA IMAGEN
	var	imagenType = imagen.type;
	//TAMANO DE LA IMAGEN
	var	imagenSize = imagen.size;
	
	kb = 200000;
	peso = 400000;

	if (identificador == 'logopagina') {

		

		//TIPO DE LA IMAGEN
		if (imagenType != "image/png" ) {
			$(this).before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato png</div>'); 
		}else{
			$(".alerta").remove();
		}
		//TIPO DE LA IMAGEN

		//TAMANO DE LA IMAGEN
		if (Number(imagenSize) > kb) {
			$(this).before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 30kb</div>'); 
		}else{ 
			$(".alerta").remove();
		} 
		//TAMANO DE LA IMAGEN

			//SUBIR IMAGEN AL SERVIDOR - logo de la pagina

			if (Number(imagenSize) < kb && imagenType == "image/png" ) {

			idSeccion1 = $(this).attr("id");
			idSeccion = identificador;

			var datos = new FormData();
			datos.append("imagen", imagen);
			datos.append("id", idSeccion);

			$.ajax({
				url:"views/ajax/gestorapariencia.php",
				method:"POST",
				data:datos,
				cache:false,
				contentType:false,
				processData:false,
				dataType:"json",
				beforeSend:function(){
					$("#"+idSeccion1).before('<img src"views/images/status.gif" id="status">');
				},	success:function(respuesta){
					$("#status").remove();
					if (respuesta == 0) {
						$("#"+idSeccion1).before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 242 * 92 px.</div>'); 
					}else{

						swal({
							title: "¡OK!",
							text: "¡La imagen se subió correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "apariencia";
								}
						});


						$("#"+idSeccion1).html('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times elmin_banners"></span><img src="../views/images/banners/'+respuesta['ruta']+'" class="handleImg"></li>');


					}
				}
			});


			}

			//SUBIR IMAGEN AL SERVIDOR - logo de la pagina


	}else if(identificador != 'logopagina'){

		

		//TIPO DE LA IMAGEN
		if (imagenType != "image/jpeg" ) {
			$(this).before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
		}else{
			$(".alerta").remove();
		}
		//TIPO DE LA IMAGEN

		//TAMANO DE LA IMAGEN
		if (Number(imagenSize) > peso) {
			$(this).before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 350kb</div>'); 
		}else{ 
			$(".alerta").remove();
		} 
		//TAMANO DE LA IMAGEN
	}

	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

	idSeccion1 = $(this).attr("id");
	idSeccion = identificador;

	var datos = new FormData();
	datos.append("imagen", imagen);
	datos.append("id", idSeccion);

	$.ajax({
		url:"views/ajax/gestorapariencia.php",
		method:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		beforeSend:function(){
			$("#"+idSeccion1).before('<img src"views/images/status.gif" id="status">');
		},	success:function(respuesta){
			$("#status").remove();
			if (respuesta == 0) {
				$("#"+idSeccion1).before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1920 * 315 px.</div>'); 
			}else{

						swal({
							title: "¡OK!",
							text: "¡La imagen se subió correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							},
							function(isConfirm){
								if (isConfirm){
									window.location = "apariencia";
								}
						});

				$("#"+idSeccion1).html('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times elmin_banners"></span><img src="../views/images/banners/'+respuesta['ruta']+'" class="handleImg"></li>');


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