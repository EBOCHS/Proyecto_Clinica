
function mostrar() {

    if ($("#enviar").text() === "Sign_in") {
        Swal.fire({
            title: "Error:",
            html: <a>Usuario incorrecto</a>,
            icon: "error"
        });
    }
}

