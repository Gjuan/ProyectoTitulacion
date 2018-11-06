/*Eliminar rendicion*/
$(".elimi_cuenta").click(function(){

	valor = $(this).attr("data-id");
	var datos = new FormData();
    datos.append("idrendicion", valor);

	swal({
	    title: 'Eliminar rendicion!',
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
			            url:"views/ajax/gestorrendicion.php",
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

/*Eliminar rendicion*/