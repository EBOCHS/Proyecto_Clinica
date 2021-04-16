<?php

session_start();
 $conn = mysqli_connect(
     'localhost',//nombre del cervidor 
     'erick',//nombre del usuario de la base de datos
     'erick67boch',//contraseña 
     'CLINICA_'//nombre del esquema base de datos
 );
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
