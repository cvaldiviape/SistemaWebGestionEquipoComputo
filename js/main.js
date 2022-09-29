$(buscar_datos());

function buscar_datos(consulta) {
    $.ajax({
        url: '../library/buscar_orden_trabajo.php',
        type: 'POST',
        dataType: 'html',
        data: { consulta: consulta },
    })
        .done(function (respuesta) {
            $("#datos").html(respuesta);//#datos es el div del html donde se colocara la tabla
        })
        .fail(function () {
            console.log("error");
        })
}
$(document).on('keyup', '#caja_busqueda', function () {
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor);//lamando a la funcion que esta arriba 
    } else {
        buscar_datos();
    }
});

$(buscar_datosTecnico());

function buscar_datosTecnico(consultaTecnico) {
    $.ajax({
        url: '../library/buscar_orden_trabajoTecnico.php',
        type: 'POST',
        dataType: 'html',
        data: { consultaTecnico: consultaTecnico },
    })
        .done(function (respuestaTecnico) {
            $("#datosTecnico").html(respuestaTecnico);//#datos es el div del html donde se colocara la tabla
        })
        .fail(function () {
            console.log("error");
        })
}
$(document).on('keyup', '#caja_busquedaTecnico', function () {
    var valor = $(this).val();
    if (valor != "") {
        buscar_datosTecnico(valor);//lamando a la funcion que esta arriba 
    } else {
        buscar_datosTecnico();
    }
});