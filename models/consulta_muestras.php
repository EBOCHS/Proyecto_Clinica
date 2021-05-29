<?php
require ("../controllers/C_consulta_muestra.php");
include ("../config/databases.php");
$consulta_mm = new consulta_muestra;
if (isset($_POST['buscar'])){
    $condicion_de_busqueda = $_POST['condicion'];
    $dato_de_busqueda = $_POST['busqueda'];
    $estado= $consulta_mm->val_dato_condicion($condicion_de_busqueda,$dato_de_busqueda);
    
    if($estado!=false){
        //verificamos que existan datos con la consulta que se esta realizando
        $q=" SELECT count(*) FROM EXPEDIENTE e 
        INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
        INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
        inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  $condicion_de_busqueda = '$dato_de_busqueda'";
        $res =mysqli_query($conn,$q);
        $row= mysqli_fetch_array($res );
        if($row['count(*)']!=0){
            $_SESSION['rows'] = $estado;
            header("Location: ../views/consulta_muestras/consulta_muestras.php");
            $_SESSION['condicion']=$condicion_de_busqueda;
            $_SESSION['dato'] = $dato_de_busqueda;
        }else{
            unset( $_SESSION['rows']);
            $_SESSION['message']="No se encontraron datos en la consulta";
            $_SESSION['message_type'] = 'danger';
            header("Location: ../views/consulta_muestras/consulta_muestras.php");
        }
        
    }else{
    $_SESSION['message'];
    $_SESSION['message_type'] = 'danger';
    header("Location: ../views/consulta_muestras/consulta_muestras.php");
    
    }
}
//para generar en archivo PDF 
if(isset($_POST['pdf'])){
    
    $condicion =$_SESSION['condicion'];
    $dato=$_SESSION['dato'];
    $consulta_mm->pdf($condicion,$dato);
}
//para generar un archivo exel 
if ( isset($_POST['imprimir']) ) {
    $condicion =$_SESSION['condicion'];
    $dato=$_SESSION['dato'];
    $consulta_mm-> exel($condicion,$dato);
}
//boton crear solisitudes
if(isset($_POST['solicitud'])){
    header("Location: ../views/solicitud/solicitud.php");
}
//boton crear muestras medias 
if(isset($_POST['muestra'])){
    header("Location: ../views/Creacion_Muestras/muestra.php");
}
//boton salir 
if(isset($_POST['salir'])){
    unset($_SESSION['message']);
    header("Location: ../views/inicio/menu_interno.php");
    
}

?>