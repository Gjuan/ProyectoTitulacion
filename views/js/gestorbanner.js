/*
AREA DE ARRASTRE
*/
if ($(".bannerssecciones").html() == 0) {
	$(".bannerssecciones").css({"min-height" : "100px" });
	$('#borrador_nt').attr("disabled", true);
	$('#borrador_nt').attr({"title":"Llena la galeria primero!"});
	$('#borrador_nt').tooltip();
}

if($(".bannerssecciones").html() != 0){
	$(".bannerssecciones").css({"min-height" : "100px" });
}
/*
AREA DE ARRASTRE
*/


/*
SUBIR IMAGEN
*/

$(".bannerssecciones").on("dragover", function(e){
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
$(".bannerssecciones").on("drop", function(e){
	e.preventDefault();
	e.stopPropagation();
	$(this).css({"background" : "none"});

	var archivo = e.originalEvent.dataTransfer.files;
	var	imagen = archivo[0];

	//TIPO DE LA IMAGEN
	var	imagenType = imagen.type;
	//TAMANO DE LA IMAGEN
	var	imagenSize = imagen.size;
	peso = 200000;

	
	//TIPO DE LA IMAGEN
	if (imagenType != "image/jpeg" ) {
		$(this).before('<div class="alert alert-warning alerta text-center">El Archivo debe ser formato jpg</div>'); 
	}else{
		$(".alerta").remove();
	}
	//TIPO DE LA IMAGEN

	//TAMANO DE LA IMAGEN
	if (Number(imagenSize) > peso) {
		$(this).before('<div class="alert alert-warning alerta text-center">El Archivo excede el peso permitido, 200kb</div>'); 
	}else{ 
		$(".alerta").remove();
	} 
	//TAMANO DE LA IMAGEN
	

	//SUBIR IMAGEN AL SERVIDOR

	if (Number(imagenSize) < peso && imagenType == "image/jpeg" ) {

	idSeccion1 = $(this).attr("id");
	idSeccion = idSeccion1.slice(6);

	var datos = new FormData();
	datos.append("imagen", imagen);
	datos.append("id", idSeccion);
	$.ajax({
		url:"views/ajax/gestorbanner.php",
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
				$("#"+idSeccion1).before('<div class="alert alert-warning alerta text-center">La Imgen es inferior a 1600 * 600 px.</div>'); 
			}else{
				$("#"+idSeccion1).html('<li class="bloqueSlide" id="'+respuesta['ruta']+'"><span class="fa fa-times elmin_banners"></span><img src="../views/images/banners/'+respuesta['ruta']+'" class="handleImg"></li>');


				/**ELIMINAR ITEM SLIDE**/
					$(".elmin_banners").click(function(){

						idSlide = $(this).parent().attr("id");
										
						$(this).parent().remove();	

						var	borrarItem = new FormData();

						borrarItem.append("idSlide", idSlide);
						$.ajax({
								
								url:"views/ajax/gestorbanner.php",
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
					$(".elmin_banners").click(function(){

						idSlide = $(this).parent().attr("id");
										
						$(this).parent().remove();	

						var	borrarItem = new FormData();

						borrarItem.append("idSlide", idSlide);
						$.ajax({
								
								url:"views/ajax/gestorbanner.php",
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