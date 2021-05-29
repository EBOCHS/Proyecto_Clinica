<?php
require ('../config/databases.php');
//boton eliminar usuario 
if(isset($_POST['eliminar'])){
    $id_us = $_POST['id'];
   
   $query = "UPDATE  USUARIO set ESTADO='INACTIVO' WHERE  ID_PACIENTE ='$id_us' ";
    $res = mysqli_query($conn,$query);
    if(!$res){
        die(mysqli_error($conn)); 
    }
  header("Location: ../views/mantenimiento_analistas/crud.php"); 
   
}
//boton salir 
if (isset($_POST['salir'])){
    unset($_SESSION['message']);
    header("Location: ../views/inicio/menu_interno.php"); 
}
?>
