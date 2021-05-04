<?php
require ("C_asociar.php");
$obj = new asociar;
$obj->generar_QR("este es un mensaje en codigo QR");
?>