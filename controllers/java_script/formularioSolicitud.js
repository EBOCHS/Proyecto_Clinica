$("#search_expediente").hide();
$("#datos_expediente").hide();

function mostrar() {
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
    if ($("#search").text() === "¿?") {
        $("#search_expediente").show();
    }
}

function ocultar() {
<<<<<<< Updated upstream
    let text = "";
    if ($("#exp_cancelar").text() === "X") {
=======

    if ($("#exp_cancelar").text() === "Cancelar") {
>>>>>>> Stashed changes
        $("#search_expediente").hide();
    }
}

function mostrar_dat() {
    let text = "";
    if ($("#exp_buscar").text() === "Buscar") {
        $("#datos_expediente").show();
    }
}

function ocultar_dat() {
    let text = "";
    if ($("#exp_cerrar").text() === "Cerrar") {
        $("#datos_expediente").hide();
    }
}

function confirmar_solicitud() {

    var respuesta = confirm("¿Desea crear esta solicitud?");
    if (respuesta == true) {
        return true;

    } else {

        return false;
    }
}