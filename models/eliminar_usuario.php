<?php
require ('../config/databases.php');
if(isset($_POST['eliminar'])){
    $id_us = $_POST['id'];
   
   $query = "UPDATE  USUARIO set ESTADO='INACTIVO' WHERE  ID_PACIENTE ='$id_us' ";
    $res = mysqli_query($conn,$query);
    if(!$res){
        die(mysqli_error($conn)); 
    }
   /*
    $_SESSION['message'] = 'Se Ha Eliminado Correcta Mente El Usuario';
    $_SESSION['message_type'] = 'green';
   */ header("Location: ../views/mantenimiento_analistas/crud.php"); 
   
}
?>
