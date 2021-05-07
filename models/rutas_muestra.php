<?php
    include ("../config/databases.php");

    if(isset ($_SESSION['usuario'])){
        
       header ("location: ../views/Creacion_Muestras/mantenimiento_muestras.php");
        
    }else{
        header ("location: ../views/Login/Vista_Login.php");
    }
?>