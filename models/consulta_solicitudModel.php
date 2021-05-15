<?php

require("../controllers/C_consulta_solicitud.php");
include("../config/databases.php");
$Model_consulta = new validar_consulta;

//validaciones del filtro
if (isset($_POST['consultar_solicitud'])) {

    $filtro = $_POST['FILTRO'];
    $dato = $_POST['DATO_FILTRO'];
    //echo "seleccion: ".$filtro." dato ingresado: ".$dato;

    switch ($filtro) {
        case "":
            $_SESSION['message'] = 'Seleccione un filtro de busqueda';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
            break;
        case "COD_SOLICITUD":

            $validar_dato = $Model_consulta->v_Codigo_solicitud($dato);
            if ($validar_dato) {
            //echo $filtro." ".$dato;
                //$_SESSION['var1'] = $filtro;
                //$_SESSION['datos'] = $dato;
                //echo $_SESSION['var1']." ".$_SESSION['datos'];
                $query = "SELECT S.COD_SOLICITUD,EX.NUM_EXPEDIENTE,P.NIT,S.TIPO_SOLICITUD,P.NOMBRE ,S.ESTADO_SOLICITUD, 
                 S.FECHA_SOLICITUD_INICIAL,MM.cantidad_muestra,COUNT(A.id_items),
                 DATE_ADD(S.FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f
                 FROM SOLICITUD S 
                 INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = S.ID_EXPEDIENTE 
                 INNER JOIN PACIENTE P ON P.ID_PACIENTE = EX.ID_PACIENTE 
                 INNER JOIN MUESTRAS_MEDICAS MM ON MM.id_solicitud
                 INNER JOIN ASOCIAR A ON A.id_muestra = MM.id_muestra
                 WHERE $filtro = '$dato' AND ESTADO_SOLICITUD='creado'";

            $result=mysqli_query($conn,$query);

            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];
                $_SESSION['NUM_EXPEDIENTE'] =$row['NUM_EXPEDIENTE']; 
                $_SESSION['NIT'] =$row['NIT']; 
                $_SESSION['TIPO_SOLICITUD'] =$row['TIPO_SOLICITUD']; 
                $_SESSION['NOMBRE'] =$row['NOMBRE']; 
                $_SESSION['ESTADO_SOLICITUD'] =$row['ESTADO_SOLICITUD']; 
                $_SESSION['FECHA_SOLICITUD_INICIAL'] =$row['FECHA_SOLICITUD_INICIAL']; 
                $_SESSION['cantidad_muestra'] =$row['cantidad_muestra'];
                $_SESSION['cant_items'] =$row['COUNT(A.id_items)']; 
                $_SESSION['fecha_f'] =$row['fecha_f']; 
                //$_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];   

            }
              header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
               //echo $_SESSION['COD_SOLICITUD']." ".$_SESSION['NUM_EXPEDIENTE'];
            } else {
                $_SESSION['message'] = 'Código de solicitud invalido, tiene que cumplir con la estrucutra AB-00000000-00000';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
            }
            break;
        case "NUM_EXPEDIENTE":

            $validar_dato = $Model_consulta->v_num_exp($dato);
            if ($validar_dato) {
                $query = "SELECT S.COD_SOLICITUD,EX.NUM_EXPEDIENTE,P.NIT,S.TIPO_SOLICITUD,P.NOMBRE ,S.ESTADO_SOLICITUD, 
                 S.FECHA_SOLICITUD_INICIAL,MM.cantidad_muestra,COUNT(A.id_items),
                 DATE_ADD(S.FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f
                 FROM SOLICITUD S 
                 INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = S.ID_EXPEDIENTE 
                 INNER JOIN PACIENTE P ON P.ID_PACIENTE = EX.ID_PACIENTE 
                 INNER JOIN MUESTRAS_MEDICAS MM ON MM.id_solicitud
                 INNER JOIN ASOCIAR A ON A.id_muestra = MM.id_muestra
                 WHERE $filtro = '$dato' ";

            $result=mysqli_query($conn,$query);

            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];
                $_SESSION['NUM_EXPEDIENTE'] =$row['NUM_EXPEDIENTE']; 
                $_SESSION['NIT'] =$row['NIT']; 
                $_SESSION['TIPO_SOLICITUD'] =$row['TIPO_SOLICITUD']; 
                $_SESSION['NOMBRE'] =$row['NOMBRE']; 
                $_SESSION['ESTADO_SOLICITUD'] =$row['ESTADO_SOLICITUD']; 
                $_SESSION['FECHA_SOLICITUD_INICIAL'] =$row['FECHA_SOLICITUD_INICIAL']; 
                $_SESSION['cantidad_muestra'] =$row['cantidad_muestra'];
                $_SESSION['cant_items'] =$row['COUNT(A.id_items)']; 
                $_SESSION['fecha_f'] =$row['fecha_f']; 
                //$_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];   

            }
              header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
                } else {
                $_SESSION['message'] = 'Número de Expediente invalido, debe que cumplir con la estrucutra 0000-00-00-00-0000000000' . $dato;
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
            }
            break;
        case "NIT":
            $validar_dato = $Model_consulta->v_num_nit($dato);
            if ($validar_dato) {
                $query = "SELECT S.COD_SOLICITUD,EX.NUM_EXPEDIENTE,P.NIT,S.TIPO_SOLICITUD,P.NOMBRE ,S.ESTADO_SOLICITUD, 
                 S.FECHA_SOLICITUD_INICIAL,MM.cantidad_muestra,COUNT(A.id_items),
                 DATE_ADD(S.FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f
                 FROM SOLICITUD S 
                 INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = S.ID_EXPEDIENTE 
                 INNER JOIN PACIENTE P ON P.ID_PACIENTE = EX.ID_PACIENTE 
                 INNER JOIN MUESTRAS_MEDICAS MM ON MM.id_solicitud
                 INNER JOIN ASOCIAR A ON A.id_muestra = MM.id_muestra
                 WHERE $filtro = '$dato' ";

            $result=mysqli_query($conn,$query);

            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];
                $_SESSION['NUM_EXPEDIENTE'] =$row['NUM_EXPEDIENTE']; 
                $_SESSION['NIT'] =$row['NIT']; 
                $_SESSION['TIPO_SOLICITUD'] =$row['TIPO_SOLICITUD']; 
                $_SESSION['NOMBRE'] =$row['NOMBRE']; 
                $_SESSION['ESTADO_SOLICITUD'] =$row['ESTADO_SOLICITUD']; 
                $_SESSION['FECHA_SOLICITUD_INICIAL'] =$row['FECHA_SOLICITUD_INICIAL']; 
                $_SESSION['cantidad_muestra'] =$row['cantidad_muestra'];
                $_SESSION['cant_items'] =$row['COUNT(A.id_items)']; 
                $_SESSION['fecha_f'] =$row['fecha_f']; 
                //$_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];   

                }
              header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
            } else {
                echo "NIT inválido, sólo se permite el ingreso de 2 a 11 caracteres alfanumérico";
                    //$_SESSION['message'] = 'NIT inválido, sólo se permite el ingreso de 2 a 11 caracteres alfanumérico';
                //$_SESSION['message_type'] = 'danger';
                //header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
            }
            break;
        case "ESTADO_SOLICITUD":

            $validar_dato = $Model_consulta->v_num_nit($dato);
            if ($validar_dato) {
                $query = "SELECT S.COD_SOLICITUD,EX.NUM_EXPEDIENTE,P.NIT,S.TIPO_SOLICITUD,P.NOMBRE ,S.ESTADO_SOLICITUD, 
                 S.FECHA_SOLICITUD_INICIAL,MM.cantidad_muestra,COUNT(A.id_items),
                 DATE_ADD(S.FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f
                 FROM SOLICITUD S 
                 INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = S.ID_EXPEDIENTE 
                 INNER JOIN PACIENTE P ON P.ID_PACIENTE = EX.ID_PACIENTE 
                 INNER JOIN MUESTRAS_MEDICAS MM ON MM.id_solicitud
                 INNER JOIN ASOCIAR A ON A.id_muestra = MM.id_muestra
                 WHERE $filtro = '$dato' ";

            $result=mysqli_query($conn,$query);

            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];
                $_SESSION['NUM_EXPEDIENTE'] =$row['NUM_EXPEDIENTE']; 
                $_SESSION['NIT'] =$row['NIT']; 
                $_SESSION['TIPO_SOLICITUD'] =$row['TIPO_SOLICITUD']; 
                $_SESSION['NOMBRE'] =$row['NOMBRE']; 
                $_SESSION['ESTADO_SOLICITUD'] =$row['ESTADO_SOLICITUD']; 
                $_SESSION['FECHA_SOLICITUD_INICIAL'] =$row['FECHA_SOLICITUD_INICIAL']; 
                $_SESSION['cantidad_muestra'] =$row['cantidad_muestra'];
                $_SESSION['cant_items'] =$row['COUNT(A.id_items)']; 
                $_SESSION['fecha_f'] =$row['fecha_f']; 
                //$_SESSION['COD_SOLICITUD'] =$row['COD_SOLICITUD'];   

            }
              header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
                } else {
                $_SESSION['message'] = 'Estado de Solicitud invalida, solo se permite 
                - creado
                - enviado 
                - asignado 
                - analisis 
                - espera 
                ';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
            }
            break;
    }
}
if (isset($_POST['imprimir'])){
        
    /*$cod_muestra = $_SESSION['codigo_muestra'];
    $cod_exp = $_SESSION['num_expediente'];
    $qr = $_SESSION['QR'];
    $cod_etiqueta=  $_SESSION['cod_et'];
    $cod_solicitud=$_SESSION['COD_SOLICITUD'];*/
    $C_imprimir = new validar_consulta;
    $C_imprimir->imprimir_consulta($_SESSION['COD_SOLICITUD'],$_SESSION['NUM_EXPEDIENTE'],$_SESSION['NIT'],$_SESSION['TIPO_SOLICITUD'],$_SESSION['ESTADO_SOLICITUD']
    , $_SESSION['NOMBRE'],$_SESSION['FECHA_SOLICITUD_INICIAL'], $_SESSION['fecha_f'] ,$_SESSION['cantidad_muestra'],$_SESSION['cant_items']);

}
if(isset($_POST['excel'])){
    $C_excel = new validar_consulta;
    $cod_solicitud = $_SESSION['COD_SOLICITUD'];
    $C_excel -> crear_excel($cod_solicitud); 
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
                unset ($_SESSION['COD_SOLICITUD']);
                unset($_SESSION['NUM_EXPEDIENTE']); 
                unset($_SESSION['NIT']); 
                unset($_SESSION['TIPO_SOLICITUD']);
                unset($_SESSION['NOMBRE']);
                unset($_SESSION['ESTADO_SOLICITUD']);
                unset($_SESSION['FECHA_SOLICITUD_INICIAL']);
                unset($_SESSION['cantidad_muestra']);
                unset($_SESSION['cant_items']); 
                unset($_SESSION['fecha_f']);

    header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
}

if (isset($_POST['eliminar'])) {
    $dato = $_SESSION['COD_SOLICITUD'];
    $query = "UPDATE SOLICITUD s SET s.ESTADO_SOLICITUD = 'Eliminado' WHERE s.COD_SOLICITUD='$dato'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: ../views/Consulta_Solicitudes/consulta_solicitudes.php");
        unset ($_SESSION['COD_SOLICITUD']);
                unset($_SESSION['NUM_EXPEDIENTE']); 
                unset($_SESSION['NIT']); 
                unset($_SESSION['TIPO_SOLICITUD']);
                unset($_SESSION['NOMBRE']);
                unset($_SESSION['ESTADO_SOLICITUD']);
                unset($_SESSION['FECHA_SOLICITUD_INICIAL']);
                unset($_SESSION['cantidad_muestra']);
                unset($_SESSION['cant_items']); 
                unset($_SESSION['fecha_f']);
    } else {

        $_SESSION['message'] = 'No se ha podido eliminar';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../views/Consulta_Solicitudes/consulta_solicitud.php");
    }
}
