/************
 * Funcion para mostrar datos de tabla en formulario (Vista asignar solicitudes)
 */
function mostrarForm(codigoSolicitud,tipoSolicitud,estadoSolicitud)  
    let cambiarCodigo = document.getElementById("cambiarCodigo");
    let cambiarEstado = document.getElementById("cambiarEstado");
    cambiarCodigo.innerHTML = codigoSolicitud;
    cambiarEstado.innerHTML = estadoSolicitud;
    console.log(tipoSolicitud);
    $("#opciones").slideToggle("slow");