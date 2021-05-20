<?php
 class consulta_muestra{
   public function val_dato_condicion($condicion,$dato_busqueda){
        switch($condicion){
            case "NUM_EXPEDIENTE":
                if( strlen($dato_busqueda)>19){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  NUM_EXPEDIENTE= '$dato_busqueda'";
                        return $query;
                }else{
                    $_SESSION['message']="CODIGO DE EXPEDIENTE Incorrecto";
                    return false;
                }
                
                break;
            case "codigo_muestra":
                if( strlen($dato_busqueda)>10){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  codigo_muestra= '$dato_busqueda' ";
                    return $query;
                }else{
                    $_SESSION['message']="Codigo De Muestra Incorrecto";
                    return false;
                }
                break;
            case "COD_SOLICITUD":
                if( strlen($dato_busqueda)>10){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE  where COD_SOLICITUD= '$dato_busqueda' ";
                    return $query;
                }else{
                    $_SESSION['message']="Codigo De Solicitud Incorrecto";
                    return false;
                }
                break ;
            case "NIT": 
                if( strlen($dato_busqueda)>4){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  NIT= '$dato_busqueda' ";
                    return $query;
                }else{
                    $_SESSION['message']="Numero de nit Incorrecto";
                    return false;
                }
                break;

            default : 
            $_SESSION['message']="Ingrese un filtro de busqueda";
            return false ;  
        }
   }
   
 }
?>