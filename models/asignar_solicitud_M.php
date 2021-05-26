<?php
include ("../config/databases.php");

if (isset($_POST['asignar'])) {
    //modelado de datos para la asignacion solicitudes 
    $codigo_solicitud = $_POST['CODIGO'];
    $estado_old = $_POST['ESTADO_OLD'];
    $new_estado = $_POST['NEW_ESTADO'];
    $desc = $_POST['DESC'];
    $observaciones = $_POST['observaciones'];
    //echo "codigo solicitud: ".$codigo_solicitud." estado old: ".$estado_old." nuevo estado: ".$new_estado." descripcion: ".$desc." obcervaciones: ".$observaciones;
    switch ($new_estado) {
        case "":
            $_SESSION['message'] = 'Elija un nuevo estado para la solicitud';
            $_SESSION['message_type'] = 'red';
            header("Location: ../views/Asignar_solicitudes/asignar_solicitud.php");
            break;
        case "ASIGNADO":
            echo $new_estado;
            break;
        case "ANALISIS":
            //echo $new_estado;
            $query = "SELECT ID_USUARIO from USUARIO u inner join 
            ROL_USUARIO ru on u.ID_ROL_USUARIO = ru.ID_ROL_USUARIO 
            WHERE ru.DESCRIPCION ='analista'";
            $res = mysqli_query($conn, $query);
            //var_dump ($res);
            //$numeromaspequenio= array();
            while ($rows = mysqli_fetch_array($res)){
                $id_datos= $rows['ID_USUARIO'];
                $consulta = "SELECT  COUNT(*) FROM SOLICITUDES_ASIGNADAS sa WHERE ID_USUARIO = '$id_datos'";
                $resp = mysqli_query($conn,$consulta);
                $r = mysqli_fetch_array($resp);
                $num = $r['COUNT(*)'];
                $numeromaspequenio["$id_datos"] = $num ;
            }
            //var_dump($numeromaspequenio);
            $min = min($numeromaspequenio); 
            $id_Aasignar= array_search($min,$numeromaspequenio);
            
            $id_solicitud = "SELECT ID_SOLICITUD  FROM SOLICITUD s WHERE COD_SOLICITUD ='$codigo_solicitud' ";
            $ID = mysqli_query($conn,$id_solicitud);
            $I = mysqli_fetch_array($ID);
            $idsolicitud = $I['ID_SOLICITUD'];
            $insertar_asignacion="INSERT INTO SOLICITUDES_ASIGNADAS (ID_SOLICITUD,ID_USUARIO,ESTADO,ESTADO_OLD,DESCRIPCION,Observaciones) VALUES ('$idsolicitud','$id_Aasignar','$new_estado','$estado_old','$desc','$observaciones')";

            $actualizar_estado ="UPDATE SOLICITUD SET ESTADO_SOLICITUD='$new_estado' WHERE COD_SOLICITUD = '$codigo_solicitud' ";
            $INSERT = mysqli_query($conn,$insertar_asignacion);
            $actualizar = mysqli_query($conn,$actualizar_estado);
            if(!$INSERT&&!$actualizar){
                $_SESSION['message'] = 'Error Al Asignar La Solicitud';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Asignar_solicitudes/asignar_solicitud.php");
            
            }
            else{
                $_SESSION['message'] = 'Asignación Exitosa';
                $_SESSION['message_type'] = 'success';
                header("Location: ../views/Asignar_solicitudes/asignar_solicitud.php");
            }
            break;
        case "REVISION":
            echo $new_estado;
            break;
        default:
            echo $new_estado;
    }
}
