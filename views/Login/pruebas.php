<?php
require ("../../config/databases.php");  
    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['Tipo_usuario'];
    echo("bienbenido: ".$usuario." usted es un usuario: ".$tipo);
    ?>