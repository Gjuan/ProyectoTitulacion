$(".social_red").change(function(){

	id = $(this).attr("id");
	valor = $(this).val();

	var datos = new FormData();

	datos.append("idRed", id);
	datos.append("valor", valor);

     $.ajax({
        url:"views/ajax/gestorredes.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

        }
      });

});