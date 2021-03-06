var dataLocal = [];

$("#Cmb_Provincia").change(function() {
    idProvincia = $(this).val();
    var datoProvincia = new FormData();
    datoProvincia.append("idProvincia", idProvincia);
    $.ajax({

        url: "views/ajax/gestorCombosDt.php",
        method: "POST",
        data: datoProvincia,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $("#Cmb_Canton").html(respuesta);
            Cookies.set('idProvincia', idProvincia);
        }
    });
});

$("#Cmb_Canton").change(function() {
    idCanton = $(this).val();
    var datoCanton = new FormData();
    datoCanton.append("idCanton", idCanton);
    $.ajax({
        url: "views/ajax/gestorCombosDt.php",
        method: "POST",
        data: datoCanton,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $("#Cmb_Parroquia").html(respuesta);
            Cookies.set('idCanton', idCanton);
        }
    });
});

$("#Cmb_Parroquia").change(function() {
    idParroquia = $(this).val();
    var datoParroquia = new FormData();
    datoParroquia.append("idParroquia", idParroquia);
    $.ajax({
        url: "views/ajax/gestorCombosDt.php",
        method: "POST",
        data: datoParroquia,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $("#Cmb_Recinto").html(respuesta);
        }
    });
    $("#CargarValorRecinto").prop("disabled", false);
});

$("#CargarValorRecinto").click(function() {
    var DatoRecintoSelect = $("#Cmb_Recinto").val();
    Cookies.set('idParroquia', DatoRecintoSelect);
    if (Cookies.get('idParroquia') > 0) {
        window.location.href = "juntas";
    } else {
        console.log("ERROR_CLG");
    }
});

$(".rgsJuntas").click(function() {
    var dato = $(this).attr("data-id");
    $("#valJunta").val(dato);
    $("#secondDiv").css('display', 'block');
    var numPadrom = $("#numJun").html();
    $("#labelPadrom").html(numPadrom);


});

$("#Dignidad").change(function() {
    DatoDignidad = $(this).val();
    var datoDatoDignidad = new FormData();
    datoDatoDignidad.append("DatoDignidad", DatoDignidad);
    $.ajax({
        url: "views/ajax/gestorCombosDt.php",
        method: "POST",
        data: datoDatoDignidad,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $("#contenCandidatos").html(respuesta);
            if (dataLocal.length > 0) {
                dataLocal.forEach(function(elemento, indice, dataLocal) {
                    $("#controlInput-" + elemento['candidatos']).val(elemento['votos']);
                });
            }
            $(".pushing").change(function() {

                var DatoId = $(this).attr("id");
                var dts = DatoId.split("-");
                var dt = dts[1];
                var DatoVal = $(this).val();
                var local = { "candidatos": dt, "votos": DatoVal };
                if (dataLocal.length > 0) {
                    dataLocal.forEach(function(elemento, indice, dataLocal) {
                        if (dt == elemento['candidatos']) {
                            dataLocal.splice(indice, 1);
                        }
                    });
                    dataLocal.push(local);
                } else {
                    dataLocal.push(local);
                }
                //console.log(dataLocal);

                var total = 0;
                var numPadrom = $("#numJun").html();
                var junta = $("#valJunta").val();
                var Blancos = $("#Blancos").val();
                var Nulos = $("#Nulos").val();
                if (dataLocal.length > 0) {
                    dataLocal.forEach(function(elemento, indice, dataLocal) {
                        total = total + parseInt(elemento['votos']);
                    });

                    vlt = total + parseInt(junta) + parseInt(Blancos) + parseInt(Nulos);

                    if (numPadrom <= vlt) {
                        $(".sLocal").prop("disabled", false);
                    }

                }

                $("#labelPadrom").html(total);

                console.log(total);


            });


        }
    });

});


$(".sLocal").click(function() {

    var junta = $("#valJunta").val();
    var Blancos = $("#Blancos").val();
    var Nulos = $("#Nulos").val();
    var Validos = $("#Validos").val();
    var obsc = $("#obsc").val();
    var datavt = '';


    if (dataLocal.length > 0) {
        bool = dataLocal.length;
        i = 0;
        dataLocal.forEach(function(elemento, indice, dataLocal) {
            i = i + 1;
            datavt = datavt + elemento['candidatos'] + "-" + elemento['votos'];
            if (i < bool) {
                datavt = datavt + "|";
            }
        });
    }


    var datoVoto = new FormData();
    datoVoto.append("junta", junta);
    datoVoto.append("Blancos", Blancos);
    datoVoto.append("Nulos", Nulos);
    datoVoto.append("Validos", Validos);
    datoVoto.append("obsc", obsc);
    datoVoto.append("datavt", datavt);

    $.ajax({
        url: "views/ajax/gestorCombosDt.php",
        method: "POST",
        data: datoVoto,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            console.log(respuesta);

        }
    });


});