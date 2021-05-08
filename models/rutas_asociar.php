<?php
    include ("../config/databases.php");

    if(isset ($_SESSION['usuario'])){
        
       header ("location: ../views/Creacion_Muestras/Vista_asociar.php");
        
    }else{
        header ("location: ../views/Login/Vista_Login.php");
    }
?>