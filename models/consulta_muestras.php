<?php
require ("../controllers/C_consulta_muestra.php");
include ("../config/databases.php");
$consulta_mm = new consulta_muestra;
if (isset($_POST['buscar'])){
    $condicion_de_busqueda = $_POST['condicion'];
    $dato_de_busqueda = $_POST['busqueda'];
    //echo $condicion_de_busqueda." ".$dato_de_busqueda;
    $estado= $consulta_mm->val_dato_condicion($condicion_de_busqueda);
    echo $estado;

}

?>