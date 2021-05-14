<?php

require("../controllers/C_consulta_solicitud.php");
include("../config/databases.php");
$Model_consulta = new validar_consulta;

//validaciones del filtro
if (isset($_POST['consultar_solicitud'])) {

    $filtro = $_POST['FILTRO'];
    $dato = $_POST['DATO_FILTRO'];

    switch ($filtro) {
        case "":
            $_SESSION['message'] = 'Seleccione un filtro de busqueda';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            break;
        case "COD_SOLICITUD":

            $validar_dato = $Model_consulta->v_Codigo_solicitud($dato);
            if ($validar_dato) {
                $_SESSION['var1'] = $filtro;
                $_SESSION['datos'] = $dato;
                //echo $_SESSION['var1']." ".$_SESSION['datos'];
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
                
            } else {
                $_SESSION['message'] = 'Código de solicitud invalido, tiene que cumplir con la estrucutra AB-00000000-00000';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            }
            break;
        case "NUM_EXPEDIENTE":

            $validar_dato = $Model_consulta->v_num_exp($dato);
            if ($validar_dato) {
                $_SESSION['var1'] = $filtro;
                $_SESSION['datos'] = $dato;
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            } else {
                $_SESSION['message'] = 'Número de Expediente invalido, debe que cumplir con la estrucutra 0000-00-00-00-0000000000' . $dato;
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            }
            break;
        case "NIT":

            $validar_dato = $Model_consulta->v_num_nit($dato);
            if ($validar_dato) {
                $_SESSION['var1'] = $filtro;
                $_SESSION['datos'] = $dato;
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            } else {
                $_SESSION['message'] = 'NIT inválido, sólo se permite el ingreso de 2 a 11 caracteres alfanumérico';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            }
            break;
        case "ESTADO_SOLICITUD":

            $validar_dato = $Model_consulta->v_num_nit($dato);
            if ($validar_dato) {
                $_SESSION['var1'] = $filtro;
                $_SESSION['datos'] = $dato;
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            } else {
                $_SESSION['message'] = 'Estado de Solicitud invalida, solo se permite 
                - creado
                - enviado 
                - asignado 
                - analisis 
                - espera 
                ';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            }
            break;
    }
}

if (isset($_POST['crear_mm'])) {

    if (isset($_SESSION['usuario'])) {
        header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
    } else {
        header("Location: ../views/Login/Vista_Login.php");
    }
}

if (isset($_POST['crear_s'])) {
    header("Location: ../views/solicitud/formulario_solicitud.php");
}


if (isset($_POST['limpiar'])) {
    unset($_SESSION['var1']);
    unset($_SESSION['datos']);
    header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
}

if (isset($_POST['eliminar'])) {
    $dato = $_SESSION['cod_s'];
    $query = "UPDATE SOLICITUD s SET s.ESTADO_SOLICITUD = 'Eliminado' WHERE s.COD_SOLICITUD='$dato'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        unset($_SESSION['var1']);
        unset($_SESSION['datos']);
        header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
    } else {

        $_SESSION['message'] = 'No se ha podido eliminar';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
    }
}
