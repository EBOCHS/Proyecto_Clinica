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