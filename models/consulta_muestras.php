<?php
require ("../controllers/C_consulta_muestra.php");
include ("../config/databases.php");
$consulta_mm = new consulta_muestra;
if (isset($_POST['buscar'])){
    $condicion_de_busqueda = $_POST['condicion'];
    $dato_de_busqueda = $_POST['busqueda'];
    //echo $condicion_de_busqueda." ".$dato_de_busqueda;
    $estado= $consulta_mm->val_dato_condicion($condicion_de_busqueda,$dato_de_busqueda);
    if($estado!=false){
        $query="SELECT count(*) FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  NUM_EXPEDIENTE= '$dato_de_busqueda'";
        
        $_SESSION['rows'] = $estado;
        header("Location: ../views/consulta_muestras/consulta_muestras.php");
        
    }else{
    $_SESSION['message'];
    $_SESSION['message_type'] = 'danger';
    header("Location: ../views/consulta_muestras/consulta_muestras.php");
    }
}
if ( isset($_POST['imprimir']) ) {
    
}

?>