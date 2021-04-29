<?php
require("../controllers/C_solicitud.php");
include("../config/databases.php");
$Model_solicitud = new validar_solicitud;

if (isset($_POST['Crear_Solicitud'])) {
    $tipo_usuario = $_POST['tipo_usu'];
    $val_tipo_usr = $Model_solicitud->val_tipo_usr($tipo_usuario);
    $tipo_solicitud = $_POST['tipo_solicitud'];
    $val_tipo_solicitud = $Model_solicitud->val_tipo_solicitud($tipo_solicitud);
    $descripcion = $_POST['descripcion'];
    $val_descripcion = $Model_solicitud->val_descripcion($descripcion);
    $N_expediente = $_POST['expediente'];
    $val_expediente = $Model_solicitud->val_expediente($N_expediente);
    $fecha = $Model_solicitud->fecha();


    if ($val_tipo_usr == true) {


        if ($val_tipo_solicitud == true) {


            if ($val_descripcion != false) {

                if ($val_descripcion == true) {


                    if ($val_expediente == true) {

                        $query = "SELECT NUM_EXPEDIENTE,ID_EXPEDIENTE FROM EXPEDIENTE WHERE EXPEDIENTE.NUM_EXPEDIENTE ='$N_expediente'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                        $id_exp = $row['ID_EXPEDIENTE'];

                        if ($row['NUM_EXPEDIENTE'] == $N_expediente) {

                            $peticion = "SELECT COD_SOLICITUD from SOLICITUD order by COD_SOLICITUD desc limit 1";
                            $res = mysqli_query($conn, $peticion);
                            $codgio = $Model_solicitud->get_numero_solicitud($res);
                            $num_solicitud = $tipo_usuario . '-' . $fecha . '-' . $codgio;

                            $query_in = "INSERT  INTO SOLICITUD (TIPO_SOLICITANTE,TIPO_SOLICITUD,DESCRIPCION,COD_SOLICITUD,ID_EXPEDIENTE,NUM_FACTURA,FECHA_SOLICITUD_FINAL,FECHA_SOLICITUD_INICIAL,ESTADO_SOLICITUD) 
                            VALUES('$tipo_usuario','$tipo_solicitud','$descripcion','$num_solicitud','$id_exp',null,null,sysdate(),'creado')";
                            $resultado = mysqli_query($conn, $query_in);
                            if (!$resultado) {
                                die(mysqli_error($conn));
                            }
                            $_SESSION['message'] = 'Solicitud Creada: ';
                            $_SESSION['message_type'] = 'success';
                            header("Location: ../views/solicitud/formulario_solicitud.php");
                        } else {

                            $_SESSION['message'] = 'El número de expediente no está en base de datos';
                            $_SESSION['message_type'] = 'danger';
                            header("Location: ../views/solicitud/formulario_solicitud.php");
                        }
                    } else {
                        $_SESSION['message'] = 'Debe ingresar un numero de Expediente';
                        $_SESSION['message_type'] = 'danger';
                        header("Location: ../views/solicitud/formulario_solicitud.php");
                    }
                } else {
                    $_SESSION['message'] = 'La descripción solo puede contener 2000 caracteres y no puede ser una cadena de números';
                    $_SESSION['message_type'] = 'danger';
                    header("Location: ../views/solicitud/formulario_solicitud.php");
                }
            } else {
                $_SESSION['message'] = 'Debe ingresar una descripción para la solicitud';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/solicitud/formulario_solicitud.php");
            }
        } else {

            $_SESSION['message'] = 'Seleccione un tipo de solicitud';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../views/solicitud/formulario_solicitud.php");
        }
    } else {

        $_SESSION['message'] = 'Seleccione un tipo de usuario';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../views/solicitud/formulario_solicitud.php");
    }
}
